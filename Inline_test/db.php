<?php
class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $pdo;

    // Конструктор
    public function __construct() {
        $this->host = 'localhost';
        $this->db = 'test';
        $this->user = 'root';
        $this->pass = 'root';
        $this->charset = 'utf8mb4';

        $this->connect();
    }

    // Соединение
    private function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    // Выполняет запрос
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    // Получает одну строку
    public function fetch($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }

    // Получает все строки
    public function fetchAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }
}