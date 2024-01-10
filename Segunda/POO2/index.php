<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poo2</title>
</head>
<body>
    <?php
        spl_autoload_register("autoLoaderClass");

        $pepe = new Basic("Pepe", "Ramirez","pepito@gmail.com");
        $juan = new Premium("Juan", "Ramirez","pepito@gmail.com");
        $alberto = new Basic("Alberto", "Ramirez","pepito@gmail.com");
        $juan2 = clone $juan;
        $libro1 = new libro("libro1");
        $libro2 = new libro("libro2");
        $libro3 = new libro("libro3");
        echo "</br>";
        echo $pepe;
        echo "</br>";
        echo $juan;
        echo "</br>";
        echo $alberto;
        echo "</br>";
        echo $libro1;
        echo "</br>";
        echo $libro2;
        echo "</br>";
        echo $libro3;
        echo "</br>";

        $libreria = array("clientes"=>array($pepe,$juan,$alberto,$juan),"libros"=>array($libro1,$libro2,$libro3));
        echo "clientes: ";
        echo "</br>";

        foreach($libreria["clientes"] as $cliente) {
            echo $cliente;
            echo "</br>";

        }
        echo "libros:";
        echo "</br>";

        foreach($libreria["libros"] as $libro) {
            echo $libro;
            echo "</br>";
        }

        function autoLoaderClass($class){
            $class=strtolower($class);
            $classFile=$_SERVER['DOCUMENT_ROOT'].'/mio/POO1/DESARROLLOSERVIDOR/POO2/'.$class.'.php';
            if(is_file($classFile)&&!class_exists($class)) include $classFile;
        }
        
    ?>
</body>
</html>