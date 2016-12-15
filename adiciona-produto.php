<?php
  require_once('header.php');
  require_once('banco-produto.php');
  require_once('logica-usuario.php');
  require_once('class/Categoria.php');
  require_once('class/Produto.php');


  verificaUsuario();
  $categoria = new Categoria();
  $produto = new Produto();

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

  if(insereProduto($conexao, $produto)) {
?>
    <p class="text-success"> O Produto <?=$produto->getNome()?> foi adicionado.</p>
    <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger"> O Produto <?=$produto->getNome()?> não foi adicionado. <?=$msg?> </p>
<?php
      }

  require_once('footer.php');
?>
