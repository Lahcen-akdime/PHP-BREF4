<?php
namespace Services;
Use Services\Database;
use models\Repository\UserRepository;
use models\User;
class AuthValidation{

    public function verfier($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    public function ValidationsignUp(){
            $role = 'client';
            if(empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2']) || empty($_POST['name'])){
            $_SESSION['error'] = "Tous les Champs sont Obligatoires";
            header("location:signup");
            exit;
            }elseif($_POST['password1'] !== $_POST['password2'])
            {
            $_SESSION['error'] = "Les mots de passe ne correspondent pas";
            header("location:signup");
            exit;
            }else{
               $name = $this->verfier($_POST['name']);
               $password = $this->verfier($_POST['password1']);
               $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            }
            $pdo = Database::get_connection();
            $emailDb = new UserRepository($pdo);

            $getDb = $emailDb->getByEmail($_POST['email']);
            $EmailDb = $getDb['email'];
            // var_dump($checkem);
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $_SESSION['error'] = "Email non valide"; 
               header("location:signup");
                exit;          
            }elseif(isset($EmailDb)){
                $_SESSION['error'] = "Email Deja utilise";
               header("location:signup");   
                exit;
            }else{
                $email = $this->verfier($_POST['email']);
                $user = new User(null,$name , $email, $passwordHashed, $role);
                $_SESSION['success'] = "Creation success, Veuillez entrer Votre Compte";

            // var_dump($user);
            }
    return $user;
    }

        public function ValidationLogin(){
            if(empty($_POST['email']) || empty($_POST['password'])){
            $_SESSION['error'] = "Tous les Champs sont Obligatoires";
            header("location:login");
            exit;
            }else{
               $email = $this->verfier($_POST['email']);
               $password = $this->verfier($_POST['password']);
               $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            }
            $pdo = Database::get_connection();
            $checkDb = new UserRepository($pdo);

            $getDb = $checkDb->getByEmail($email);
            $EmailDb = $getDb['email'];
            $PasswordDb = $getDb['password'];

            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $_SESSION['error'] = "Email non valide"; 
               header("location:login");
                exit;          
            }elseif(!isset($EmailDb)){
                $_SESSION['error'] = "Email invalide";
               header("location:login");   
                exit;
            }

            if(!isset($PasswordDb)){
                $_SESSION['error'] = "Password invalide";
               header("location:login");   
                exit;
            }elseif (!password_verify($password, $PasswordDb)) {
                $_SESSION['error'] = "Password inccorect";
               header("location:login");   
                exit;
            }
    $_SESSION['role'] = $getDb['role'];
    $_SESSION['name'] = $getDb['name'];
    $_SESSION['user_id'] = $getDb['id'];

    return true;
    }
}