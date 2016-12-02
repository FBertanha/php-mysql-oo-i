<?php
  function mostraAlerta($tipo) {
    session_start();
    if(isset($_SESSION[$tipo])) { ?>
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="alert alert-dismissible alert-<?=$tipo?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong></strong> <?=$_SESSION[$tipo]?>
            <?php unset($_SESSION[$tipo]); ?>
          </div>
        </div>
      </div>
<?php }
  }
?>
