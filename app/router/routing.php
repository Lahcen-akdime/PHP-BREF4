<?php
namespace router ;
use Controller;
use render\View;
class Routing{
    private static array $controllers = ["avocats"=>"avocatsController",
                                        "huissier"=>"huissierController",
                                        "home"=>"homeController",
                                        "dashboard"=>"dashboardController",
                                        "statistiques"=>"statistiquesController",
                                        "create"=>"CreateController",
                                        "deleteAvocat"=>"DeleteAvocatController",
                                        "deleteHuissier"=>"DeleteHuissierController",
                                        "editHuissier"=>"editHuissierController",
                                        "editAvocat"=>"editAvocatController",
                                        "json"=>"jsonController",
                                        "pagination"=>"paginationController",
                                        "auth"=>"AuthController",
                                        "form"=>"AuthController",
                                        "client" => "ClientController",
                                        "demande" => "DemandeController",
                                        "statistiques" => "StatistiquesController",
                                        ];
    public static function dispatch(){
        $page = $_GET['page'] ?? "home" ;
        $parts = explode('/', $page);
        $controllerKey = strtolower($parts[0]);
        $methode = $parts[1] ?? null;
        $controllerName = "Controller\\" . self::$controllers[$controllerKey];
        
        if(array_key_exists($controllerKey,self::$controllers)){
            new $controllerName();
        }
        else{
        echo "404 C";
        }

        if(!$methode) {
            View::render('Dashboards/home');
            return;
            }
        
        if(!method_exists($controllerName, $methode)){
            echo "404 M";
            exit;
        }

        $controllerName::$methode();

    }
}
