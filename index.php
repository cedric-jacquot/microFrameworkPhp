<?php

use Routing\Routes;

// report all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// config
require_once 'php/config/config.php';

// DEV = true in .env
if ($GLOBALS['CONFIG']['DEV']) {
    require_once 'php/debug/dump.php';
}

dump($GLOBALS['CONFIG']);

// GET routing
require_once 'php/Routing/Routes.php';
$route = new Routes;

dump($route);

if ($route->findController()) {
    $routeDatas = $route->findController();
    $className = 'Controller\\' . $routeDatas['controller'];
    $class = new $className;

    dump($class);

    if (method_exists($class, $routeDatas['method'])) {
        $method = $routeDatas['method'];
        $data = $class->$method();
    } else {
        $data = null;
        http_response_code() === 500;
    }
}

// php templates
require_once 'php/head.php';
require_once 'php/header.php';
if (http_response_code() === 200) {
    require_once 'php/body.php';
}
require_once 'php/footer.php';
