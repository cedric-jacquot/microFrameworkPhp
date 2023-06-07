<?php

namespace Routing;

use LogicException;

// use Controller\MainController;

class Routes
{
    public function __construct()
    {
        $routes = [
            'main'      => 'MainController',
            'first'     => 'FirstController',
            'second'    => 'SecondController',
        ];

        if (array_key_exists('page', $_GET)) {
            if (array_key_exists($_GET['page'], $routes)) {
                $controller = $routes[$_GET['page']];
            } else {
                http_response_code(404);
                $controller = 'errors/404';
            }
        } else {
            $controller = $routes['main'];
        }

        echo '<pre>ici</pre>';

        spl_autoload_register(function ($controller) {

            echo '<pre>spl</pre>';

            // create class instance
            include 'php/Controller/' . $controller . '.php';

            // Check to see whether the include declared the class
            if (!class_exists($controller, false)) {
                echo 'error';
                throw new LogicException("Unable to load class: $controller");
            } else {
                echo 'OK';
            }
        });

        echo 'fin';
    }
}
