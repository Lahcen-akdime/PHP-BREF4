<?php
namespace Controller;
Use Services\Database;
use render\View;
use Services\AuthValidation;
use models\Repository\RepositorySignUp;
class AuthController{

    public static function login()
    {
        View::render('authentification/Login');
    }

    public static function signUp()
    {
    View::render('authentification/signup');
        if(isset($_POST['submitSignup'])){
            $validation = new AuthValidation;
            $resu = $validation->ValidationsignUp();
            if(isset($resu)){
            $con = Database::get_connection();
            $sendData = new RepositorySignUp($con);
            $sendData->creat($resu);
            $_SESSION['success'] = "Creation succes";
            }
        }

    }

    public static function logOut()
    {
        View::render('authentification/LogOut');
    }
    public static function form()
    {
        View::render('authentification/FormChoix');
    }
    public static function formDire()
    {
        if(isset($_POST['role']) && $_POST['role'] == 'client'){
            header('location:/PHP-BREF4/Auth/signup');
            $_SESSION['role'] = $_POST['role'];
        }else{
            header('location:/PHP-BREF4/Auth/Pro');
        }
    }

  
}

