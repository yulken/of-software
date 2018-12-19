<?php
require_once("conexao.php");
require_once("class/Jogo.php");
require_once("class/Galeria.php");

function buscaJogo($id, $conexao){
    $jogo = new Jogo();
    $sql_jogos = "SELECT `nome`, `descricao`, `foto` FROM `jogo` WHERE `id` = $id";
    $request = mysqli_query($conexao, $sql_jogos);
    while ($array_jogo = mysqli_fetch_array($request)) {
        $jogo->setId($id);
        $jogo->setNome($array_jogo['nome']);
        $jogo->setDescricao($array_jogo['descricao']);
        $jogo->setFoto($array_jogo['foto']);
    }
    return $jogo;
}

function buscaGaleria($id, $conexao){
    $galeria = new Galeria();
    $galeria->setId($id);
    $fotos = array();

    $sql_galeria = "SELECT * FROM `galeria_jogos` WHERE `id_jogo` = $id";
    $request = mysqli_query($conexao, $sql_galeria);
    while ($array_galeria = mysqli_fetch_array($request)){
        $foto = $array_galeria['caminho'];
        array_push($fotos, $foto);
    }
    $galeria->setPaths($fotos);
    return $galeria;

}
