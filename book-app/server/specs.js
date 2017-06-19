var request		= require("supertest"),
	chai		= require('chai'),
	assert		= chai.assert,
	expect		= chai.expect,
	app			= require("./server.js"),
	should		= chai.should();


	describe("students", function() {
		it("tests that all students are returned", function(next) {
			request(app)
			.get("/api/v1/students")
			.expect(200)
			.end(function(err, result) {
					expect(result.body).to.be.an("array");
					next();
				})
		})

		it("should add a student", function(next) {
			var data = {
				"name" : "James",
				"role" : "Agent"
			}
			request(app)
			.post("/api/v1/students")
			.send(data)
			.set("Content-Type", "Application/json")
			.end((err, res) => {
				expect(res.body).to.be.an("object");
				expect(res.body.name).to.be.equal("James");
				res.body.should.have.property("role");

				next();
			})
		})

		it("fetch student by ID", function(next) {
			var data = {
				"name" : "James",
				"role" : "Agent"
			}
			request(app)
			.post("/api/v1/students")
			.send(data)
			.set("Content-Type", "Application/json")
			.end(function(err, res) {
				var id = res.body._id;
				request(app)
				.get("/api/v1/students/" + id)
				.end((err, res) =>{
					expect(res.body).to.be.an("object");
					expect(res.body.name).to.be.equal("James");
					res.body.should.have.property("role");
					expect(res.body).to.have.property("_id");
				})
				next();
			})
		})

		it("should update student records", function(next) {
			var data = {
				"name" : "James",
				"role" : "Agent"
			}
			request(app)
			.post("/api/v1/students")
			.send(data)
			.set("Content-Type", "Application/json")
			.end(function(err, res) {
				var id = res.body._id;
				request(app)
				.put("/api/v1/students/" + id)
				.send({"name" : "Barack", "role" : "President"})
				.end((err, res) => {
					expect(res.body).to.be.an("object");
					expect(res.body.name).to.be.equal("Barack");
					res.body.should.have.property("role");
					expect(res.body).to.have.property("_id");

				})
			})
			next();
		})

		it("should delete student records", function(next) {
			var data = {
				"name" : "James",
				"role" : "Agent"
			}
			request(app)
			.post("/api/v1/students")
			.send(data)
			.set("Content-Type", "Application/json")
			.end(function(err, res) {
				var id = res.body._id;
				request(app)
				.delete("/api/v1/students/" + id)
				.end((err, res) => {
					expect(res.body).to.be.an("object");
					expect(res.body).to.have.property("_id");

					request(app)
					.get("/api/v1/students/" + id)
					.end((err, res) => {
						expect(res.body).to.be.empty;
					})

				})
			})
			next();
		})

		
	})

	