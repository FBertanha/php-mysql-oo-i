<?php
  session_start();
  function usuarioEstaLogado() {
    return isset($_SESSION['usuario_logado']);
  };

  function verificaUsuario() {
      if(!usuarioEstaLogado()) {
        $_SESSION['danger'] = "Você não tem acesso a essa página!";
        header("Location: index.php");
        die();
      };
  };

  function usuarioLogado() {
    if(usuarioEstaLogado()) {
      return $_SESSION['usuario_logado'];
    };
  };

  function logaUsuario($emailUsuario) {
    $_SESSION['usuario_logado'] = $emailUsuario;
  };

  function deslogaUsuario() {
    //unset($_SESSION['usuario_logado']);//Assim ou..
    session_destroy();
    session_start();
    //die();
  };
