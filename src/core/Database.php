<?php
class Database implements IDatabase
{
    public function __construct(
        private string $Host,
        private string $Name,
        private string $User,
        private string $Password
    ) {
    }

    function getConnection(
        string $host,
        string $name,
        string $user,
        string $password
    ): PDO {
        try {
            $dsn = "mysql:host={$this->Host};dbname={$this->Name};charset=utf8";
            return new PDO($dsn, $this->User, $this->Password, [
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]);
        } catch (PDOException $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
