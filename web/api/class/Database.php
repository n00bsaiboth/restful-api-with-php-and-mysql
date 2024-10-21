<?php

namespace Api\Database;

use PDO;
use Dotenv\Dotenv;
use PDOException;

class Database {
    private $pdo;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '../../../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $db = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET NAMES utf8");
        } catch (PDOException $e) {
            die("Error: Could not connect to the database. " . $e->getMessage());
        }
    }

    public function connect() {
        return $this->pdo;
    }
}
