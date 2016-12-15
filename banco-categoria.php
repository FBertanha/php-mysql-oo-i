<?php
  //include('conecta.php');
  require_once('conecta.php');
  require_once('class/Categoria.php');

  function listaCategoria($conexao) {
    $categorias = array();
    $resultado = mysqli_query($conexao, "SELECT * FROM categorias limit 3");
    while($categoria_array = mysqli_fetch_array($resultado)) {
      $categoria = new Categoria();
      $categoria->setId($categoria_array[0]);
      $categoria->setNome($categoria_array[1]);
      array_push($categorias, $categoria);
    };

    return $categorias;
  };
