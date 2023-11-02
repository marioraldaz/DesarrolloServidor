<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
       if(!isset($_COOKIE['color']) || !isset($_COOKIE['idioma'])){
        if(!isset($_POST['verForm'])){
            echo <<<FORM
            <div class="container">
                <form method="post" action="">
                    Color de la fuente: <input type="color" name="fontColor"/>
                    Idioma:
                    <select name="idioma">
                        <option value="español">Español</option>
                        <option value="ingles">Ingles</option>
                    </select>
                    Color de fondo: <input type="color" name="color"/>
                    <input type="submit" name="verForm" value="Ver formulario"/>
                </form>
            </div>
            FORM;
        } else{
            setcookie('color',$_POST['color'],  time() + (10 * 365 * 24 * 60 * 60));
            setcookie('fontColor',$_POST['fontColor'],  time() + (10 * 365 * 24 * 60 * 60));
            setcookie('idioma',$_POST['idioma'],  time() + (10 * 365 * 24 * 60 * 60));
            header('Location: verFormulario.php');
        }
        } else{
            header('Location: verFormulario.php');
        }
    ?>
</body>
</html>