<?php

spl_autoload_register(function ($class) {
    require_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});

use \Services\Database;
use \Helpers\UserSignUpValidation;
use \Controller\UserController;

$database = new Database(
    Host: '127.0.0.1',
    DBName: 'oop_login_db',
    User: 'root',
    Password: '123'
);
$database->getConnection();
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
