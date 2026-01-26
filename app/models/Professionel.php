<?php
namespace models ;
use PDO;
class Professionel extends User {
    protected bool $consultation_en_ligne ;
    protected float $taarif;
    protected int $Annes_dex ;
    protected int $ville_id ;

    protected array $document;
    protected static \PDO $connection ;
    protected object $disponibilite;
    public function __construct(\PDO $connection) {
        parent::__construct($this->name,$this->email,$this->password,$this->role);
        self::$connection = $connection;
        // $this->name = $name;
        
    }
public function getAll($tableName){
    $data = self::$connection -> query("SELECT * FROM $tableName") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }
    public function create($tableName,$columnName,$name,$selected,
                           $consultation_en_ligne,$Annes_dex,$ville_id){
    $operation = self::$connection->prepare("INSERT INTO $tableName(name,$columnName,
                            consultation_en_ligne,Annes_dex,ville_id)
                            VALUES(:name,:selected,:consultation_en_ligne,
                            :Annes_dex,:ville_id)");
    
    $operation -> execute([":name"=>$name,":selected"=>$selected,           
                            ":consultation_en_ligne"=>$consultation_en_ligne,
                            ":Annes_dex"=>$Annes_dex,":ville_id"=>$ville_id]);
    }
    public function delete($tableName,$id){
        self::$connection->query("DELETE FROM $tableName WHERE id = $id");
    }
    public function getUser($tableName,$id){
    $data = self::$connection -> query("SELECT * FROM $tableName WHERE id = $id") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data[0] ;
    }
    public function search($tableName,$indice){
    $data = self::$connection -> query("SELECT * FROM $tableName WHERE name LIKE '$indice%'") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }
    public function filter($tableName,$indice){
    $data = self::$connection -> query("SELECT * FROM $tableName WHERE specialite = '$indice'") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }
    public function displayByPage($tableName,$currentPage){
    $startIn = ($currentPage - 1) * 4 ;
    $data = self::$connection -> query("SELECT * FROM $tableName Limit 4 OFFSET $startIn") -> fetchAll(\PDO::FETCH_ASSOC);
    return $data ;
    }


     public static function save($connection,$table,$field,$consultation_en_ligne,$annes_dex,$status,$taarif,$document,$Ville_id,$disponibilite,$fieldParPro,$name,$email,$password,$role){
        
    $sqluser = "INSERT INTO users (name,email,password,role) VALUES (:name,:email,:password,:role) RETURNING id";
    $stmt = $connection->prepare($sqluser);
    $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $password,
            ':role' => $role,]);
    $id = $stmt->fetchColumn();
    $sqlprp = "INSERT INTO $table
    (id,{$fieldParPro},consultation_en_ligne,annes_dex,status,taarif,document,Ville_id,disponibilite)
    VALUES
    (:id,:field,:consultation_en_ligne,:annes_dex,:status,:taarif,:document,:Ville_id,:disponibilite)";
        $reprepare = $connection->prepare($sqlprp);

            $reprepare->execute([
                ':id' => $id,
                ':field' => $field,
                ':consultation_en_ligne' => $consultation_en_ligne,
                ':annes_dex' => $annes_dex,
                ':status' => $status,
                ':taarif' => $taarif,
                ':document' => $document,
                ':Ville_id' => $Ville_id,
                ':disponibilite' => $disponibilite
                ]);

        }  
        }

        
        
