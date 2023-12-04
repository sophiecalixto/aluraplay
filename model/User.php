<?php

namespace SophieCalixto\AluraPlay\model;

use PDO;
use PDOException;
use SophieCalixto\AluraPlay\database\PDOConnection;

class User
{
    private static PDO $pdo;
    public function __construct()
    {
        self::$pdo = PDOConnection::PDOPSQL();
    }
    public static function add($email, $password) : bool
    {
        new self();
        try {
            $userEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

            $stmt = self::$pdo->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");

            if (
                $stmt->execute([
                    "email" => $userEmail,
                    "password" => $password
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

    public static function auth($email, $password) : bool
    {
        new self();
        try {
            $userEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

            $stmt = self::$pdo->prepare("SELECT * FROM users WHERE email = :email");

            if (
                $stmt->execute([
                    "email" => $userEmail,
                ])
            ) {
                // Auth user
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return password_verify($password, $user['password']);
            } else {
                return false;
            }

        } catch (PDOException $e) {
            return false;
        }
    }
}