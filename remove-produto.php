<?php
  require_once('header.php');
  //require_once('conecta.php');
  require_once('banco-produto.php');
  require_once('logica-usuario.php');
  verificaUsuario();

  $id = $_POST['id'];
  removeProduto($conexao, $id);
  $_SESSION['success'] = "Produto removido!";
  header("Location: produto-lista.php");
  die();
?>
