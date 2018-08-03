<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.ico">

  <title>OfSoftware</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/open-iconic/font/css/open-iconic-bootstrap.min.css">

  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/standard.css">
  <link rel="stylesheet" href="css/produto.css">
  <!-- Fotorama -->
  <link href="css/fotorama.css" rel="stylesheet">
</head>

<body class="text-center">

  <?php

    require('scripts/conexao.php');

    $idExibicao = $_REQUEST['id'];


    $seleJogos = "SELECT nome_jogo, descricao FROM `tb_jogo` WHERE idjogo = $idExibicao";
    $requestInicial = mysqli_query($conexao, $seleJogos);

    $selePlat = "SELECT `nome_jogo`,`nome_plataforma` FROM `tb_jogo` LEFT JOIN `relaciona_plataforma` ON `tb_jogo`.idjogo=`relaciona_plataforma`.idjogo LEFT JOIN `tb_plataforma` ON `relaciona_plataforma`.idplataforma=`tb_plataforma`.idplataforma where `tb_jogo`.idjogo = $idExibicao";
    $seleGen = "SELECT `nome_jogo`,`nome_genero` FROM `tb_jogo` LEFT JOIN `relaciona_genero` ON `tb_jogo`.idjogo=`relaciona_genero`.idjogo LEFT JOIN `tb_genero` ON `relaciona_genero`.idgenero=`tb_genero`.idgenero where `tb_jogo`.idjogo = $idExibicao";

    $requestPlat = mysqli_query($conexao, $selePlat);
    $requestGen = mysqli_query($conexao, $seleGen);

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
          <?php

              $ftsCapas = "select nome_foto from tb_fotjog where idjogo = $idExibicao";
              $requestCapas = mysqli_query($conexao, $ftsCapas);

           ?>

          <h2>
             <?php while ($dadosCapas = mysqli_fetch_array($requestCapas)) {
               ?>
             <img class="img-fluid" src="img/capas/<?=$dadosCapas['nome_foto']?>" alt="">
             <?php
           } ?>
          </h2>
          <h2>
            <?php while ($dadosCapas = mysqli_fetch_array($requestCapas)) {
               ?>
            <!-- <img class="img-thumbnail" src="img/capas/<?=$dadosCapas['nome_foto']?>" alt=""> -->
            <?php
           } ?>
          </h2>
        </div>

        <div class="infos col-lg-6">
            <?php while ($requestDados = mysqli_fetch_array($requestInicial)) {
               ?>
          <div class="nome"><p><?= utf8_encode($requestDados['nome_jogo']);
           } ?></p></div>

          <div class="genero text-left px-3">
            <h4 class="pr-3">Gêneros:</h4>

            <p>
              <?php
              $contador = 0;
               while ($dadosGen = mysqli_fetch_array($requestGen)) {
                   if ($contador>0) {
                       echo ", ";
                   }
                   echo utf8_encode($dadosGen['nome_genero']);
                   $contador++;
               }
                ?>
            </p>
          </div>

          <div class="plataforma text-left px-3">
            <h4 class="pr-3">Plataformas:</h4>
            <p>
              <?php
              $contador = 0;
              while ($dadosPlat = mysqli_fetch_array($requestPlat)) {
                  if ($contador>0) {
                      echo ", ";
                  }
                  echo utf8_encode($dadosPlat['nome_plataforma']);
                  $contador++;
              }
              ?>
            </p>
          </div>

            <?php
                $seleJogos = "SELECT nome_jogo, descricao FROM `tb_jogo` WHERE idjogo = $idExibicao";
                $requestInicial = mysqli_query($conexao, $seleJogos);
                while ($requestDados = mysqli_fetch_array($requestInicial)) {
                    ?>
          <div class="descricao text-justify"><p><?= utf8_encode($requestDados['descricao']); ?></p></div>
            <?php
                } ?>

        </div>
      </div>

    <div class="galeria mx-auto">
      <div class="fotorama img-fluid" data-width="1000" data-nav="thumbs" data-loop="true" data-keyboard="true" data-thumbwidth="100" data-thumbheight="70">
        <?php

            $seleImg = "select nome_pasta from tb_galjog where idjogo = $idExibicao";
            $requestImg = mysqli_query($conexao, $seleImg);

            while ($dadosImg = mysqli_fetch_array($requestImg)) {
                ?>

      <img src="./img/img-jogos/<?= $dadosImg['nome_pasta']; ?>">

      <?php
            } ?>

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
    <footer class="mastfoot mt-3 ">
      <div class="inner text-center">
        <p>Of Software &copy; - 2018</p>
      </div>
    </footer>

  </div>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/nav.js"></script>
  <script src="js/fotorama.js"></script>
  <script src="js/redimensiona.js"></script>

  <script>
  $(document).ready(function() {
    setTimeout(function(){
      document.getElementsByClassName("fotorama__img")[0].style.borderRadius = "25px";
    }, 200);
  });
</script>
</body>

</html>
