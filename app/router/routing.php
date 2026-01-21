<?php
namespace router ;
class Routing{
    private static array $controllers = ["avocats"=>"avocatsController",
                                        "huissier"=>"huissierController",
                                        "home"=>"homeController",
                                        "dashboard"=>"dashboardController",
                                        "Statistiques"=>"statistiquesController",
                                        "Create"=>"CreateController",
                                        "DeleteAvocat"=>"DeleteAvocatController",
                                        "DeleteHuissier"=>"DeleteHuissierController",
                                        "editHuissier"=>"editHuissierController",
                                        "editAvocat"=>"editAvocatController",
                                        "json"=>"jsonController",
                                        "pagination"=>"paginationController",
                                        "Auth"=>"AuthController",
                                        "Form"=>"AuthController",
                                        "client" => "ClientController",
                                        "demande" => "DemandeController"
                                        ];
    public static function dispatch(){
        $page = $_GET['page'] ?? "home" ;
        $parts = explode('/', $page);
        $controllerKey = $parts[0];
        $methode = $parts[1] ?? null;
        
        if(array_key_exists($controllerKey,self::$controllers)){
        require_once __DIR__."/../Controller/".self::$controllers[$controllerKey].".php";
        }
        else{
        echo "404 C";
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
