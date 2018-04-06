<?php
require('conexao.php');
$sel_jogos = "SELECT * FROM mostra_tudo group BY nome_jogo";

$isFiltroPlataformaAtivo = isset($_REQUEST['filtroP']);
$isFiltroGeneroAtivo = isset($_REQUEST['filtroG']);
$isFiltroAtivo = ($isFiltroPlataformaAtivo or $isFiltroGeneroAtivo);

if ($isFiltroAtivo) {
    //FRAGMENTOS INICIAIS DE QUERIES
    $QuerySelect = "SELECT * FROM mostra_tudo WHERE";
    $QueryArray = array($QuerySelect);
    $countPlataformas = ($isFiltroPlataformaAtivo) ? sizeOf($_REQUEST['filtroP']) : 0;
    $countGeneros = ($isFiltroGeneroAtivo) ? sizeOf($_REQUEST['filtroG']) : 0;
    $countTotal = $countPlataformas + $countGeneros;
    $currentCounter = 0;
    //FIM DE FRAGMENTOS INICIAIS DE QUERIES

    //FRAGMENTOS COMPLEMENTARES DO WHERE
    if ($isFiltroPlataformaAtivo) {
        $plataformas = $_REQUEST['filtroP'];
        if ($countPlataformas>1 and $countGeneros>1) {
            for ($i=0; $i <$countPlataformas ; $i++) {
                $QueryWhere = ($i==0) ? " (idplataforma=$plataformas[$i]" : " OR idplataforma=$plataformas[$i]";
                array_push($QueryArray, $QueryWhere);
                $currentCounter++;
            }
            array_push($QueryArray, ")");
        } else {
            for ($i=0; $i <$countPlataformas ; $i++) {
                $QueryWhere = ($i==0) ? " idplataforma=$plataformas[$i]" : " OR idplataforma=$plataformas[$i]";
                array_push($QueryArray, $QueryWhere);
                $currentCounter++;
            }
        }
    }

    if ($isFiltroGeneroAtivo and $isFiltroPlataformaAtivo) {
        $QueryAndOr = ($countPlataformas>0 and $countGeneros>0) ? " AND" : "";
        array_push($QueryArray, $QueryAndOr);
    }

    if ($isFiltroGeneroAtivo) {
        $generos = $_REQUEST['filtroG'];
        if ($countPlataformas>1 and $countGeneros>1) {
            for ($i=0; $i <$countGeneros ; $i++) {
                $QueryWhere = ($i==0) ? " (idgenero=$generos[$i]" : " OR idgenero=$generos[$i]";
                array_push($QueryArray, $QueryWhere);
                $currentCounter++;
            }
            array_push($QueryArray, ")");
        } else {
            for ($i=0; $i <$countGeneros ; $i++) {
                $QueryWhere = ($i==0) ? " idgenero=$generos[$i]" : " OR idgenero=$generos[$i]";
                array_push($QueryArray, $QueryWhere);
                $currentCounter++;
            }
        }
    }

    //FIM DE FRAGMENTOS COMPLEMENTARES DO WHERE
    //FRAGMENTOS DA METADE DA QUERY
    $QueryGroup = " GROUP BY nome_jogo";
    array_push($QueryArray, $QueryGroup);

    if ($countPlataformas>1 or $countGeneros>1) {
        $QueryHaving = " HAVING";
        array_push($QueryArray, $QueryHaving);
    }
    //FIM DE FRAGMENTOS DA METADE DA QUERY

    //FRAGMENTOS COMPLEMENTARES DO HAVING
    if ($countPlataformas>1) {
        $limiter = $countPlataformas-1;
        $QueryHavingComplement = " COUNT(DISTINCT nome_plataforma) > $limiter";
        array_push($QueryArray, $QueryHavingComplement);
    }

    if ($countGeneros>1) {
        $limiter = $countGeneros-1;
        $QueryHavingComplement = (($countTotal - $countGeneros)>1) ? " AND COUNT(DISTINCT nome_genero) > $limiter" : " COUNT(DISTINCT nome_genero) > $limiter";
        array_push($QueryArray, $QueryHavingComplement);
    }
    //FIM DE FRAGMENTOS COMPLEMENTARES DO HAVING


    //CONCATENACAO DE TODOS OS FRAGMENTOS ADQUIRIDOS
    $QueryConcatenada="";
    for ($i=0; $i <sizeof($QueryArray) ; $i++) {
        $QueryConcatenada = $QueryConcatenada . $QueryArray[$i];
    }
    //FIM DE CONCATENACAO DE TODOS OS FRAGMENTOS ADQUIRIDOS

    $sel_jogos = $QueryConcatenada;
}

//JOGANDO A QUERY FILTRADA NO BANCO E RETORNANDO SEU RESULTADO
$res_jogos = mysqli_query($conexao, $sel_jogos);
if (mysqli_num_rows($res_jogos) > 0) {
    while ($dados_jogos = mysqli_fetch_array($res_jogos)) {
        $nome_foto = $dados_jogos['nome_foto'];
        $id_jogo =  $dados_jogos['idjogo'];
        $nome_jogo =  $dados_jogos['nome_jogo'];
        if ($id_jogo != 6) {
            echo  '<div class="col-md-5 mx-4 bg-white mb-5 p-3 box-shadow mx-auto cartao">
      <a href="./produto.php?id=' . $id_jogo . '"><img class="mt-1 card-img-top img-cover-custom" src="img/capas/' . $nome_foto . '" alt="Card image cap"></a>
      <div class="cartao-corpo bg-main-lighter"><h4 class="text-center">' . $nome_jogo . '</h4></div> <div class="mini-cartao-corpo bg-main-lighter"><h4 class="text-center">' . $nome_jogo . '</h4></div></div>';
        }
    }
} else {
    echo  "<div class='mx-auto text-center'>
        <h1 class='font-italic'>\"Ai! Nada aconteceu...\"</h2>
        <h3 class='pt-4'>Embora tenhamos uma vasta coleção de jogos, a sua escolha de filtros não retornou nada. <br /> Um dia iremos resolver esse problema! 😅</h3>
      </div>";
}
