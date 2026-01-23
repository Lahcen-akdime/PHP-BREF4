<?php 
namespace Controller;
use render\View;

class HomeController{
    public static function index()
    {
        View::render('Dashboards/home');
    }
}