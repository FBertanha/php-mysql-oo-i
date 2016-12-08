<?php
  require_once('header.php');
  //require_once('conecta.php');
  require_once('banco-produto.php');
  //require_once('mostra-alerta.php');
?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4 table-responsive">
      <fieldset>
        <legend>Lista de Produtos</legend>
        <table class="table table-striped table-hover table-condensed table-bordered">
          <thead>
            <tr>
              <th>Produto</th>
              <th>Descricao</th>
              <th>Categoria</th>
              <th>Estado</th>
              <th>Preço</th>
              <th>Desconto</th>
              <th>Excluir/Editar</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $produtos = listaProdutos($conexao);
              //var_dump($produtos);
              $soma = 0;
              foreach($produtos as $produto) {
                $soma += $produto->preco;
            ?>
              <tr>
                <td><?=$produto->nome;?></td>
                <td><?=$produto->descricao;?></td>
                <td><?=$produto->categoria->nome;?></td>
                <td><?=$produto->usado;?></td>
                <td><?=$produto->preco;?></td>
                <td><?=$produto->precoComDesconto(0.20);?></td>
                <td>
                  <form class="" action="remove-produto.php" method="post">
                    <input type="text" name="id" value="<?=$produto->id?>" hidden="true">
                    <button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
                    <a href="produto-formulario-altera.php?id=<?=$produto->id?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                  </form>
                </td>
              </tr>
            <?php }; ?>
              <tr>
                <td colspan="5"><strong>Total de Produtos R$</strong></td>
                <td class="text-right" colspan="4"><?=$soma?></td>
              </tr>
          </tbody>
        </table>
      </fieldset>
    </div>
  </div>

<?php
  require_once('footer.php');
?>
