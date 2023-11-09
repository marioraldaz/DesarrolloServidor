<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>

<body>
        <!--Ver base64-->
        <div class="container-form">
            <?php
                include "captcha.php";
                ob_start();
                $buffer= generateImage();
                echo <<<FORM
                    <form method="post" action="checkCaptcha.php">
                        Introduzca el captcha: <input type="text" name="respuestaUser"/>
                        <img src="$buffer[imagen]" alt="Captcha" />
                        <input type="hidden" name="captcha" value="$buffer[palabra]"/>
                        <input type="submit" name="Enviar" value="Enviar"/>
                    </form>
                FORM;

            ?>
        </div>
    </body>

</html>