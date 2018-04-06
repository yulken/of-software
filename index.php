<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/favicon.ico">
  <title>Of Software</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/open-iconic/font/css/open-iconic-bootstrap.min.css">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/standard.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="css/album.css">

</head>

<body>
  <div class="d-flex p-3 flex-column col-12">
    <header class="cover-container masthead">
        <nav class="navbar navbar-expand-lg navbar-dark bg-darker nav-masthead fixed-top">
        <div class="container">
          <a class="navbar-brand" href="index.php">OF Software</a>
          <button class="navbar-toggler bg-darker" type="button" data-toggle="collapse" data-target="#navOf" aria-controls="navOf" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>

          <div class="collapse navbar-collapse text-center" id="navOf">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link active" data-target="#carouselExampleIndicators" data-slide-to="0" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-target="#carouselExampleIndicators" data-slide-to="1" href="#">Produtos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-target="#carouselExampleIndicators" data-slide-to="2" href="#">Contato</a>
              </li>
            </ul>
          </div>
        </div>
        </nav>
    </header>

    <main role="main" class="inner main">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner h-100 row mx-auto">



          <!-- HOME -->

          <div class="coming-soon carousel-item active mx-auto mt-5 text-center">
            <div class="row">
              <div class="col-12 col-sm-8 col-md-7 col-lg-5 col-xl-4 descricao bg-descricao">
                <h2 class="cover-heading coming-soon-h2 text-left">Red Bad Recovery II</h1>
                <p class="lead p-1 coming-soon-p">
                  Descubra como tudo começou...
                </p>
                <p class="lead p-1 coming-soon-p">
                  <a href="produto.php?id=6" class="btn btn-lg btn-secondary">Ver mais</a>
                </p>
              </div>
            </div>
            <div class="coming-soon-img"></div>
          </div>

          <!-- FIM DA HOME -->




            <!-- PRODUTOS, AMIGO -->

          <div class="carousel-item mt-5 mx-auto">
        <div id="content" class="h-100 mx-auto">
            <div class="album py-5 w-75 bg-darker h-100 text-light mx-auto">
              <div id="fader" class="w-100 col-12 unfaded"></div>
              <div id="sidebar" class="bg-main-lighter">
                <div class="sidebar-content p-2 pt-4">
                  <div class="sidebar-header">
                      <h3 class="font-weight-bold">Filtros</h3>
                  </div>

                  <!-- PHP RESPONSAVEL POR BUSCAR FILTROS -->
                <?php
                    require('scripts/conexao.php');

                    $generoSql = "SELECT * FROM tb_genero ORDER BY nome_genero";
                    $plataformaSql = "SELECT * FROM tb_plataforma ORDER BY nome_plataforma";


                    $plataformaQuery = mysqli_query($conexao, $plataformaSql);
                    $generoQuery = mysqli_query($conexao, $generoSql);
                 ?>
                 <!-- FIM DE PHP RESPONSAVEL POR BUSCAR FILTROS -->

                  <ul class="list-unstyled components  pl-4">
                      <li>
                        <a href="#platSubmenu" data-toggle="collapse" aria-expanded="false" class="font-weight-bold  ">Plataforma</a>
                        <ul class="lista-filtro collapse list-unstyled" id="platSubmenu">
                          <!-- PHP QUE EXIBE PLATAFORMAS -->
                        <?php while ($plataformaDados = mysqli_fetch_array($plataformaQuery)) {
                     ?>
                            <li><a class="filtro filtro-plataforma plat<?=$plataformaDados['idplataforma']?>" href='#'><?= utf8_encode($plataformaDados['nome_plataforma']); ?></a></li>
                        <?php
                 } ?>
                        </ul>
                      </li>
                      <li>
                          <a href="#generoSubmenu" data-toggle="collapse" aria-expanded="false" class="font-weight-bold">Gênero</a>
                          <ul class="lista-filtro collapse list-unstyled" id="generoSubmenu">
                            <!-- PHP QUE EXIBE GENEROS -->
                          <?php while ($generoDados = mysqli_fetch_array($generoQuery)) {
                     ?>
                                <li><a class="filtro filtro-genero gen<?=$generoDados['idgenero']?>" href="#"><?= utf8_encode($generoDados['nome_genero']); ?></a></li>
                          <?php
                 } ?>
                          </ul>
                      </li>
                  </ul>
                </div>
                </div>
                <span class="oi oi-magnifying-glass bt"></span>
              <div class="text-center w-100 pb-5">
                <h2 class="t-produtos">Lançamentos</h2>
              </div>
              <div class="row mx-auto album-list h-100">

                    <!-- JQUERY JOGA CONTEUDO AQUI   -->

              </div>
            </div>
          <div class="overlay"></div>
        </div>
      </div>



        <!-- FIM DE PRODUTOS, AMIGO -->

        <!-- CONTATOS!! -->

          <div class="carousel-item mt-5 mx-auto">
                     <form class="container text-white" action="scripts/efetua-contato.php" method="post">

                       <div class="form-group">
                         <label for="exampleFormControlInput1">Nome</label>
                         <input type="text" name="contatoNome" class="form-control" id="">
                       </div>
                       <div class="form-group">
                         <label for="exampleFormControlInput1">Email</label>
                         <input type="email" name="contatoEmail" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                       </div>
                       <div class="form-group">
                         <label for="exampleFormControlSelect1" class="text-left">Assunto</label>
                         <select required name="contatoAssunto" class="form-control" id="exampleFormControlSelect1">
                           <option value="1">Sugestão</option>
                           <option value="2">Bugs</option>
                           <option value="3">Glitches</option>
                           <option>Outros</option>
                         </select>
                       </div>
                       <div class="form-group">
                         <label for="exampleFormControlTextarea1">Mensagem</label>
                         <textarea name="contatoMensagem" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                       </div>
                       <button type="submit" class="btn btn-secondary">Enviar</button>
                       <button type="reset" class="btn btn-secondary">Limpar</button>

                     </form>

               </div>
          <!-- FIM DE CONTATOS!!!! -->
        </div>
        </div>
      </main>

        <footer class="mastfoot mt-auto">
          <div class="inner text-center">
            <p>Of Software &copy; - 2018</p>
          </div>
        </footer>

      </div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/nav.js"></script>
  <script src="js/sidebar.js"></script>
  <script src="js/album.js"></script>
  <script src="js/redimensiona.js"></script>

</body>

</html>
