<?php

require_once('vendor/autoload.php');

// Create user -> Email and Password

use SophieCalixto\AluraPlay\model\User;

$userEmail = $argv[1];
$userPassword = $argv[2];
$passHash = password_hash($userPassword, PASSWORD_ARGON2ID);

if(User::add($userEmail, $passHash)){
    echo "Usuário adicionado!" . PHP_EOL;
} else {
    echo "Erro ao adicionar usuário!" . PHP_EOL;
}