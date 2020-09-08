<?php
/**
 * Main Index Page
 *
 * Initializes the application environment, setting up an autoload function,
 * include paths, and loads any needed configuration files.
 *
 * @package Iota
 * @author Nick Williams
 * @version 1.0.0
 */

// Imports
require '../../vendor/autoload.php';

use Bedrock\Common;

try {
	// Initialize Environment
	Common::init('../cfg/application.xml');
	Common\Logger::logEntry();

	// Start Router
	Common\Registry::get('router')->delegate();

	Common\Logger::logExit();
}
catch(Common\Exception $ex) {
	Common\Logger::exception($ex);
	Common\Logger::logExit();
}
