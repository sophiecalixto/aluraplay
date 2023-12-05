<?php

use SophieCalixto\AluraPlay\model\User;

require __DIR__ . '/../vendor/autoload.php';

if($_POST['email'] && $_POST['password']) {
    if(User::auth($_POST['email'], $_POST['password'])) {
        $_SESSION['logged'] = true;
        header('Location: /');
    } else {
        header('Location: /login?success=0');
    }
} else {
    header('Location: /login?success=0');
}