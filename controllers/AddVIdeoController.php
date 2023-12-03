<?php

require __DIR__ . '/../vendor/autoload.php';

use SophieCalixto\AluraPlay\database\PDOConnection;

if ($_POST['title'] && $_POST['url']) {
    try {
        $pdo = PDOConnection::PDOPSQL();
        $title = $_POST['title'];
        $url = filter_input(INPUT_POST, "url", FILTER_VALIDATE_URL);

        $stmt = $pdo->prepare("INSERT INTO video (title, url) VALUES (:title, :url)");

        if (
            $stmt->execute([
            "title" => $title,
            "url" => $url
            ])
        ) {
            header('Location: /?success=1');
            exit();
        } else {
            header('Location: /?success=0');
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }
}