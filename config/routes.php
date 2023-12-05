<?php

return [
    'GET|/' => "/../view/home.php",
    'GET|/novo-video' =>  "/../view/form.php",
    'POST|/novo-video' => "/../controller/AddVideoController.php",
    'GET|/editar-video' => "/../view/form.php",
    'POST|/editar-video' => "/../controller/UpdateVideoController.php",
    'GET|/remover-video' =>  "/../controller/DeleteVideoController.php",
    'GET|/login' => "/../view/login.php",
    'POST|/login' => "/../controller/LoginController.php",
    'GET|/logout' => "/../controller/LogoutController.php"
];