<?php

require __DIR__ . '/../../vendor/autoload.php';

use SophieCalixto\AluraPlay\database\PDOConnection;

try {
    $pdo = PDOConnection::PDOPSQL();

    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS users(
            id SERIAL PRIMARY KEY,
            email VARCHAR(255),
            password VARCHAR(255)
        )"
    );

} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}