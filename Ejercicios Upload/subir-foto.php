<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        if(isset($_POST['enviar'])){
            move_uploaded_file( $_FILES['foto']['tmp_name'],"./archivos/".$_POST['nombre']."_".time().".jpg");
            echo <<<DISPLAY
                archivo subido correctamente<br>
                <form method="post" action="index.php">
                    <input type="submit" value="Volver" name="volver">
                </form>
            DISPLAY;
        }
        ?>
</body>

</html>