<?php
require_once('conexao.php');
require_once('banco-jogo.php');
require_once('banco-genero.php');
require_once('banco-plataforma.php');
require_once("class/Jogo.php");
require_once("class/Plataforma.php");
require_once("class/Galeria.php");

$is_filtro_plataforma_ativo = isset($_REQUEST['filtro_p']);
$is_filtro_genero_ativo = isset($_REQUEST['filtro_g']);
$is_filtro_ativo = ($is_filtro_plataforma_ativo or $is_filtro_genero_ativo);

$n_plataformas = ($is_filtro_plataforma_ativo) ? sizeOf($_REQUEST['filtro_p']) : 0;
$n_generos = ($is_filtro_genero_ativo) ? sizeOf($_REQUEST['filtro_g']) : 0;
$n_total = $n_plataformas + $n_generos;

$sql_select = "SELECT * FROM mostra_tudo";
$sql_where = $sql_plataforma = $sql_genero = $sql_and = $sql_having = "";
$sql_group = " GROUP BY id_jogo";

if ($is_filtro_ativo) {
    $sql_where = " WHERE ";
    if ($is_filtro_plataforma_ativo) {
        $plataformas = $_REQUEST['filtro_p'];
        if (sizeof($plataformas) != 0){
            $sql_plataforma = "id_plataforma IN (" . implode(", ",$plataformas) . ")";
        }
    }   
    if ($is_filtro_genero_ativo and $is_filtro_plataforma_ativo) {
        $sql_and = " AND ";
    }
    if ($is_filtro_genero_ativo) {
        $generos = $_REQUEST['filtro_g'];
        if ($n_generos != 0){
            $sql_genero = "id_genero IN (" . implode(", ",$generos) . ")";
        }
    }   
    if ($n_plataformas>1 or $n_generos>1) {
        $sql_having = " HAVING ";
        if ($n_plataformas>1) {
            $limiter = $n_plataformas-1;
            $sql_having .= " COUNT(DISTINCT id_plataforma) > $limiter";
        }
        if ($n_generos>1) {
            $limiter = $n_generos-1;
            $sql_having .= (($n_total - $n_generos)>1) ? " AND COUNT(DISTINCT id_genero) > $limiter" : " COUNT(DISTINCT id_genero) > $limiter";
        }
    }
}

$sql_tudo = $sql_select . $sql_where . $sql_plataforma . $sql_and . $sql_genero . $sql_group . $sql_having;
$response =  mysqli_query($conexao, $sql_tudo);
$output = '';
if (mysqli_num_rows($response) > 0) {
    while ($dados_jogos = mysqli_fetch_array($response)) {
        $jogo = buscaJogo($dados_jogos['id_jogo'], $conexao);
        if ($jogo->getId() != 6) {
            $output .= '<div class="col-md-5 mx-4 bg-white mb-5 p-3 box-shadow mx-auto cartao">
    <a href="./produto.php?id=' . $jogo->getId() . '"><img class="mt-1 card-img-top img-cover-custom" src="img/capas/' . $jogo->getFoto() . '" alt="Card image cap"></a>
    <div class="cartao-corpo bg-main-lighter"><h4 class="text-center">' . $jogo->getNome() . '</h4></div> <div class="mini-cartao-corpo bg-main-lighter"><h4 class="text-center">' . $jogo->getNome() . '</h4></div></div>';
        }
    }
} else {
    $output .= "<div class='mx-auto text-center'>
        <h1 class='font-italic'>\"Ai! Nada aconteceu... ¯\_(ツ)_/¯\"</h2>
        <h3 class='pt-4'>Embora tenhamos uma vasta coleção de jogos, a sua escolha de filtros não retornou nada. <br /> Um dia iremos resolver esse problema! 😅</h3>
    </div>";
}
echo $output;