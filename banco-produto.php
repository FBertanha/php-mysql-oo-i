<?php
//include('conecta.php');
  require_once('conecta.php');

  function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "SELECT p.id_produto, p.nome_produto, p.descricao_produto, c.nome_categoria, IF(p.usado_produto = '1', 'Usado', 'Novo'), p.preco_produto FROM produtos AS p JOIN categorias AS c ON c.id_categoria = p.id_categoria ORDER BY p.id_produto");
    while($produto = mysqli_fetch_array($resultado)) {
      array_push($produtos, $produto);
    };
    return $produtos;
  };

  function insereProduto($conexao, $produto, $preco, $descricao, $categoria, $usado) {
    $produto = mysqli_real_escape_string($conexao, $produto);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $query = "INSERT INTO produtos (nome_produto, preco_produto, descricao_produto, id_categoria, usado_produto) VALUES ('{$produto}', '{$preco}', '{$descricao}', '{$categoria}', '{$usado}')";
    //echo $query;
    return mysqli_query($conexao, $query);
  };

  function removeProduto($conexao, $id) {
    $query = "DELETE FROM produtos WHERE id_produto = '{$id}'";
    return mysqli_query($conexao, $query);
  };

  function buscaProduto($conexao, $id) {
    $resultado = mysqli_query($conexao, "SELECT p.id_produto, p.nome_produto, p.preco_produto, p.descricao_produto, c.id_categoria, IF(p.usado_produto = '1', 'checked', '') FROM produtos AS p JOIN categorias AS c ON c.id_categoria = p.id_categoria WHERE p.id_produto = '{$id}'");
    $produto = mysqli_fetch_row($resultado);
    return $produto;
  };

  function alteraProduto($conexao, $id, $produto, $preco, $descricao, $categoria, $usado) {
    $produto = mysqli_real_escape_string($conexao, $produto);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $query = "UPDATE produtos SET nome_produto = '{$produto}' , preco_produto = '{$preco}', descricao_produto = '{$descricao}', id_categoria = '{$categoria}', usado_produto = '{$usado}' WHERE id_produto = '{$id}'";
    //echo $query;
    return mysqli_query($conexao, $query);
  };
