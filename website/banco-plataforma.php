<?php
require_once("conexao.php");
require_once("class/Plataforma.php");

function buscaPlataforma($id, $conexao){
    $plataformas = array();
    $sql_plataformas = "SELECT `plataforma`.*
                        FROM `jogo`
                        LEFT JOIN `relaciona_plataforma` ON `jogo`.`id`=`relaciona_plataforma`.`id_jogo`
                        LEFT JOIN `plataforma` ON `relaciona_plataforma`.`id_plataforma`=`plataforma`.`id`
                        WHERE `jogo`.`id` =" . $id;

    $request = mysqli_query($conexao, $sql_plataformas);
    while ($array_plataforma = mysqli_fetch_array($request)){
        $plataforma = new Plataforma($array_plataforma['id'], $array_plataforma['nome']);
        array_push($plataformas, $plataforma);
    }
    return $plataformas;
}

function listaPlataformas($conexao){
    $plataformas = array();
    $sql_plataforma = "SELECT * FROM `plataforma` ORDER BY `nome`";
    $request = mysqli_query($conexao, $sql_plataforma);
    while ($array_plataforma = mysqli_fetch_array($request)) {
        $plataforma = new Plataforma($array_plataforma['id'], $array_plataforma['nome']);
        array_push($plataformas,$plataforma);
    }
    return $plataformas;
}