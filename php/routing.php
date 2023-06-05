<?php

$routes = [
    'main'      => 'templates/main',
    'article1'  => 'templates/article1',
    'article2'  => 'templates/article2',
];

if (array_key_exists('page', $_GET)) {
    if (array_key_exists($_GET['page'], $routes)) {
        $page = $routes[$_GET['page']];
    } else {
        http_response_code(404);
        $page = 'errors/404';
    }
} else {
    $page = $routes['main'];
}
