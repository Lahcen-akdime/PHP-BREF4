<?php
namespace models\Repository;
Use Services\Database;
use models\User;
use PDO;

class UserRepository{
    private ?PDO $pdo;

    public function __construct(?PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function creat(User $user): bool
    {

        $stmt = $this->pdo->prepare("INSERT INTO users(name, email, password, role)
                                Values(:name, :email, :password, :role)");
        return $stmt->execute([
            ':name' => $user->getName(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':role' => $user->getRole()
        ]);
    }

    public function getByEmail($email): ?array 
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email'=>$email]);
        $result = $stmt->fetch();
        if (!$result) {
        return null;
    }

    return $result;
    }

    // public function getPassword($email): ?string
    // {
    //     $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
    //     $stmt->execute([':email'=>$email]);
    //     $result = $stmt->fetch();
    // return $result ?? null;
    // }
}