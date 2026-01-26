<?php
namespace Controller;
Use Services\Database;
use render\View;
use Services\AuthValidation;
use models\Repository\UserRepository;
class AuthController{

    public static function index() {
    header("Location:/PHP-BREF4/auth/login");
    exit;
    }

    public static function login()
    {
    if (isset($_SESSION['role'])) {
        header("Location:/PHP-BREF4/home");
        exit;
    }
        if(isset($_POST['submitLogin'])){
        $validation = new AuthValidation;
        $resu = $validation->ValidationLogin();
        if($resu){
        header("Location:/PHP-BREF4/home");
        exit;
        }
        }
        
        View::render('authentification/Login');

    }

    public static function signUp()
    {
        if(isset($_POST['submitSignup'])){
            $validation = new AuthValidation;
            $resu = $validation->ValidationsignUp();
            if(isset($resu)){
            $con = Database::get_connection();
            $sendData = new UserRepository($con);
            $rs = $sendData->creat($resu);
            if($rs){
        header("Location:/PHP-BREF4/auth/login");
            }
            }    
            }
            View::render('authentification/signup');

    }

    public static function logOut()
    {
        session_unset();
        session_destroy();
        header("location:Login");
    }
    public static function form()
    {
        View::render('authentification/FormChoix');
    }
    public static function formDire()
    {
        if(isset($_POST['role']) && $_POST['role'] == 'client'){
            $_SESSION['role'] = $_POST['role'];
            header('location:/PHP-BREF4/Auth/signup');
            exit;
        }else{
            header('location:/PHP-BREF4/singup');
        } 
    }

  
}

