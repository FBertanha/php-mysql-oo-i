<?php
  require_once('logica-usuario.php');

  deslogaUsuario();
  $_SESSION['success'] = "Usuário desconectado!";
  header("Location: index.php");
  die();
