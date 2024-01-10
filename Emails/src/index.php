<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require '../vendor/autoload.php'; //Crear funcion clean
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        if(!isset($_POST["enviar"])){
            echo<<<FORM
                <form method="POST" action="generadorEmail"/>
                    <input type="text" name="asunto">Asunto
                    <input type="text" name="contenido">Contenido
                    <input type="text" name="destinatario">Destinatario
                    <input type="submit" value="enviar">
                </form>
            FORM;
        } else{
            $asunto = $_POST["asunto"];
            $contenido = $_POST["contenido"];
            $para = $_POST["destinatario"];
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

        $email = 'pruebagmailmario@gmail.com'; //Email

        $mail->Username = $email;

        $mail->Password = "123456H123456"; //PASSWD

        $mail->setFrom($email,' Mario Rodriguez'); //

        $mail-> addReplyTo('replyto@panchos.com',' Destinatario ');

        $mail-> addAddress($para, 'John Doe');

        $mail->Subject = $asunto;

        $mail->isHTML(true);

        $mail->CharSet = 'UTF-8';

        $mail->AltBody = 'Preview del correo';

        $mail->addAttachment('./eriso.jpg','logo.png');

        if(!$mail->send()){
            throw new Exception($mail->ErrorInfo);
        }
    }
    ?>
</body>
</html>