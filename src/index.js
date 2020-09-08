'use strict';

// Setup
var app = require('./app');
var port = Number(process.env.PORT || 8888);

// Start HTTP Server
app.listen(port, function() {
	console.log('Listening on ' + port);
});