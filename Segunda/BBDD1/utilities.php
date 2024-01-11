<?php
   global $connection;
   function crearConexion($configPath){
    global $connection;

    require_once './DBConnection.php';

    // Create an instance of DBConnection
    $dbConnection = new DBConnection($configPath);

    // Establish a database connection
    $connection = $dbConnection->dbConnect();

   }
   function crearDB(){
    global $connection;
    try {
        // Configuración de la conexión a la base de datos
        $resultCode = exec("./books.sql"); //We use this instead of $query= $connection->prepare("") bc it does not return anything (non-query).

        echo "Base de datos creada con éxito $resultCode";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    }

    function conectar(){
        
        require_once './DBConnection.php';
        
        global $connection; //We make it global

        $dbConnection = new DBConnection('./config.json'); //Objeto DBConnection

        $connection = $dbConnection->dbConnect(); //Conexion (funcion)
        
    }

    /*function verDatos(){
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
    }

    function insertarDatos(){
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
    }*/
?>