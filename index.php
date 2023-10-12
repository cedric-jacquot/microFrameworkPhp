<?php

use Routing\Routes;

// defines classes path
spl_autoload_register(function ($class) {
    $className = str_replace('\\', '/', $class);
    include 'php/' . $className . '.php';
});

// config
require_once 'php/config/config.php';

// GET routing
require_once 'php/Routing/Routes.php';
$route = new Routes;

// find controller from GET
// return Controller and Method defined in Routes.php array
$routeDatas = $route->findController();
if ($routeDatas) {
    dump($routeDatas);

    // Create Class from Route
    $className = 'Controller\\' . $routeDatas['controller'];
    $class = new $className;
    // Create Method from Route
    $method = $routeDatas['method'];

    // $data return vars from Controller
    $data = $class->$method();
} else {
    // else return error
    $data = null;
    http_response_code(500);
}

// and html output
require_once 'php/head.php';
require_once 'php/header.php';
if (http_response_code() === 200) {
    require_once 'php/body.php';
}
require_once 'php/footer.php';
