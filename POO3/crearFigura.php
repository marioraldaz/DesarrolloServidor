<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        spl_autoload_register("autoLoaderClass");

        switch($_POST["figura"]){
            case "triangulo":
                $triangulo = new Triangulo($_POST["tamaño"]);
                echo $triangulo;
                break;
            
        }

        function autoLoaderClass($class){
            $class=strtolower($class);
            $classFile=$_SERVER['DOCUMENT_ROOT'].'/mio/POO1/DESARROLLOSERVIDOR/POO2/'.$class.'.php';
            if(is_file($classFile)&&!class_exists($class)) include $classFile;
        }
        
    ?>
</body>

</html>