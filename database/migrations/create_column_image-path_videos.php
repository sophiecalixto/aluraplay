<?php

require __DIR__ . '/../../vendor/autoload.php';

use SophieCalixto\AluraPlay\database\PDOConnection;

try {
    $pdo = PDOConnection::PDOPSQL();

    $pdo->exec(
        "ALTER TABLE video ADD COLUMN IF NOT EXISTS image_path VARCHAR(255)"
    );

    echo "Coluna image_path criada com sucesso";

} catch (PDOException $e) {
    die("ERROR: " . $e->getMessage());
}