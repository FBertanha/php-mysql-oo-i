<?php
  require_once('header.php');
  require_once('banco-produto.php');
  require_once('class/Categoria.php');
  require_once('class/Produto.php');

  $produto = new Produto();
  $categoria = new Categoria();

  $produto->setId($_POST['id_produto']);
  $produto->setNome($_POST['produto']);
  $produto->setPreco($_POST['preco']);
  $produto->setDescricao($_POST['descricao']);
  $categoria->setId($_POST['categoria_id']);
  $produto->setCategoria($categoria);

  if(isset($_POST['usado'])) {
    $produto->setUsado(1);
  }else {
    $produto->setUsado(0);
  }

  if(alteraProduto($conexao, $produto)) {
?>
    <p class="text-success"> O Produto <?=$produto->getNome()?> foi alterado.</p>
    <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger"> O Produto <?=$produto->getNome()?> não foi alterado. <?=$msg?> </p>
<?php
      }

  require_once('footer.php');
?>
