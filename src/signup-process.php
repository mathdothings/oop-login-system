<?php

spl_autoload_register(
    function (string $class) {
        require_once __DIR__ . "./$class.php";
    }
);

use \Services\Database;
use \Helpers\UserSignUpValidation;
use \Controller\UserController;

$database = new Database(Host: 'localhost', DBName: 'oop-login-db', User: 'root', Password: '');
$controller = new UserController($database);
$validation = new UserSignUpValidation;

$signUpInput = [
    'name' => $name = $_POST['name'] ?? '',
    'email' => $email = $_POST['email'] ?? '',
    'password' => $password = $_POST['password'] ?? '',
    'repeatPassword' => $_POST['repeat-password'] ?? ''
];

if ($validation->validate($signUpInput) === true) {
    $user = [
        'name' => $signUpInput['name'],
        'email' => $signUpInput['email'],
        'passwordHash' => password_hash($signUpInput['password'], PASSWORD_DEFAULT)
    ];
    $controller->post($user);
}
