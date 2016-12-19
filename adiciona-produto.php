<?php
  require_once('header.php');
  require_once('banco-produto.php');
  require_once('logica-usuario.php');
  require_once('class/Categoria.php');
  require_once('class/Produto.php');


  verificaUsuario();
  $categoria = new Categoria();
  $categoria->setId($_POST['categoria_id']);

  $usado = 0;
  if(isset($_POST['usado'])) {
    $usado = 1;
  }else {
    $usado = 0;
  }
  $produto = new Produto($_POST['produto'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);

  echo $produto;

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
