<?php

namespace Controller;

require_once __DIR__ . '/../Helpers/helpers.php';
require_once __DIR__ . '/../../config.php';

use PDO;
use PDOException;

class UserController extends BaseController
{
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
            $this->redirect(VIEWS_PATH . "/login.php");
        } catch (PDOException $exception) {
            $connection->rollBack();
            echo $exception->getMessage();
        } finally {
            $statement = null;
            $connection = null;
        }
    }
}
