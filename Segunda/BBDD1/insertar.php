<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
</head>
    <body>
        <?php
                //$conexion = connect("books");

                //$books = $conexion->query("SELECT * from book"); // Nos devuelve un objeto query
            
            if(!isset($_POST['buscar'])){
                echo<<<FORM
                    <form method="post" action="">
                        Nombre de la tabla en la que quiere insertar datos: <input type="text" name="db" placeholder="database"/>
                        <button type="submit" name="buscar"/>
                    </form>
                FORM;
            } else{
                //buscarTabla();
                //SHOW COLUMNS from table
                
                echo "<form method=post action=''>";
                foreach($tabla as $fila){
                    echo "$fila: <input type='text' name=$fila >";
                }
                echo "<button type=submit value=insertar name=insertar/>";
                echo "</form>";
            }
         
    ?>
    </body>
</html>