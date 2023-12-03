<?php

require __DIR__ . '/../vendor/autoload.php';

if($_SERVER['PATH_INFO'] == '/' || !array_key_exists('PATH_INFO', $_SERVER)) {
    require_once __DIR__ . '/../view/home.php';
} elseif ($_SERVER['PATH_INFO'] == '/novo-video') {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        require_once __DIR__ . '/../view/form.php';
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once __DIR__ . '/../controller/AddVideoController.php';
    }
} elseif ($_SERVER['PATH_INFO'] == '/editar-video') {
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        require_once __DIR__ . '/../view/form.php';
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once __DIR__ . '/../controller/UpdateVideoController.php';
    }
} elseif ($_SERVER['PATH_INFO'] == "/remover-video") {
    require_once __DIR__ . '/../controller/DeleteVideoController.php';
}