<div class="form-group hide">
  <label for="inputIdProduto" class="col-lg-2 control-label">ID</label>
  <div class="col-lg-10">
    <input type="text" name="id_produto" class="form-control" placeholder="Id Produto" value="<?=$produto->getId()?>">
  </div>
</div>
<div class="form-group">
  <label for="inputNomeProduto" class="col-lg-2 control-label">Nome</label>
  <div class="col-lg-10">
    <input type="text" name="produto" class="form-control" placeholder="Produto" value="<?=$produto->getNome()?>">
  </div>
</div>
<div class="form-group">
  <label for="inputPrecoProduto" class="col-lg-2 control-label">Preço</label>
  <div class="col-lg-10">
    <input type="number" step="0.01" name="preco" class="form-control" placeholder="Valor R$" value="<?=$produto->getPreco()?>">
  </div>
</div>
<div class="form-group">
  <label for="textAreaObsProduto" class="col-lg-2 control-label">Descrição</label>
  <div class="col-lg-10">
    <textarea class="form-control" name="descricao" rows="3" placeholder="Descrição..."><?=$produto->getDescricao()?></textarea>
    <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="usado" value="1" <?=$produto->getUsado()?>> Produto Usado
      </label>
    </div>
  </div>
</div>
<?php var_dump($produto->getCategoria()->getId()); ?>
<div class="form-group">
  <label for="select" class="col-lg-2 control-label">Categoria</label>
  <div class="col-lg-10">
    <select class="form-control" name="categoria_id">
      <?php
        $categorias = listaCategoria($conexao);
        foreach($categorias as $categoria) {
          var_dump($categoria);
          $isSelected = $categoria->getId() == $produto->getCategoria()->getId() ? "selected" : "";
      ?>
          <option value="<?=$categoria->getId()?>" <?=$isSelected?> ><?=$categoria->getNome()?></option>
      <?php } ?>
    </select>
  </div>
</div>
<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="reset" class="btn btn-default">Cancelar</button>
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</div>
