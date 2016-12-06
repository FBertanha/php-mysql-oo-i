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

  function insereProduto($conexao, Produto $produto) {
    $produto->nome = mysqli_real_escape_string($conexao, $produto->nome);
    $produto->descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $query = "INSERT INTO produtos (nome_produto, preco_produto, descricao_produto, id_categoria, usado_produto)
      VALUES ('{$produto->nome}', '{$produto->preco}', '{$produto->descricao}', '{$produto->categoria_id}', '{$produto->usado}')";
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

  function alteraProduto($conexao, $produto) {
    $produto->nome = mysqli_real_escape_string($conexao, $produto->nome);
    $produto->descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $query = "UPDATE produtos SET nome_produto = '{$produto->nome}' , preco_produto = '{$produto->preco}', descricao_produto = '{$produto->descricao}', id_categoria = '{$produto->categoria_id}', usado_produto = '{$produto->usado}' WHERE id_produto = '{$produto->id}'";
    //echo $query;
    return mysqli_query($conexao, $query);
  };
