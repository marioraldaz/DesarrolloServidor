<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        require '../vendor/autoload.php';
        use Desarrollo\Proyectos\Triangulo;

        switch($_POST["figura"]){
            case "triangulo":
                $triangulo = new Triangulo($_POST['color'],$_POST["tamaño"]);
                $triangulo->pintar();
                break;
            
        }
    ?>
</body>

</html>