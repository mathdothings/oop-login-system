<?php

declare(strict_types=1);

spl_autoload_register(
    function (string $class) {
        require_once __DIR__ . "/src/$class.php";
    }
);

$_SESSION['userId'] ?? header('location: ./src/UI/signup.html');
die;
