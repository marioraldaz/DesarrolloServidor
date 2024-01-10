<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        //include "index.php";
        include_once "usuarios.php";
        $existe=false;
        foreach ($usuarios as $key => $value){
            if($key=="usuario"){
            $existe=true;
            }
        }
        if($existe){
            echo 'Contraseña incorrecta';
        } else{
            echo 'El usuario no existe<br>';
        }
        header('Refresh:5 ;url=index.php');
        echo "Volvera a la pagina de inicio en 5 sec";
        ?>
</body>

</html>