<?php
namespace Middleware;
class HuissierMidlleWare{
    public static function handle()
    {
        if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'huissier') 
        {
            header("location:Login");
            exit;
        }
    }
}