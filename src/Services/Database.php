<?php

namespace Services;

use \PDO;
use \PDOException;

class Database extends PDO implements DatabaseInterface
{
    public function __construct(
        private string $Host,
        private string $DBName,
        private string $User,
        private string $Password
    ) {
    }

    function getConnection(): PDO
    {
        try {
            $dsn = "mysql:host={$this->Host};dbname={$this->DBName};charset=utf8";
            $pdo = new PDO($dsn, $this->User, $this->Password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]);
            return $pdo;
        } catch (PDOException $exception) {
            throw new PDOException($exception->getMessage());
        }
    }
}
