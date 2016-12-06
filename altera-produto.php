<?php
  require_once('header.php');
  require_once('banco-produto.php');
  require_once('class/Produto.php');

  $produto = new Produto();
  $produto->id = $_POST['id_produto'];
  $produto->nome = $_POST['produto'];
  $produto->preco = $_POST['preco'];
  $produto->descricao = $_POST['descricao'];
  $produto->categoria_id = $_POST['categoria_id'];

  if(isset($_POST['usado'])) {
    $produto->usado = 1;
  }else {
    $produto->usado = 0;
  }

  if(alteraProduto($conexao, $produto)) {
?>
    <p class="text-success"> O Produto <?=$produto->nome?> foi alterado.</p>
    <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger"> O Produto <?=$produto->nome?> não foi alterado. <?=$msg?> </p>
<?php
      }

  require_once('footer.php');
?>
