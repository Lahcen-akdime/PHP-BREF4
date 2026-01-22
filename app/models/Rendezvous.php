<?php

namespace models;

use DateTime;

class Rendezvous
{
    private $db;
    private int $id;
    private string $link;
    private DateTime $date_debut;
    private DateTime $date_fin;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($demande_id, $link, $date_debut, $date_fin, $heures)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO rendez_vous (demande_id, link, date_debut, date_fin, heures) VALUES (:demande_id, :link, :date_debut, :date_fin, :heures)");
            $stmt->execute([
                ':demande_id' => $demande_id,
                ':link' => $link,
                ':date_debut' => $date_debut,
                ':date_fin' => $date_fin,
                ':heures' => $heures
            ]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function RendezvousById($id){
        // client 9 ;
        // profitionnel id = 3 ;
    return $this -> db -> query("SELECT u.name,r.link,r.date_debut from demandes d
    inner join rendez_vous r on d.id=r.demande_id
    inner join users u on d.client_id = u.id
    where d.status = 'Accepted'
    "
                                ) -> fetchAll() ;
    }
}
