<?php
  require('conexao.php');

  $dado = mysqli_fetch_row(mysqli_query($conexao, "SELECT MAX(idplataforma) FROM tb_plataforma"));
  $maxIdP = $dado[0];
  $dado = mysqli_fetch_row(mysqli_query($conexao, "SELECT MAX(idgenero) FROM tb_genero"));
  $maxIdG = $dado[0];

  $respostas = array('MaxPlat' => $maxIdP, 'MaxGen' => $maxIdG);
  echo json_encode($respostas);
