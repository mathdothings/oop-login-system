<?php

namespace Controller;

require_once './Helpers/helpers.php';
// echo basePath();

use \Services\Database;
use PDO;
use PDOException;

class UserController
{
    private Database $Database;
    function __construct(Database $database)
    {
        $this->Database = $database;
    }
    function get()
    {
    }

    function post(array $user)
    {
        try {
            $connection = $this->Database->getConnection();
            $connection->beginTransaction();
            $sql = "INSERT INTO user (email, name,  passwordHash) VALUES (:email, :name, :passwordHash)";
            $statement = $connection->prepare($sql);
            $statement->bindValue('email', $user['email'], PDO::PARAM_STR);
            $statement->bindValue('name', $user['name'], PDO::PARAM_STR);
            $statement->bindValue('passwordHash', $user['passwordHash'], PDO::PARAM_STR);
            $statement->execute();
            // $connection->commit();
            // $this->redirect('./UI/login.php');
        } catch (PDOException $exception) {
            $connection->rollBack();
            echo $exception->getMessage();
        } finally {
            $statement = null;
            $connection = null;
        }
    }

    function redirect(string $page): void
    {
        header("location: $page");
    }
}
