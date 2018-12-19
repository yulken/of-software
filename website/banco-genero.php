<?php 
require_once("conexao.php");
require_once("class/Genero.php");

function buscaGenero($id, $conexao){
    $generos = array();
    $sql_genero = "SELECT `genero`.*
                  FROM `jogo`
                  LEFT JOIN `relaciona_genero` ON `jogo`.`id`=`relaciona_genero`.`id_jogo`
                  LEFT JOIN `genero` ON `relaciona_genero`.`id_genero`=`genero`.`id`
                  WHERE `jogo`.`id`=" . $id;

    $request = mysqli_query($conexao, $sql_genero);
    while ($array_genero = mysqli_fetch_array($request)){
        $genero = new Genero($array_genero['id'], $array_genero['nome']);
        array_push($generos, $genero);
    }
    return $generos;
}

function listaGeneros($conexao){
    $generos = array();
    $sql_genero = "SELECT * FROM `genero` ORDER BY `nome`";
    $request = mysqli_query($conexao, $sql_genero);
    while ($array_genero = mysqli_fetch_array($request)) {
        $genero = new Genero($array_genero['id'], $array_genero['nome']);
        array_push($generos,$genero);
    }
    return $generos;
}
?>