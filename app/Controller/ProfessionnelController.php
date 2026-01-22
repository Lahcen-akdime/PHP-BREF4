<?php

use models\User;
use models\Ville;
use models\Professionel;
use Services\Database;

    class ProfessionnelController extends User{
        private static PDO $connection;
        public function __construct($connection)
        {
            self::$connection=$connection;
        }
        function saveProfessionel() {
            // Professionel::save(Database::get_connection());
            
        }
        }


























?>