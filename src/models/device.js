'use strict';

var Mongoose = require('mongoose');

var DeviceSchema = new Mongoose.Schema({
	name: String
});

module.exports = Mongoose.model('Device', DeviceSchema);