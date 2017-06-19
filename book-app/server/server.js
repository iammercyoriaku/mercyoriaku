var express       = require("express"),
    bps           = require("body-parser"), //body parser processes requests
    app           = express(),
    morgan        = require("morgan"),
    cors          = require("cors"), 
    api           = require("../api/api.js");

 
    app.use(bps.json());
    app.use(bps.urlencoded({extended: true}));

    app.use(morgan("dev"));
    app.use(cors());


    //mount routes
    app.use("/api/v1", api);

    //Your error handler must be the last endpoint in your list of routes
    app.use((err, req, res, next) => {
      res.status(500).json(err.message);
      next();

    });

    module.exports = app;
