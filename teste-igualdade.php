<?php
  require_once("class/Produto.php");

  $p = new Produto();
  $p->setPreco(59.9);

  $p2 = new Produto();
  $p2->setPreco(519.9);

  if($p == $p2) {
    echo "Iguais";
  }else {
    echo "Dif";
  }

?>
