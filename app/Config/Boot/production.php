<?php

/*
 |--------------------------------------------------------------------------
 | ERROR DISPLAY
 |--------------------------------------------------------------------------
 | Show all errors for debugging purposes.
 */
error_reporting(-1); // Report all errors
ini_set('display_errors', '1'); // Display errors in the browser

/*
 |--------------------------------------------------------------------------
 | DEBUG MODE
 |--------------------------------------------------------------------------
 | Enable debug mode for detailed error messages.
 | Debug mode provides stack traces and other diagnostic tools.
 */
defined('CI_DEBUG') || define('CI_DEBUG', true);

