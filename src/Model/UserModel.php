<?php

namespace Model;

class UserModel extends Model implements UserModelInterface
{
    public function __construct(private string $Email, private string $Name)
    {
    }
}
