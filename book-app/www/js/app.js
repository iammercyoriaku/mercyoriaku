(function () {
	"use strict";

	var getElement = document.getElementById.bind(document);
	var regForm	   = getElement("register");
	var xhr		   = new XMLHttpRequest();

	regForm.addEventListener("submit", function(e) {
		e.preventDefault();

		var data 		= "",
			elements	= this.elements;


		Array.prototype.forEach.call(elements, function(v, i, a) {
			data += encodeURIComponent(v.name);
			data += "=";
			data += encodeURIComponent(v.value);
			data += "&";
		});
		data = data.substring(0, data.length-1);

		xhr.open("POST", "http://localhost:3000/api/v1/user");

		xhr.onreadystatechange = function() {
			handleResponse(xhr);

		};
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(data);

	}, false);

	function handleResponse(http) {
		if(http.readyState == 4) {
			if(http.status == 200 || http.status == 304) {
				var user = JSON.parse(http.responseText);
				var loginForm = getElement("login");

				if(user.hasOwnProperty("_token")) {
					regForm.classList.toggle("hide");
					loginForm.classList.toggle("hide");
				}
			}
		}
	}

	var loginForm = getElement("login");
	loginForm.addEventListener("submit", function(e) {
		e.preventDefault();

		var data = {},
			element = this.elements;

		Array.prototype.forEach.call(element, function(v, i, a) {
			data[encodeURIComponent(v.name)] = encodeURIComponent(v.value);
		});

		xhr.open("POST", "http://localhost:3000/api/v1/auth");

		xhr.onreadystatechange = function() {
			deduceResponse(xhr);
		};
		xhr.setRequestHeader("Content-Type", "application/json");
		xhr.send(JSON.stringify(data));
	}, false);

	function deduceResponse(http) {
		if(http.readyState == 4) {
			if(http.status == 200 || http.status == 304) {
				var user = JSON.parse(http.responseText);

				if(user.hasOwnProperty("_token")) {
					localStorage.setItem("token", user._token);
					window.location = "dashboard.html";
				}
			}
		}
	}


}());