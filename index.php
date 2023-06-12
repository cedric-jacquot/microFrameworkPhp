<?php

use Routing\Routes;

// autoloader
spl_autoload_register(function ($class) {
    $className = str_replace('\\', '/', $class);
    include 'php/' . $className . '.php';
});


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

// GET routing
require_once 'php/Routing/Routes.php';
$route = new Routes;

if ($route->findController()) {
    $routeDatas = $route->findController();
    $className = 'Controller\\' . $routeDatas['controller'];
    $class = new $className;

    if (method_exists($class, $routeDatas['method'])) {
        // load needed method
        $method = $routeDatas['method'];

        // refelection to autoload parameters
        $reflectionClass = new ReflectionClass($class);
        $params = $reflectionClass->getMethod($method)->getParameters();
        var_dump($reflectionClass);
        var_dump($params);
        foreach ($params as $key => $param) {
            echo dump($param);
        }
        // if (array_search()) {

        // }

        // load class method
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
