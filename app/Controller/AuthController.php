<?php
namespace Controller;
Use Services\Database;
use render\View;
use Services\AuthValidation;
use models\Repository\UserRepository;
class AuthController{

    public static function login()
    {
        View::render('authentification/Login');
        if(isset($_POST['submitLogin'])){
        $validation = new AuthValidation;
        $resu = $validation->ValidationLogin();
        if($resu){
        header("location:../home");
        }
        }

    }

    public static function signUp()
    {
    View::render('authentification/signup');
        if(isset($_POST['submitSignup'])){
            $validation = new AuthValidation;
            $resu = $validation->ValidationsignUp();
            if(isset($resu)){
            $con = Database::get_connection();
            $sendData = new UserRepository($con);
            $rs = $sendData->creat($resu);
            if($rs){
            header("location:Login");
            }
            }
        }

    }

    public static function logOut()
    {
        session_unset();
        session_destroy();
        View::render('authentification/Login');
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

