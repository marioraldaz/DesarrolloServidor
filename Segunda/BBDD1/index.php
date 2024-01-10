<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "./db_connect.php";

        $conexion = connect("books");

        $books = $conexion->query("SELECT * from book"); // Nos devuelve un objeto query

        var_dump($books);

        foreach ($books as $fila){
            echo $fila;
        }


    ?>
</body>
</html>