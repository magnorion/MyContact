<?php
  require __DIR__."/../assets/vendor/autoload.php";

  ### Inicia a classe phpmailer
  $mail = new PHPMailer;

  ### Variavel dos dados AJAX
  $user = $_POST['dados'];

  ### IES Nome/Email
  $email_recebe = ""; ### Email que deve receber a mensagem!

  ### Mensagem
  $msg = "Mensagem de ".$user['nome']."<br/>";
  $msg .= "Email: ".$user['email']."<br/>";
  $msg .= "Celular: ".$user['celular']."<br/>";
  $msg .= "Curso de Interesse: ".$user['curso']."<br/>";
  $msg .= "Assunto: ".$user['assunto']."<br/>";
  $msg .= "Mensagem: ".$user['mensagem']."<br/>";

  //$mail->SMTPDebug = 3;                               // Enable verbose debug output
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host       = "smtp.gmail.com";
  $mail->SMTPSecure = "ssl";
  $mail->Port       = 465;
  $mail->SMTPAuth   = true;
  $mail->Username   = ""; // Usuário
  $mail->Password   = ""; // Senha

  $mail->setFrom(""); // Quem envia!
  $mail->addAddress($email_recebe);     ### Email que deve receber!

  $mail->isHTML(true);

  $mail->Subject = $user['nome']." - Deixe Sua Mensagem";
  $mail->Body    = $msg;
  $mail->AltBody = $msg;

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
  }
?>
