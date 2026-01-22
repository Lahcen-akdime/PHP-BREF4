<?php
namespace models\Repository;
Use Services\Database;
use models\User;
use PDO;

class RepositorySignUp{
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

    public function getByEmail($email): ?string
    {
        $stmt = $this->pdo->prepare("SELECT email FROM users WHERE email = :email");
        $stmt->execute([':email'=>$email]);
        $result = $stmt->fetch();
    return $result['email'] ?? null;
    }
}