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
    include "./idiomas.php";
    $idioma=$listaIdiomas[$_COOKIE['idioma']]; //Si hubiese hecho varios array como $español=>[] usaría $$_COOKIE
        echo <<<FORM
        <div class='container' style=background-color:$_COOKIE[colorFondo] color:$_COOKIE[fontColor]>
            <form method='POST' action=''>
                $idioma[0] <input type='text' name="idioma"/>
                $idioma[1] <input type="color" name="colorFuente"/>
                $idioma[2] <input type="color" name="colorFondo"/>
                <input type='submit' value="$idioma[3]" />
            </form>
        </div>
    FORM;
    
?>
</body>
</html>