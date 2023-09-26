<?php

class MyPDO {
    private $pdo;


    private $dbPath = __DIR__ . '/tp3.db';

    public function __construct() {
        try {
            $this->pdo = new PDO('sqlite:' . $this->dbPath);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            throw new Exception('Connection failed: ' . $e->getMessage());
        }
    }

    public function getPDO(): PDO {
        return $this->pdo;
    }
}
