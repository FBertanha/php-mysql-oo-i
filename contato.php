<?php
  require_once('header.php');
?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form class="form-horizontal" action="envia-contato.php" method="post">
        <fieldset>
          <legend>Entre em contato</legend>
          <div class="form-group">
            <label for="nome" class="col-lg-2 control-label">Nome</label>
            <div class="col-lg-10">
              <input type="text" name="nome" class="form-control" placeholder="nome" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <input type="email" name="email" class="form-control" placeholder="email" value="">
            </div>
          </div>
          <div class="form-group">
            <label for="mensagem" class="col-lg-2 control-label">Mensagem</label>
            <div class="col-lg-10">
              <textarea class="form-control" name="mensagem" rows="3" placeholder="mensagem..."></textarea>
              <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="usado" value="">Assinar newsletter
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="reset" class="btn btn-default">Cancelar</button>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

<?php
  require_once('footer.php');
?>
