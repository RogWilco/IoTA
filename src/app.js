'use strict';

// Imports
var Config		= require('config');
var Express 	= require('express');
var BodyParser 	= require('body-parser');
var Mongoose 	= require('mongoose');
var Device 		= require('./models/device');
var Util		= require('util');

Mongoose.connect('mongodb://' + Config.get('database.username') + ':' + Config.get('database.password') + '@' + Config.get('database.host') + ':' + Config.get('database.port') + '/' + Config.get('database.name'));

// Global Router
var router = new Express.Router();

router.use(function(request, response, next) {
	console.log('Incoming request...');
	next();
});

// Base Route
router.get('/', function(request, response) {
	response.json({
		message: 'Yay! It works!'
	});
});

// Devices
router.route('/devices')
	.get(function(request, response) {
		Device.find(function(error, devices) {
			if(error) {
				response.send(error);
			}

			response.json(devices);
		});
	})
	.post(function(request, response) {
		var device = new Device();

		device.name = request.body.name;
		device.type = request.body.type;

		device.save(function(error) {
			if(error) {
				response.send(error);
			}

			response.json({
				message: 'Device "' + device.name + '" created!'
			});
	})
});

// Application
var app = new Express();
app.use(BodyParser());
app.use('/api', router);

module.exports = app;