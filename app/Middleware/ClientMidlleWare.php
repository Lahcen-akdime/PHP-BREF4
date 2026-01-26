<?php
namespace Middleware;
class ClientMidlleWare{
    public static function handle()
    {
        if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'client') 
        {
            header("location:Login");
            exit;
        }
    }
}