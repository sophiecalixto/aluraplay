<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

$routes = require_once(__DIR__ . '/../config/routes.php');

$method = $_SERVER['REQUEST_METHOD'];
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';

if(!array_key_exists('logged', $_SESSION) && $_SERVER['PATH_INFO'] != '/login' || !$_SESSION['logged'] && $_SERVER['PATH_INFO'] != '/login') {
    header('Location: /login');
    return;
}

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
