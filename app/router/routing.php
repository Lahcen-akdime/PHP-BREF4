<?php
class routing{
    private static array $controllers = ["avocats"=>"avocatsController",
                                        "huissier"=>"huissierController",
                                        "home"=>"homeController",
                                        "dashboard"=>"dashboardController"];
    public static function dispatch(){
        $page = $_GET['page'] ?? "home" ;
        if(array_key_exists($page,self::$controllers)){
        require_once __DIR__."/../Controller/$page"."Controller.php";
        }
        else{
            echo "404";
        }
    }
}
