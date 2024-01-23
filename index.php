<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

$constroller = new Controller;
$validation = new Validation;
$sanitization = new Sanitization;
$messages = new Messages;
$authorization = new Authorization;
$database = new Database;
$registration = new Registration;
$login = new Login;
$session = new Session;
