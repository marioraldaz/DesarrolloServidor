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
        $jsonURL= "./idiomas.json";
        $JSON = file_get_contents($jsonURL);
        $listaIdiomas = json_decode($JSON,true); //TRUE FOR ASSO
        $idioma=$listaIdiomas[$_COOKIE['idioma']];
        echo <<<FORM
        <div class='container' style=background-color:$_COOKIE[colorFondo] color:$_COOKIE[fontColor]>
            <form method='POST' action='index.php'>
                $idioma[idioma] <input type='text' name="idioma" value=$idioma[idioma]/>
                $idioma[colorFuente] <input type="color" name="colorFuente"/>
                $idioma[colorFondo] <input type="color" name="colorFondo"/>
                <input type='submit' value="$idioma[Enviar]" />
            </form>
        </div>
    FORM;
    
?>
</body>
</html>