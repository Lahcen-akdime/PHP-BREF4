<?php
class Person {
    protected int $id ;
    protected string $name ;
    protected bool $consultation_en_ligne ;
    protected int $Annes_dex ;
    protected int $ville_id ;
    protected PDO $connection ;
    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }
}