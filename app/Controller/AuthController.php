<?php
use render\View;
use Services\AuthValidation;
class AuthController{
    public static function Login()
    {
        View::render('authentification/Login');
        $valid = new AuthValidation();
        $valid->Login();

    }

    public static function SignUp()
    {
        View::render('authentification/SignUp');
    }

    public static function LogOut()
    {
        View::render('authentification/LogOut');
    }
    public static function Form()
    {
        View::render('authentification/FormChoix');
    }
    public static function FormDire()
    {
        if(isset($_POST['role']) && $_POST['role'] == 'CLIENT'){
            header('location:/PHP-BREF4/Auth/Login');
            $_SESSION['role'] = 'CLIENT';
        }else{
            header('location:/PHP-BREF4/Auth/Pro');
        }
    }

  
}

