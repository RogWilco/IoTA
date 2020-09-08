'use strict';

var Mongoose = require('mongoose');

var UserSchema = new Mongoose.Schema({
	username: String,
	password: String,
	email: String,
	last: {
		created: {
			type: Date,
			default: Date.now
		},
		updated: { type: Date, default: Date.now }
	}
	created: Date,
	updated: Date
});