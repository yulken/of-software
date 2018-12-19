<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php require_once('head.php'); ?>
  <link rel="stylesheet" href="css/standard.css">
  <link rel="stylesheet" href="css/produto.css">
  <link rel="stylesheet" href="css/fotorama.css">
</head>

<body class="text-center">

  <?php
    require_once('conexao.php');
    require_once('banco-jogo.php');
    require_once('banco-plataforma.php');
    require_once('banco-genero.php');
    require_once('class/Jogo.php');
    require_once('class/Plataforma.php');
    require_once('class/Genero.php');
    require_once('class/Galeria.php');

    $idExibicao = $_REQUEST['id'];
    $jogo = buscaJogo($idExibicao, $conexao);
    $plataformas = buscaPlataforma($jogo->getId(), $conexao);
    $generos = buscaGenero($jogo->getId(), $conexao);
    $galeria = buscaGaleria($jogo->getId(), $conexao);
   ?>

  <div class="d-flex p-3 mx-auto flex-column col-12">
    <header class="cover-container masthead mb-auto mx-auto">
      <div class="inner">
        <a href="./index.php"><h3 class="masthead-brand mr-5 col-12">OF Software</h3></a>
      </div>
    </header>
    <div class="area-jogo container">
    <div class="corpo bg-darker p-3">
    <div class="row">
    <div class="capa col-lg-6">
        <h2>
            <img class="img-fluid" src="img/capas/<?=$jogo->getFoto()?>" alt="">
        </h2>
    </div>

    <div class="infos col-lg-6">
        <div class="nome"><p><?=utf8_encode($jogo->getNome());?></p></div>
        <div class="genero text-left px-3">
        <h4 class="pr-3">Gêneros:</h4>
        <p>
            <?php $contador = 0;
            foreach($generos as $genero){
                if ($contador>0) echo ", ";
                echo utf8_encode($genero->getNome());
                $contador++;
            }
            ?>
        </p>
        </div>
        <div class="plataforma text-left px-3">
        <h4 class="pr-3">Plataformas:</h4>
        <p>
            <?php $contador = 0;
            foreach($plataformas as $plataforma){
                if ($contador>0) echo ", ";
                echo utf8_encode($plataforma->getNome());
                $contador++;
            }
            ?>
        </p>
        </div>
        <div class="descricao text-justify"><p><?= utf8_encode($jogo->getDescricao()); ?></p></div>
      </div>
    </div>

    <div class="galeria mx-auto">
      <div class="fotorama img-fluid" data-width="1000" data-nav="thumbs" data-loop="true" data-keyboard="true" data-thumbwidth="100" data-thumbheight="70">

        <?php foreach ($galeria->getPaths() as $imagem) { ?>
      <img src="./img/img-jogos/<?= $imagem ?>">
        <?php } ?>

      </div>
      <!-- CASO SEJA O RED BAD RECOVERY 2 -->
      <?php if ($idExibicao == 6) {?>

          <div class="row pt-5 mx-auto text-center quotes">
            <div class="col-7 col-sm-5 col-md-3 mx-auto bg-main-lighter p-3 m-3">
              <span class="oi oi-double-quote-serif-left"></span>
              <blockquote cite="OF Software"class="font-italic">Sem dúvida será uma revolução nos jogos do estilo 'Velho Oeste'</blockquote>
              <cite></cite>
            </div>
            <div class="col-7 col-sm-5 col-md-3 mx-auto bg-main-lighter p-3 m-3">
              <span class="oi oi-double-quote-serif-left"></span>
              <blockquote cite="Digital Chumps" class="font-italic">Uma obra-prima que não deve se passar despercebida.</blockquote>
            </div>
            <div class="col-7 col-sm-5 col-md-3 mx-auto bg-main-lighter p-3 m-3">
              <span class="oi oi-double-quote-serif-left"></span>
              <blockquote cite="IGN" class="font-italic">Mundo vasto e atrativo</blockquote>
            </div>
          </div>

      <?php } ?>
    </div>

    </div>
    
  <?php require_once('footer.php');?>
  <script src="js/fotorama.js"></script>
  <script src="js/redimensiona.js"></script>
</body>

</html>