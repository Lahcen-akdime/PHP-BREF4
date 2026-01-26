<?php
namespace Middleware;
class AdminMidlleWare{
    public static function handle()
    {
        if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') 
        {
            header("location:Login");
            exit;
        }
    }
}