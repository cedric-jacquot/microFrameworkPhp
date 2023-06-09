<?php

namespace Routing;

class Routes
{
    public function findController()
    {
        $routes = [
            // route name GET (?page=name) => [
            //     'controller' => 'name', 
            //     'method' => 'name',
            // ];
            'main' => [
                'controller' => 'MainController',
                'method' => 'main',
            ],
            'main2' => [
                'controller' => 'MainController',
                'method' => 'main2',
            ],
            'first' => [
                'controller' => 'FirstController',
                'method' => 'main',
            ],
            'second' => [
                'controller' => 'SecondController',
                'method' => 'main',
            ],
        ];

        if (array_key_exists('page', $_GET)) {
            if (array_key_exists($_GET['page'], $routes)) {
                $className = $routes[$_GET['page']]['controller'];
            } else {
                http_response_code(404);
                $className = '../errors/404';
            }
        } else {
            $className = $routes['main']['controller'];
        }

        require_once 'php/Controller/' . $className . '.php';

        $classPath = 'Controller\\' . $className;
        if (class_exists($classPath)) {
            $route = $routes[$_GET['page']];
        } else {
            $className = '../errors/404';
            $route = null;
            http_response_code(404);
        }

        return $route;
    }
}
