<?php

namespace SophieCalixto\AluraPlay\model;

use PDO;
use PDOException;
use SophieCalixto\AluraPlay\database\PDOConnection;

class Video
{
    private string $url;
    private string $title;
    private static PDO $pdo;

    public function __construct(string $title = '', string $url = '')
    {
        $this->title = $title;
        $this->url = $url;
        self::$pdo = PDOConnection::PDOPSQL();
    }

    public static function Add(string $url, string $title) : bool
    {
        new self();
        try {
            $video_url = filter_var($url, FILTER_VALIDATE_URL);

            $stmt = self::$pdo->prepare("INSERT INTO video (title, url) VALUES (:title, :url)");

            if (
                $stmt->execute([
                    "title" => $title,
                    "url" => $video_url
                ])
            ) {
               return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }
    }

    public static function getAll() : array
    {
        new self();
        $query = self::$pdo->query("SELECT * FROM video");
        $stmt = $query->fetchAll(PDO::FETCH_ASSOC);
        return array_map(function($video) {
            return new self($video['title'], $video['url']);
        }, $stmt);
    }

    public function title() : string
    {
        return $this->title;
    }

    public function url() : string
    {
        return $this->url;
    }
}