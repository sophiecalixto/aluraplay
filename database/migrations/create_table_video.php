<?php

require __DIR__ . '/../../vendor/autoload.php';

use SophieCalixto\AluraPlay\database\PDOConnection;

try {
    $pdo = PDOConnection::PDOPSQL();

    $pdo->exec(
      "CREATE TABLE IF NOT EXISTS video(
            id SERIAL PRIMARY KEY,
            url VARCHAR(255),
            title VARCHAR(255)
        )"
    );

} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}