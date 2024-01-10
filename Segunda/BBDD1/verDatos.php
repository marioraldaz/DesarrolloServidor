<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<table>";
        echo "<thead><tr>";
        foreach($columnas as $columna){
            echo "<th>$columna</th>";
        }
        echo "</tr></thead>";

        foreach($filas as $fila){
            echo "<tr>";
            foreach($celdas as $celda){
                echo "<td>$columna</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
</html>