<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    
    if(!isset($_POST['subir-foto']) && !isset($_POST['buscar-foto']) && !isset($_POST['eliminar-foto'])){
        echo <<<PREGUNTA
            <h1>Quiere subir una foto o buscar una foto?</h1>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="submit" value="subir-foto" name="subir-foto">
                <input type="submit" value="buscar-foto" name="buscar-foto">
                <input type="submit" value="eliminar-foto" name="eliminar-foto">
            </form>
        PREGUNTA;
    }

        if(isset($_POST['subir-foto'])){
        echo <<<FORM
            <form method="post" action="subir-foto" enctype="multipart/form-data">
                Introduzca foto: <input type="file" name="foto">
                Nombre: <input type="text" name="nombre"><br>
                <input type="submit" name="enviar">
            </form>
        FORM;
        } 

       if(isset($_POST['buscar-foto'])){
        
            echo <<<DISPLAY
                <form method="post" action="buscar-foto" enctype="multipart/form-data">
                    Nombre: <input type="text" name="nombre2"><br>
                    <input type="submit" name="enviar2">
                </form>
            DISPLAY;
        }

        if(isset($_POST['eliminar-foto'])){
            echo <<<ELIM
            <form method="post" action="eliminar-foto" enctype="multipart/form-data">
                    Nombre: <input type="text" name="nombre3"><br>
                    <input type="submit" name="enviar3">
                </form>
            ELIM;
        }
    ?>
</body>

</html>