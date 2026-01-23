<?php
namespace models;

class User{
    protected ?int $id;
    protected ?string $name ;
    protected ?string $email;
    protected ?string $password;
    protected ?string $role;

    public function __construct(?int $id = null, ?string $name = null, ?string $email = null, ?string $password = null, ?string $role = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }

    public function getId(): ?int{
        return $this->id;
    }
    public function getName(): ?string{
        return $this->name;
    }
    public function getPassword(): ?string{
        return $this->password;
    }
    public function getRole(): ?string{
        return $this->role;
    }
    public function getEmail(): ?string{
        return $this->email;
    }
}