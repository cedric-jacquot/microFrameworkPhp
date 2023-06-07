<?php

use Routing\Routes;

// report all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// config
$dotEnv = file('php/config/.env');
require_once 'php/config/config.php';

// GET routing
require_once 'php/Routing/Routes.php';
$route = new Routes;
if ($route->findController()) {
    $class = $route->findController();
    $controller = new $class;
    $data = $controller->init();
}

// php templates
require_once 'php/head.php';
require_once 'php/header.php';
if (http_response_code() === 200) {
    require_once 'php/body.php';
}
require_once 'php/footer.php';
