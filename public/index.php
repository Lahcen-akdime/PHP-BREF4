<?php
require_once "autoloading.php";
session_start();
use models\Avocat ;
use models\Huissier ;
use router\Routing ;
routing::dispatch();