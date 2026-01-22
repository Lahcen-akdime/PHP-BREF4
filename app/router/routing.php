<?php

namespace router;

use render\View;

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
        "demandes" => "DemandeController",
        "pagination" => "paginationController"
    ];
    public static function dispatch()
    {
        $page = $_GET['page'] ?? "home";
        $parts = explode('/', $page);
        $controllerKey = strtolower($parts[0]);
        $methode = $parts[1] ?? null;
        $controllerName = "Controller\\" . self::$controllers[$controllerKey];
        if (array_key_exists($controllerKey, self::$controllers)) {
            new $controllerName();
        } else {
            echo "404 C";
        }

        if (!$methode) {
            View::render('Dashboards/home');
            return;
        }

        if (!method_exists($controllerName, $methode)) {
            echo "404 M";
            exit;
        }

        (new $controllerName())->$methode();
    }
}
