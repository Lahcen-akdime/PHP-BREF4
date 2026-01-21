<?php
namespace models;

class User{
    protected ?int $id ;
    protected ?string $name ;
    protected ?string $email;
    protected ?string $password;
    protected ?array $role;

    public function __construct(?int $id = null, ?string $email = null, ?string $password = null, ?array $role = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
    }

    public function getId(): ?int{
        return $this->$id;
    }
    public function getName(): ?string{
        return $this->$name;
    }
    public function getPassword(): ?string{
        return $this->$passowrd;
    }
    public function getRole(): ?string{
        return $this->$role;
    }
    public function getEmail(): ?stirng{
        return $this->$email;
    }
}