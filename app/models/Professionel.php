<?php
namespace models ;

use LDAP\Result;

class Professionel extends User {
    protected bool $consultation_en_ligne ;
    protected float $taarif;
    protected int $Annes_dex ;
    protected int $ville_id ;
    protected array $document;
    protected static \PDO $connection ;
    protected object $disponibilite;
    public function __construct(\PDO $connection) {
        self::$connection = $connection;
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


// proffessionel
      // (dashbord) total des hueres to proffissionnele 
       public function TotalHeures(){
               $stmt = self::$connection->prepare("SELECT SUM(rendez_vous.heures) FROM rendez_vous  
                    JOIN demandes ON rendez_vous.demande_id = demandes.id
                    WHERE demandes.professionel_id = :id AND demandes.status  = 'Accepted'");
                    $stmt->execute([':id'=>$this->id]);
                    $result = $stmt->fetchColumn();
                    if($result){
                    $totalInt = intval($result);
                     $rest = $result - $totalInt;
                     $TotalHeurs = $totalInt + ($rest * 60);
                       return $TotalHeurs;
                     }else{
                         return 0;
                     }
       }

    //  taarif de proffessionel
    public function getTaarif(){
        $stmt = self::$connection->prepare("SELECT taarif FROM avocats WHERE id=:id");
        $stmt->execute([':id'=>$this->id]);
        $result = $stmt->fetchColumn();
        if($result)
        return $result;
    else
        return 0;
    }

    // (Dashbord)calculer chiffre d'affaires de proffissionnele
    public function ChiffreDaffaires($heures,$taarif){
        $chiffreDaffaire = $heures * $taarif ;
        if($chiffreDaffaire)
           return $chiffreDaffaire;
        else
           return 0;
    }


    // (dashbord) clients uniques
    public function ClientsUnique(){
        $stmt = self::$connection->prepare("SELECT DISTINCT COUNT(*)  FROM demandes 
                          WHERE professionel_id=:id AND status='Accepted'");
        $stmt->execute([':id'=>$this->id]);
        $result =$stmt->fetchColumn();
        if($result)
            return $result;
        else 
            return 0;
    }
    
  // admin
      // ( dashbord => Admin ) total des  proffessionel pending
    public static function Pending($connection){
        $stmt = $connection->prepare("SELECT COUNT(*) 
          FROM users
          LEFT JOIN avocats ON users.id = avocats.id AND avocats.status = 'Pending'
          LEFT JOIN huissiers ON users.id = huissiers.id AND huissiers.status = 'Pending'
          WHERE users.role IN ('avocat', 'huissier')
            AND (avocats.status = 'Pending' OR huissiers.status = 'Pending')
      
        ");
        $stmt->execute();
        $result = $stmt->fetchColumn();
        if ($result) 
            return $result;
        else
            return 0;
    } 
        // ( dashbord => Admin ) total des  proffessionel accepted
    public static function Accepted($connection){
        $stmt = $connection->prepare("SELECT COUNT(*) 
          FROM users
          LEFT JOIN avocats ON users.id = avocats.id AND avocats.status = 'Accepted'
          LEFT JOIN huissiers ON users.id = huissiers.id AND huissiers.status = 'Accepted'
          WHERE users.role IN ('avocat', 'huissier')
            AND (avocats.status = 'Accepted' OR huissiers.status = 'Accepted') ");
        $stmt->execute();
        $result = $stmt->fetchColumn();
        if ($result) 
            return $result;
        else
            return 0;
    } 

      // ( dashbord => Admin ) total des  proffessionel accepted
    public static function Rejected($connection){
        $stmt = $connection->prepare("SELECT COUNT(*) 
          FROM users
          LEFT JOIN avocats ON users.id = avocats.id AND avocats.status = 'Rejected'
          LEFT JOIN huissiers ON users.id = huissiers.id AND huissiers.status = 'Rejected'
          WHERE users.role IN ('avocat', 'huissier')
            AND (avocats.status = 'Rejected' OR huissiers.status = 'Rejected')");
        $stmt->execute();
        $result = $stmt->fetchColumn();
        if ($result) 
            return $result;
        else
            return 0;
    } 

    public static function LesDemandes($connection){
         $stmt = $connection->prepare("SELECT users.name , users.email ,users.role ,avocats.status,avocats.id
         FROM  users
         JOIN  avocats ON users.id=avocats.id
         WHERE avocats.status='Pending'
         UNION ALL
         SELECT users.name , users.email ,users.role,huissiers.status,huissiers.id
         FROM  users
         JOIN  huissiers ON users.id=huissiers.id
         WHERE huissiers.status='Pending'
         ");
         $stmt->execute();
         $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if($result)
            return $result;
        else
            return 0;
    }

    // accepted
    public static function AdminConsulterAccepted($connection,$id,$role){
        $tableName = strtolower($role . "s");
        $stmt = $connection->prepare("UPDATE {$tableName} SET status = :status WHERE id=:id");
        $stmt->execute([':id'=>$id,':status'=>'Accepted']);
    }

    // rejected
    public static function AdminConsulterRejected($connection,$id,$role){
        $tableName = strtolower($role . "s");
        $stmt = $connection->prepare("UPDATE {$tableName} SET status = :status WHERE id=:id");
        $stmt->execute([':id'=>$id,':status'=>'Rejected']);
    }
}
