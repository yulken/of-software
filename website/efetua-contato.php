<?php

    require("conexao.php");

    $nome = $_POST['contatoNome'];
    $email = $_POST['contatoEmail'];
    $assunto = (isset($_POST['contatoAssunto'])) ? $_POST['contatoAssunto'] : "" ;
    $mensagem = $_POST['contatoMensagem'];

    $contatoSql = "insert into tb_contato values (null, '$nome', '$email', '$assunto', '$mensagem')";
    $contatoResultado = mysqli_query($conexao, $contatoSql);

    header('location: ../index.php');

 ?>

<?php

    // mail(to,subject,message,headers,parameters) php's mail syntax
    $ofsoftwareEmail = "caiocftorres@gmail.com";
    $contatoOfSoftware = "contato@ofsoftware.com";
    $assuntoEmail = ($assunto == 1) ? "Sugestão" : (($assunto == 2) ? "Bugs" : (($assunto == 3) ? "Glitches" : "Outros")) ;

      $mensagemEmail = "
      <html>
      <head>
      <title></title>
      </head>
      <body style='font-family:sans-serif;'>
      <table>
      <thead>
        <tr>
          <td colspan=2 style='padding:5px; background-color: #444; color: white; font-size: 0.75em; text-align:center;'><h1>Categoria - $assuntoEmail</h1></td>
        </tr>
      </thead>
      <tbody style='text-align:center;'>
        <tr>
          <td style='width:300px; padding:10px; background-color:#c9c4c4'>Nome: $nome</td>
          <td style='width:300px; padding:10px; background-color:#c9c4c4'>Email: $email</td>
        </tr>
        <tr>
          <td colspan=2 style='font-style:italic; padding-top:30px;background-color:#c9c4c4; vertical-align:middle;'>\"$mensagem\"</td>
        </tr>
      </tbody>
      </table>
      </body>
      </html>
";
    $headers = 'From: ' .$contatoOfSoftware . "\r\n" .
               'Reply-To: ' .  $email. "\r\n" .
               'Content-type: text/html; charset=utf-8' . "\r\n";
    mail($ofsoftwareEmail, $assuntoEmail, $mensagemEmail, $headers);
 ?>
