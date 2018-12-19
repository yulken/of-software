<!DOCTYPE html>
<html lang="pt-br">

<head>

  <?php require_once('head.php'); ?>
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/sidebar.css">
  <link rel="stylesheet" href="css/album.css">

</head>

<body>
  <div class="d-flex p-3 flex-column col-12">
    <main role="main" class="inner main">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner h-100 row mx-auto">
        <?php include_once('home.php');?>
        <?php include_once('exibe-produtos.php');?>
        <?php include_once('contatos.php');?>
        </div>
        </div>
      </main>

  <?php include_once('footer.php');?>
  <script src="js/sidebar.js"></script>
  <script src="js/album.js"></script>
  <script src="js/redimensiona.js"></script>

</body>
</html>
