<?php
  //require_once('conecta.php');
  require_once('banco-usuario.php');
  require_once('logica-usuario.php');
  $emailUsuario = $_POST['email'];
  $senhaUsuario = $_POST['senha'];

  $usuario = buscaUsuario($conexao, $emailUsuario, $senhaUsuario);

  if($usuario == null) {
      $_SESSION['danger'] = "Usuário o senha inválidos!";
      header("Location: index.php");
  } else {
      $_SESSION['success'] = "Usuário conectado!";
      logaUsuario($usuario['email_usuario']);
      header("Location: index.php");
  }
  die();
  //echo json_encode($usuario);
