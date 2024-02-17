<?php

namespace Helpers;

class UserValidation
{
    protected array $BrokenRules = [
        'name' => [],
        'email' => [],
        'password' => [],
        'repeatPassword' => []
    ];
    function validateEmail(string $email): bool
    {
        $brokenEmailRules = [];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $this->BrokenRules['email'][] = 'Invalid email';
        $brokenEmailRules[] = $this->BrokenRules['email'];
        if (!$brokenEmailRules) return true;
        return false;
    }

    function validatePassword(string $password): bool
    {
        $brokenPasswordRules = [];
        if (strlen($password) < 8)
            $this->BrokenRules['password'][] = 'Password must have more than 7 digits!';
        if (!preg_match("/[a-z]/i", $password))
            $this->BrokenRules['password'][] = 'Password must have one or more lowercase letters!';
        if (!preg_match("/[A-Z]/i", $password))
            $this->BrokenRules['password'][] = 'Password must have one or more uppercase letters!';
        if (!preg_match("/[0-9]/", $password))
            $this->BrokenRules['password'][] = 'Password must have one or more numerical digits!';
        $brokenPasswordRules[] = $this->BrokenRules['password'];
        if (!$this->BrokenRules) return true;
        return false;
    }
}
