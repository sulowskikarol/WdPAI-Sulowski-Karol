<?php

class User
{
    private $id;
    private $email;
    private $password;
    private $permission;
    private $name;
    private $surname;

    public function __construct(int $id, string $email, string $password, string $permission)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->permission = $permission;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPermission(): string
    {
        return $this->permission;
    }
}