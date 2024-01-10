
    <?php

    function connect($database){

        $conexion= new mysqli('localhost', 'root', '', $database) or die("Connect failed: %s\n". $conexion -> error);
        $error = $conexion->connect_error;
        if($error==null){
            echo $error;
        }
        return $conexion; 
    };
    
    ?>
