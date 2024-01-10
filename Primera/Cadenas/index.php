<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php
        
        echo <<<AAA
            <div class="container">
                <form method="post" action="procesar.php" class="formulario">
                    <input type="text" class="cuadro-texto" name="texto" maxlength="600"/> 
                    <div class="opciones">
                        <div class="opcion">
                            <input type="submit" value="REMARK" name="option" action="remark.php">
                        </div>
                        <div class="opcion">
                            <input type="submit" value="REMOVE" name="option" action="remove.php">
                        </div>
                        <div class="opcion">
                            <input type="submit" value="REPLACE" name="option" action="replace.php">
                        </div>
                        <div class="opcion">
                            <input type="submit" value="COUNT WORDS" name="option" action="count-words.php">
                        </div>
                        <div class="opcion">
                            <input type="submit" value="COUNT VOWELS" name="option" action="count-vowels.php">
                        </div>
                        <div class="opcion">
                            <input type="submit" value="LOWER CASE" name="option" action="remark.php">
                        </div>
                        <div class="opcion">
                            <input type="submit" value="UPPER CASE" name="option" action="upper-case.php">
                        </div>
                    </div>
                </form>
            </div>  
        AAA



    ?>
</body>

</html>