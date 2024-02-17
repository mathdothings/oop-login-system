<?php
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});

use \Services\Database;
use \Helpers\UserSignUpValidation;
use \Controller\UserController;

$database = new Database(
    Host: 'localhost',
    DBName: 'oop-login-db',
    User: 'root',
    Password: ''
);

$controller = new UserController($database);
$validation = new UserSignUpValidation;

$userSignUpInput = [
    'name' => $name = $_POST['name'] ?? '',
    'email' => $email = $_POST['email'] ?? '',
    'password' => $password = $_POST['password'] ?? '',
    'repeatPassword' => $_POST['repeat-password'] ?? ''
];

$rules = $validation->validate($userSignUpInput);
if ($rules !== true) return;

$user = [
    'name' => $userSignUpInput['name'],
    'email' => $userSignUpInput['email'],
    'passwordHash' => password_hash($userSignUpInput['password'], PASSWORD_DEFAULT)
];
$controller->post($user);
