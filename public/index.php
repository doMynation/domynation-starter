<?php

// Include composer dependencies
require_once __DIR__ . '/../vendor/autoload.php';

// Create an application instance with the path corresponding to the route of your project
$app = new Domynation\Application(__DIR__ . '/../');

// Boot the application
$app->boot();

// Execute the request
$app->run();
