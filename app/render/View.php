<?php
namespace render;

class View {
    public static function render(string $path, array $options = []){
        extract($options);
        $content = __DIR__ . "/../../../src/views/" . $path . ".php";
        require_once $content;
        
    }
}