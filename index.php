<?php

declare(strict_types=1);

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/core/$class.php";
});

$constroller = new Controller;
// $validation = new Validation;
// $sanitization = new Sanitization;
// $messages = new Messages;
// $authorization = new Authorization;
$database = new Database(
    Host: "127.0.0.1",
    Name: "oop_login_db",
    User: "root",
    Password: "123"
);
// $registration = new Registration;
// $login = new Login;
// $session = new Session;
