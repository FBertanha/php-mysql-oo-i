<?php
  require_once('header.php');
  //require_once('conecta.php');
  require_once('banco-categoria.php');
  require_once('banco-produto.php');
  require_once('logica-usuario.php');
  verificaUsuario();
  $id_produto = $_GET['id'];

  $produto = buscaProduto($conexao, $id_produto);
?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form class="form-horizontal" action="altera-produto.php" method="post">
        <fieldset>
          <legend>Alterar Produto</legend>
          <?php require_once('produto-formulario-base.php');?>
        </fieldset>
      </form>
    </div>
  </div>

<?php
  require_once('footer.php');
?>
