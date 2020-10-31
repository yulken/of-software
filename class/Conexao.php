<?php
require_once 'config.php';
class Conexao{

    public static function getConexao(){
        $conexao = new PDO(DB_DRIVE . ":host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE, 
            DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }
}

?>