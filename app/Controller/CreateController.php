<?php
require_once "..\src\Views\Gestion\Formulaires\DinamicCreate.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $consultation_en_ligne = $_POST['consultation_en_ligne'];
    $Annes_dex = $_POST['Annes_dex'];
    $ville_id = $_POST['ville_id'];
    $specialite = $_POST['specialite'];
    $types_actes = $_POST['types_actes'];
    if(empty($_POST['specialite'])){
        // its a huissier user
    $types_actes = $_POST['types_actes']; 
    }
    else{
        // its avocat user
    $specialite = $_POST['specialite']; 
    }
}