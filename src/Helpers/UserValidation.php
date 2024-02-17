<?php

namespace Helpers;

class UserValidation
{
    protected array $BrokenRules = [];
    function validateEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $this->BrokenRules[] = 'Invalid email';
        if (!$this->BrokenRules) return true;
        return false;
    }

    function validatePassword(string $password): bool
    {
        if (strlen($password) < 8)
            $this->BrokenRules[] = 'Password must have more than 7 digits!';
        if (!preg_match("/[a-z]/i", $password))
            $this->BrokenRules[] = 'Password must have one or more lowercase letters!';
        if (!preg_match("/[A-Z]/i", $password))
            $this->BrokenRules[] = 'Password must have one or more uppercase letters!';
        if (!preg_match("/[0-9]/", $password))
            $this->BrokenRules[] = 'Password must have one or more numerical digits!';

        if (!$this->BrokenRules) return true;
        return false;
    }
}
