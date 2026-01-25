<?php

namespace router;

use Middleware\HuissierMidlleWare;
use Middleware\ClientMidlleWare;
use Middleware\AvocatMidlleWare;
use Middleware\AdminMidlleWare;
use router\Roles;
use Controller;
use ReflectionClass;
use render\View;

class Routing
{
    private static array $controllers = [
        "avocats" => "avocatsController",
        "huissier" => "huissierController",
        "home" => "HomeController",
        "dashboard" => "dashboardController",
        "statistiques" => "statistiquesController",
        "create" => "CreateController",
        "deleteAvocat" => "DeleteAvocatController",
        "deleteHuissier" => "DeleteHuissierController",
        "editHuissier" => "editHuissierController",
        "editAvocat" => "editAvocatController",
        "json" => "jsonController",
        "pagination" => "paginationController",
        "auth" => "AuthController",
        "form" => "AuthController",
        "client" => "ClientController",
        "demandes" => "DemandeController"
    ];

    public static function dispatch()
    {

        $page = $_GET['page'] ?? "home";
        $parts = explode('/', $page);
        $controllerKey = strtolower($parts[0]);
        $methode = $parts[1] ?? null;
        if (isset(Roles::$roles[$controllerKey])) {
            if (!isset($_SESSION['role'])) {
                header("Location:/PHP-BREF4/auth/login");
                exit;
            }

            switch ($_SESSION['role']) {
                case 'admin':
                    AdminMidlleWare::handle();
                    break;
                case 'avocat':
                    AvocatMidlleWare::handle();
                    break;
                case 'huissier':
                    HuissierMidlleWare::handle();
                    break;
                case 'client':
                    ClientMidlleWare::handle();
                    break;
            }

            if (!in_array($_SESSION['role'], Roles::$roles[$controllerKey])) {
                header("Location:/PHP-BREF4/home");
                exit;
            }
        }

        $controllerName = "Controller\\" . self::$controllers[$controllerKey];
        if (array_key_exists($controllerKey, self::$controllers)) {
            // new $controllerName();
            require_once __DIR__ . "/../Controller/" . self::$controllers[$controllerKey] . ".php";
        } else {
            echo "404 C";
        }

        if (!$methode) {
            $refelction = new ReflectionClass($controllerName);
            $typeMethode = $refelction->getMethod('index');
            if ($typeMethode->isStatic()) {
                $controllerName::index();
            } else {

                (new $controllerName)->index();
            }
            return;
        }

        if (!method_exists($controllerName, $methode)) {
            echo "404 M";
            exit;
        }
        $refelction = new ReflectionClass($controllerName);
        $typeMethode = $refelction->getMethod($methode);
        if ($typeMethode->isStatic()) {
            $controllerName::$methode();
        } else {

            (new $controllerName)->$methode();
        }
    }
}
