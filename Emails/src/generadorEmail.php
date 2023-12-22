<?php
      require '../vendor/autoload.php'; //Crear funcion clean
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\SMTP;
      use PHPMailer\PHPMailer\Exception;
        $asunto = $_POST["asunto"];
        $contenido = $_POST["contenido"];
        $para = $_POST["destinatario"];
        echo $asunto;
        echo $contenido;
        echo $para;
    if(!filter_var($para, FILTER_VALIDATE_EMAIL)){
        throw new Exception("correo electrónico incorrecto");
    }

    $mail = new PHPMailer(true);
    $mail -> isSMTP(); // Que tipo de servidor de correos es;

    $mail->SMTPDebug = SMTP :: DEBUG_SERVER; //Envio de mensajes de error cleinte y 

    $mail ->Host = 'smtp.gmail.com';

    $mail ->Port = 465; //o 587

    $mail -> SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //tls o ssl para gmail obligado 

    $mail -> SMTPAuth = true; //Autentificacion smtp del servidor

    $email = 'emailpruebamario@gmail.com';

    $mail->Username = $email;

    $mail->Password = "123456H123456"; //PASSWD

    $mail->setFrom($email,' Mario Rodriguez'); //

    $mail-> addReplyTo('replyto@panchos.com',' Destinatario ');

    $mail-> addAddress($para, 'John Doe');

    $mail->Subject = $asunto;

    $mail->isHTML(true);

    $mail->CharSet = 'UTF-8';

    $mail->Body = $contenido;

    $mail->AltBody = 'Preview del correo';

    $mail->addAttachment('./eriso.jpg','logo.png');

    var_dump($mail);
    if(!$mail->send()){
        throw new Exception($mail->ErrorInfo);
    }
?>