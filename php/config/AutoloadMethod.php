<?php

namespace config;

use Exception;
use ReflectionClass;

class AutoloadMethod
{
    public function __construct(object $class, array $routeDatas)
    {
        $method = $routeDatas['method'];

        // reflection to autoload parameters
        $reflectionClass = new ReflectionClass($class);
        $params = $reflectionClass->getMethod($method)->getParameters();
        $autoloadedParams = [];
        foreach ($params as $param) {
            $classToLoad = $param->getType()->getName();
            dump($classToLoad);
            // works only for Object
            if (
                $classToLoad == 'int'
                || $classToLoad == 'bool'
                || $classToLoad == 'string'
                || $classToLoad == 'mixed'
            ) {
                throw new Exception(
                    'AutloadeMethod can only load object, ' . $classToLoad . ' given'
                );
            }
            $autoloadedParams[] = $param->getType()->getName();
            // load classes
            new 
        }
        dump($autoloadedParams);

        // load class method
        $data = $class->$method();
    }
}