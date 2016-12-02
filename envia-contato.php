<?php
  session_start();
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $mensagem = $_POST['mensagem'];
  require_once('mostra-alerta.php');
  require_once('\phpmailer\PHPMailerAutoload.php');

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = 'phpmysqlitwo@gmail.com';
  $mail->Password = '';//

  $mail->setFrom('phpmysqlitwo@gmail.com', 'Loja PhpMySQL2');
  $mail->addBCC('phpmysqlitwo@gmail.com', 'Email de '. $nome);
  $mail->addAddress($email);
  $mail->Subject = "Envio de email de {$nome}";
  $mail->msgHTML("<html><h1> Recebemos seu email {$nome}. <br> {$email} <br> {$mensagem}</h1></html>");
  $mail->addAttachment('attch.txt');
  //$mail->AltBody = "{$nome} \n {$mail} \n {$mensagem}";

  if($mail->send()) {
    $_SESSION['success'] = "Email enviado!";
    header("Location: index.php");
  } else {
    $_SESSION['danger'] = "Falha ao enviar email!" . $mail->ErrorInfo;
    header("Location: contato.php");
  };
  die();
 ?>
