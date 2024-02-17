<?php

namespace Helpers;

class UserSignUpValidation extends UserValidation
{
    function validateName($name): bool
    {
        $brokenNameRules = [];
        if (empty($name)) $this->BrokenRules['name'][] = 'Name must be provided!';
        if (strlen($name) < 3) $this->BrokenRules['name'][] = 'Name must be greater than 3 charactes!';
        $brokenNameRules[] = $this->BrokenRules['name'];
        if (!$this->BrokenRules) return true;
        return false;
    }

    function validateRepeatPassword(string $password, string $repeatPassword): bool
    {
        $brokenRepeatPassowordRules = [];
        if ($password !== $repeatPassword)
            $this->BrokenRules['repeatPassword'][] = "Passwords don't match!";
        $brokenRepeatPassowordRules[] = $this->BrokenRules['repeatPassword'];
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
