<?php

namespace Routing;

class Routes
{
    /**
     * Return array with Controller and Method used from GET
     * @return array $route
     */
    public function findController(): mixed
    {
        $routes = [
            // exemple de route à créer :
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

        // datas from GET
        if (array_key_exists('page', $_GET)) {
            if (array_key_exists($_GET['page'], $routes)) {
                $className = $routes[$_GET['page']]['controller'];
            } else {
                // else error 404
                http_response_code(404);
                $className = '../errors/404';
            }
        } else {
            // main Controller by default
            $className = $routes['main']['controller'];
        }

        // include Class
        require_once 'php/Controller/' . $className . '.php';

        // test if Class exists
        $classPath = 'Controller\\' . $className;
        if (class_exists($classPath)) {
            if (array_key_exists('page', $_GET)) {
                $route = $routes[$_GET['page']];
            } else {
                $route = $routes['main'];
            }
        } else {
            // else 404
            $className = '../errors/404';
            $route = null;
            http_response_code(404);
        }
        return $route;
    }
}
