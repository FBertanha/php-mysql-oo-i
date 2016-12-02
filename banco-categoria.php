<?php
  //include('conecta.php');
  require_once('conecta.php');
  function listaCategoria($conexao) {
    $categorias = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM categorias limit 3");
    while($categoria = mysqli_fetch_array($resultado)) {
      array_push($categorias, $categoria);
    };
    return $categorias;
  };
