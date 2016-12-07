<?php
  //error_reporting(E_ALL ^ E_NOTICE);
  require_once('mostra-alerta.php');
  require_once('logica-usuario.php');
  //echo  . '/public_html/' .'mostra-alerta.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja</title>
    <link rel="stylesheet" href="bower_components\bootstrap\dist\css\bootstrap-paper.min.css">
    <link rel="stylesheet" href="css\style.css">
    <script type="text/javascript" src="bower_components\jquery\dist\jquery.min.js"></script>
    <script type="text/javascript" src="bower_components\bootstrap\dist\js\bootstrap.min.js"></script>
    <script type="text/javascript" src="js\script.js" defer></script>
  </head>
  <body>
    <div class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Minha Loja </a>
        </div>
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-2" aria-expanded="false" style="height: 1px;">
          <ul class="nav navbar-nav">
            <li><a href="produto-formulario.php">Adiciona Produto</a></li>
            <li><a href="produto-lista.php">Lista Produto</a></li>
            <li><a href="contato.php">Contato</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <?php if(usuarioEstaLogado()) { ?>
            <li><a href="logout.php">Logout</a></li>
          <?php }else { ?>
            <li><a href="index.php">Login</a></li>
          <?php }; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <?php
        mostraAlerta("success");
        mostraAlerta("danger");
      ?>
