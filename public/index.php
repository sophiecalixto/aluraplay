<?php

require __DIR__ . '/../vendor/autoload.php';

$routes = require_once(__DIR__ . '/../config/routes.php');

$method = $_SERVER['REQUEST_METHOD'];
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

foreach ($routes as $route => $handler) {
    list($routeMethod, $routePath) = explode('|', $route);

    if ($method === $routeMethod && $pathInfo === $routePath) {
        if (file_exists(__DIR__ . $handler)) {
            require_once(__DIR__ . $handler);
        } else {
            require_once(__DIR__ . '/../view/home.php');
        }
        exit();
    }
}

require_once(__DIR__ . '/../view/404.php');
