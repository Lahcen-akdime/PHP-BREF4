<?php

namespace models;

class Client extends User
{
    private static \PDO $connection;

    public function __construct(\PDO $connection)
    {
        self::$connection = $connection;
    }

    public function searchProfessionals($role, $criteria)
    {
        $tableName = ($role === 'huissier') ? 'huissiers' : 'avocats';
        $keyword = $criteria['keyword'] ?? '';
        $ville = $criteria['ville'] ?? '';
        $specialite = $criteria['specialite'] ?? '';

        $query = "SELECT t.*, v.name as ville_name FROM $tableName t 
                  LEFT JOIN villes v ON t.ville_id = v.id 
                  WHERE t.status = true";

        $params = [];

        if (!empty($keyword)) {
            $query .= " AND t.name ILIKE :keyword";
            $params[':keyword'] = "%$keyword%";
        }

        if (!empty($ville)) {
            $query .= " AND t.ville_id = :ville";
            $params[':ville'] = $ville;
        }

        if ($role === 'avocat' && !empty($specialite)) {
            $query .= " AND t.specialite::text = :specialite";
            $params[':specialite'] = $specialite;
        } elseif ($role === 'huissier' && !empty($specialite)) {
            $query .= " AND t.types_actes::text = :type";
            $params[':type'] = $specialite;
        }

        $stmt = self::$connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getProfessionalById($id) {
        $stmt = self::$connection->prepare("SELECT role FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (!$user) return null;
        $table = ($user['role'] === 'avocat') ? 'avocats' : 'huissiers';
        
        $sql = "SELECT id, name, email, role, disponibilite 
                FROM $table 
                WHERE id = :id";
        
        $stmt = self::$connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
