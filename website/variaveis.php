<?php
  require_once('conexao.php');

  $dado = mysqli_fetch_row(mysqli_query($conexao, "SELECT MAX(id) FROM plataforma"));
  $maxIdP = $dado[0];
  $dado = mysqli_fetch_row(mysqli_query($conexao, "SELECT MAX(id) FROM genero"));
  $maxIdG = $dado[0];

  $respostas = array('MaxPlat' => $maxIdP, 'MaxGen' => $maxIdG);
  echo json_encode($respostas);
?>