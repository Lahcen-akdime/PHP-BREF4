<?php
class AuthController{
    public static function Login()
    {
        require "..\src\Views\authentification\Login.php";
    }

    public static function SignUp()
    {
        require "..\src\Views\authentification\SignUP.php";
    }

    public static function LogOut()
    {
        require "..\src\Views\authentification\Login.php";
    }
    public static function Form()
    {
        require "..\src\Views\authentification\FormChoix.php";
    }
    public static function FormDire()
    {
        if(isset($_POST['role']) == 'CLIENT'){
            header('location:/PHP-BREF4/Auth/Login');
        }else{
            header('location:/PHP-BREF4/Auth/Pro');
        }
    }

  
}

