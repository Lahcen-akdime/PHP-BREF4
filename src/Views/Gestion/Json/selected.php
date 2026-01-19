<?php
use models\Avocat;
use models\Huissier;
use Services\Database;
use Services\PDO;
use models\Ville;
$Database = new Database();
$villeClass = new Ville($Database::get_connection());
// ____________________________________ Search Avocats __________________________________________________ //
$avocatClass = new Avocat($Database::get_connection());
$array = [];
if (isset($_GET['search'])) {
    $selected = $avocatClass->search("avocat", $_GET['search']);
    foreach ($selected as $key) {
        if ($key['consultation_en_ligne'] == true) {
            $key['consultation_en_ligne'] = "✓ Consultation En Ligne";
        } else {
            $key['consultation_en_ligne'] = "✖️ pas de consultation";
        }
        $key['ville_id'] = $villeClass->villeName($key['ville_id']);
        array_push($array, $key);
    }
    echo json_encode($array);
}



















// ____________________________________ Filter Avocats __________________________________________________ //
if (isset($_GET['filter'])) {
    $array = [];
    if ($_GET['filter'] == "all") {
        $all = $avocatClass->getAll("avocat");
        foreach ($all as $key) {
            if ($key['consultation_en_ligne'] == true) {
                $key['consultation_en_ligne'] = "✓ Consultation En Ligne";
            } else {
                $key['consultation_en_ligne'] = "✖️ pas de consultation";
            }
            $key['ville_id'] = $villeClass->villeName($key['ville_id']);
            array_push($array, $key);
        }
    } else {
        $selected = $avocatClass->filter("avocat", $_GET['filter']);
        foreach ($selected as $key) {
            if ($key['consultation_en_ligne'] == true) {
                $key['consultation_en_ligne'] = "✓ Consultation En Ligne";
            } else {
                $key['consultation_en_ligne'] = "✖️ pas de consultation";
            }
            $key['ville_id'] = $villeClass->villeName($key['ville_id']);
            array_push($array, $key);
        }
    }
    echo json_encode($array);
}