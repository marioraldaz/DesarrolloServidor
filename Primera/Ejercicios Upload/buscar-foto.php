<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
      if(isset($_POST['enviar2'])){
        $archivos=scandir('./archivos');
        for($i=2;$i<count($archivos);$i++){
            list($nombre, $extension) = explode('_', $archivos[$i]); //Ver bien list
            if($nombre=$_POST['nombre2']){
                $src='./archivos/'.$nombre."_".$extension;
            }
        }
        
        echo $src;
        if(file_exists($src)){
            echo "<img src='$src'>";
        }else{
            echo "No existe el archivo";
        }
    }
    echo <<<DISPLAY
            <form method="post" action="index.php">
            <input type="submit" value="Volver" name="volver">
        </form>
    DISPLAY;
    
    ?>
</body>

</html>