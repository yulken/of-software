<?php
require_once 'class/config.php';
spl_autoload_register(function($nome_da_classe){
    if (file_exists('class/' . $nome_da_classe . '.php')){
        require_once('class/'. $nome_da_classe . '.php');
    }
});

function testa($string){
    echo "<pre>";
    print_r($string);
    echo "</pre>";
}