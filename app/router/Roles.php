<?php

namespace router;

class Roles
{
    public static array $roles = [
        "home" => ["avocat", "huissier", "client", "admin"],
        "huissier" => ["huissier", "admin"],
        "dashboard" => ["admin"],
        "statistiques" => ["admin", "avocat", "huissier"],
        "create" => ["admin"],
        "deleteAvocat" => ["admin"],
        "deleteHuissier" => ["admin"],
        "editHuissier" => ["admin"],
        "editAvocat" => ["admin"],
        "json" => ["admin", "avocat", "huissier"],
        "pagination" => ["admin"],
        "client" => ["avocat", "huissier", "client", "admin"],
        "demandes" => ["avocat", "huissier", "admin", "client"],
    ];
}
