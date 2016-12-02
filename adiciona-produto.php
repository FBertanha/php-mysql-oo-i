<?php
  require_once('header.php');
  require_once('banco-produto.php');
  require_once('logica-usuario.php');

  verificaUsuario();

  $produto = $_POST['produto'];
  $preco = $_POST['preco'];
  $descricao = $_POST['descricao'];
  $categoria = $_POST['categoria_id'];
  if(array_key_exists('usado', $_POST)) {
    $usado = 1;
  }else {
    $usado = 0;
  }

  if(insereProduto($conexao, $produto, $preco, $descricao, $categoria, $usado)) {
?>
    <p class="text-success"> O Produto <?=$produto?> foi adicionado.</p>
    <?php } else {
      $msg = mysqli_error($conexao);
    ?>
      <p class="text-danger"> O Produto <?=$produto?> não foi adicionado. <?=$msg?> </p>
<?php
      }

  require_once('footer.php');
?>
