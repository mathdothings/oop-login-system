<?php

namespace Model;

class UserModel extends Model implements UserModelInterface
{
    private string $Email;
    private string $Name;

    public function __construct(string $email, string $name)
    {
        $this->Email = $email;
        $this->Name = $name;
    }
}
