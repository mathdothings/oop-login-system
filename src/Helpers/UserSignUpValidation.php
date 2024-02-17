<?php

namespace Helpers;

class UserSignUpValidation extends UserValidation
{

    function validateName($name): bool
    {
        if (empty($name)) $this->BrokenRules[] = 'Name must be provided!';
        if (strlen($name) < 3) $this->BrokenRules[] = 'Name must be greater than 3 charactes!';
        if (!$this->BrokenRules) return true;
        return false;
    }

    function validateRepeatPassword(string $password, string $repeatPassword): bool
    {
        if ($password !== $repeatPassword)
            $this->BrokenRules[] = "Passwords don't match!";

        if (!$this->BrokenRules) return true;
        return false;
    }

    function validate(array $userSignUpInput): bool | array
    {
        $this->validateName($userSignUpInput['name']);
        $this->validateEmail($userSignUpInput['email']);
        $this->validatePassword($userSignUpInput['password']);
        $this->validateRepeatPassword(
            $userSignUpInput['password'],
            $userSignUpInput['repeatPassword']
        );

        if (!$this->BrokenRules) return true;
        return $this->BrokenRules;
    }
}
