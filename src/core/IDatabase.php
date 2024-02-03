<?php
interface IDatabase
{
    function getConnection(
        string $host,
        string $databse,
        string $user,
        string $password
    );
}
