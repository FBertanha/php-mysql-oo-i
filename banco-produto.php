<?php
//include('conecta.php');
  require_once('conecta.php');
  require_once('class/Categoria.php');
  require_once('class/Produto.php');

  function listaProdutos($conexao) {
    $produtos = array();
    $resultado = mysqli_query($conexao, "SELECT p.id_produto, p.nome_produto, p.descricao_produto, c.nome_categoria, IF(p.usado_produto = '1', 'Usado', 'Novo'), p.preco_produto FROM produtos AS p JOIN categorias AS c ON c.id_categoria = p.id_categoria ORDER BY p.id_produto");
    while($produto_array = mysqli_fetch_array($resultado)) {

      $categoria = new categoria();
      $categoria->setNome($produto_array[3]);

      $produto = new Produto($produto_array[1], $produto_array[5], $produto_array[2], $categoria, $produto_array[4]);
      $produto->setId($produto_array[0]);
      //echo $produto->categoria->nome;
      array_push($produtos, $produto);
    }
    return $produtos;
  }

  function insereProduto($conexao, Produto $produto) {
    $produto->setNome(mysqli_real_escape_string($conexao, $produto->getNome()));
    $produto->setDescricao(mysqli_real_escape_string($conexao, $produto->getDescricao()));
    $query = "INSERT INTO produtos (nome_produto, preco_produto, descricao_produto, id_categoria, usado_produto)
      VALUES ('{$produto->getNome()}', '{$produto->getPreco()}', '{$produto->getDescricao()}', '{$produto->getCategoria()->getId()}', '{$produto->getUsado()}')";
    //echo $query;
    return mysqli_query($conexao, $query);
  }

  function removeProduto($conexao, $id) {
    $query = "DELETE FROM produtos WHERE id_produto = '{$id}'";
    return mysqli_query($conexao, $query);
  }

  function buscaProduto($conexao, $id) {
    $resultado = mysqli_query($conexao, "SELECT p.id_produto, p.nome_produto, p.descricao_produto, c.id_categoria, c.nome_categoria, IF(p.usado_produto = '1', 'checked', ''), p.preco_produto FROM produtos AS p JOIN categorias AS c ON c.id_categoria = p.id_categoria WHERE p.id_produto = '{$id}'");
    $produto_array = mysqli_fetch_row($resultado);

    $categoria = new categoria();
    $categoria->setId($produto_array[3]);
    $categoria->setNome($produto_array[4]);

    $produto = new Produto($produto_array[1], $produto_array[6], $produto_array[2], $categoria, $produto_array[5]);
    $produto->setId($produto_array[0]);

    return $produto;
  }

  function alteraProduto($conexao, $produto) {
    $produto->setNome(mysqli_real_escape_string($conexao, $produto->getNome()));
    $produto->getDescricao(mysqli_real_escape_string($conexao, $produto->getDescricao()));
    $query = "UPDATE produtos SET nome_produto = '{$produto->getNome()}' , preco_produto = '{$produto->getPreco()}', descricao_produto = '{$produto->getDescricao()}', id_categoria = '{$produto->getCategoria()->getId()}', usado_produto = '{$produto->getUsado()}' WHERE id_produto = '{$produto->getId()}'";
    //echo $query;
    return mysqli_query($conexao, $query);
  }
