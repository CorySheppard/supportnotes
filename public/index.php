<?php

// Define base_path
const BASE_PATH = __DIR__ . '/../';

// Start session
session_start();

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'Core/functions.php'; 
require BASE_PATH . 'bootstrap.php';

// Define $router as new instance of Router class, and require routes.php
$router = new Core\Router();
require BASE_PATH . 'routes.php';

// Fetch requested URI and method, define as $uri and $method
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Route the user using $uri and $method
$router->route($uri, $method);