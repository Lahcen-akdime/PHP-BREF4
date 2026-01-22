<?php

namespace router;

class Routing
{
    private static array $controllers = [
        "avocats" => "avocatsController",
        "huissier" => "huissierController",
        "home" => "homeController",
        "dashboard" => "dashboardController",
        "Statistiques" => "statistiquesController",
        "Create" => "CreateController",
        "DeleteAvocat" => "DeleteAvocatController",
        "DeleteHuissier" => "DeleteHuissierController",
        "editHuissier" => "editHuissierController",
        "editAvocat" => "editAvocatController",
        "json" => "jsonController",
        "client" => "ClientController",
        "demande" => "DemandeController",
        "pagination" => "paginationController"
    ];
    public static function dispatch()
    {
        $page = $_GET['page'] ?? "home";
        if (array_key_exists($page, self::$controllers)) {
            require_once __DIR__ . "/../Controller/" . self::$controllers[$page] . ".php";
        } else {
            echo "404";
        }

        if($methode == null){
            return;
        }
        $controllerName = self::$controllers[$controllerKey];
        if(!method_exists($controllerName, $methode)){
            echo "404 M";
            exit;
        }
        $controllerName::$methode();

    }
}
