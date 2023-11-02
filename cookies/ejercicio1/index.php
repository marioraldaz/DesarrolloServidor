
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if(!isset($_COOKIE['color']) || !isset($_COOKIE['idioma'])){
        if(!isset($_POST['verForm'])){
            echo <<<FORM
            <div class="container">
                <form method="post" action="">
                    <input type="color" name="color"/>
                    <select name="idioma">
                        <option value="español">Español</option>
                        <option value="ingles">Ingles</option>
                    </select>
                    <input type="submit" name="verForm" value="Ver formulario"/>
                </form>
            </div>
            FORM;
        } else{
            setcookie('color',$_POST['color']);
            setcookie('idioma',$_POST['idioma']);
            header('Location: verFormulario.php');
        }
   
    } else{
        header('Location: verFormulario.php');
    }
    ?>
    
</body>
</html>
