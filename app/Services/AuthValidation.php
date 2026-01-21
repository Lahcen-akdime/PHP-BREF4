<?php
namespace Services;
class AuthValidation{
    public function Login(){
        if($_SERVER['METHOD_REQUEST']){
        var_dump($_POST['email']);
        }
    }
}