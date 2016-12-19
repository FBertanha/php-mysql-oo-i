<?php
  require_once('header.php');
  //require_once('conecta.php');
  require_once('banco-categoria.php');
  require_once('logica-usuario.php');
  require_once('class/Produto.php');
  require_once('class/Categoria.php');

  verificaUsuario();

  $categoria = new Categoria();
  $produto = new Produto('', '', '', $categoria, 0);


?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form class="form-horizontal" action="adiciona-produto.php" method="post">
        <fieldset>
          <legend>Cadastro de Produtos</legend>
          <?php require_once('produto-formulario-base.php');?>
        </fieldset>
      </form>
    </div>
  </div>

<?php
  require_once('footer.php');
?>
