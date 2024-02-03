<?php

namespace Helpers;

use JsonSerializable;

class UserSignUpValidation
{
    private array $BrokenRules = [];

    function validateName($name): bool
    {
        if (empty($name)) $this->BrokenRules[] = 'Name must be provided!';
        if (strlen($name) < 3) $this->BrokenRules[] = 'Name must be greater than 3 charactes!';
        if (!$this->BrokenRules) return true;
        return false;
    }

    function validateEmail($email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $this->BrokenRules[] = 'Invalid email';
        if (!$this->BrokenRules) return true;
        return false;
    }

    function validatePassword($password, $repeatPassword): bool
    {
        if (strlen($password) < 8)
            $this->BrokenRules[] = 'Password must have more than 7 digits!';
        if (!preg_match("/[a-z]/i", $password))
            $this->BrokenRules[] = 'Password must have one or more lowercase letters!';
        if (!preg_match("/[A-Z]/i", $password))
            $this->BrokenRules[] = 'Password must have one or more uppercase letters!';
        if (!preg_match("/[0-9]/", $password))
            $this->BrokenRules[] = 'Password must have one or more numerical digits!';
        if ($password !== $repeatPassword)
            $this->BrokenRules[] = "Passwords don't match!";

        if (!$this->BrokenRules) return true;
        return false;
    }

    function validate(array $userSignUpInput): bool | array
    {
        $this->validateName($userSignUpInput['name']);
        $this->validateEmail($userSignUpInput['email']);
        $this->validatePassword($userSignUpInput['password'], $userSignUpInput['repeatPassword']);

        if (!$this->BrokenRules) return true;
        return $this->BrokenRules;
    }
}
