<?php
spl_autoload_register(function(string $className){
$pa = __DIR__ . "\\..\\" . '/app/' . $className . ".php";
$fille = str_replace('\\', '/', $pa);
if(file_exists($fille)){
    require $fille;
}
});
