<?php

namespace Routing;

class Routes
{
    public function findController()
    {
        $routes = [
            'main'      => 'MainController',
            'first'     => 'FirstController',
            'second'    => 'SecondController',
        ];

        if (array_key_exists('page', $_GET)) {
            if (array_key_exists($_GET['page'], $routes)) {
                $className = $routes[$_GET['page']];
            } else {
                http_response_code(404);
                $className = '../errors/404';
            }
        } else {
            $className = $routes['main'];
        }

        require_once 'php/Controller/' . $className . '.php';

        $className = 'Controller\\' . $className;
        if (class_exists($className)) {
            $controller = $className;
        } else {
            $className = '../errors/404';
            $controller = null;
            http_response_code(404);
        }

        return $controller;
    }
}
