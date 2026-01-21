<?php
namespace Services;
Use Services\Database;
use models\Repository\RepositorySignUp;
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
            header("location:auth/signup");
            exit;
            }elseif(empty($_POST['password1']) !== empty($_POST['password2']))
            {
            $_SESSION['error'] = "Les mots de passe ne correspondent pas";
            header("location:auth/signup");
            }else{
               $name = $this->verfier($_POST['name']);
               $password = $this->verfier($_POST['password1']);
               $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            }
            $pdo = Database::get_connection();
            $emailDb = new RepositorySignUp($pdo);
            $checkem = $emailDb->getByEmail($_POST['email']);
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $_SESSION['error'] = "Email non valide"; 
               header("location:auth/signup");
                exit;          
            }elseif(isset($checkem)){
                $_SESSION['error'] = "Email Deja utilise";
               header("location:signup");   
                exit;
            }else{
                $email = $this->verfier($_POST['email']);
                $user = new User(null,$name , $email, $password, $role);
            // var_dump($user);
            }
    return $user;
    }
}