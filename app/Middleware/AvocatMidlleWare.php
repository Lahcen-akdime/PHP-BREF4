<?php
namespace Middleware;
class AvocatMidlleWare{
    public static function handle()
    {
        if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'avocat') 
        {
            header("location:Login");
            exit;
        }
    }
}