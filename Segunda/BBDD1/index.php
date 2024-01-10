<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "./dbconnection.php";

        $conexion = connect("book");

        $prueba = $conexion->query("SELECT * from cliente"); // Nos devuelve un objeto query
        foreach ($prueba as $fila){
            echo $fila['nombre'];
        }
    ?>
</body>
</html>