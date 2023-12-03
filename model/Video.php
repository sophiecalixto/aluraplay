<?php

namespace SophieCalixto\AluraPlay\model;

use PDO;
use PDOException;
use SophieCalixto\AluraPlay\database\PDOConnection;

class Video
{
    private int $id;
    private string $url;
    private string $title;
    private static PDO $pdo;

    public function __construct(string $title = '', string $url = '', int $id = -1)
    {
        $this->title = $title;
        $this->url = $url;
        $this->id = $id;
        self::$pdo = PDOConnection::PDOPSQL();
    }

    public static function add(string $url, string $title) : bool
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
            return new self($video['title'], $video['url'], $video['id']);
        }, $stmt);
    }

    public static function delete(int $id) : bool
    {
        new self();
        $video_id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = self::$pdo->prepare("DELETE FROM video WHERE id = :id");
        if($query->execute(["id" => $video_id])) {
            return true;
        }

        return false;
    }

    public static function get(int $id) : self
    {
        new self();
        $video_id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $query = self::$pdo->query("SELECT * FROM video WHERE id = $video_id");
        $stmt = $query->fetch(PDO::FETCH_ASSOC);
        return new self($stmt['title'], $stmt['url'], $stmt['id']);
    }

    public static function update(int $id, string $title, string $url) : bool
    {
        new self();
        try {
            $video_url = filter_var($url, FILTER_VALIDATE_URL);
            $video_id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

            $stmt = self::$pdo->prepare("UPDATE video SET title = :title, url = :url WHERE id = :id");

            if (
                $stmt->execute([
                    "title" => $title,
                    "url" => $video_url,
                    "id" => $video_id
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

    public function title() : string
    {
        return $this->title;
    }

    public function url() : string
    {
        return $this->url;
    }

    public function id() : int
    {
        return $this->id;
    }
}