<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php   
    
        $archivos=scandir('./archivos');
        for($i=2;$i<count($archivos);$i++){
            list($nombre, $extension) = explode('_', $archivos[$i]);
            if($nombre=$_POST['nombre3']){
                $src='./archivos/'.$nombre."_".$extension;
            }
        }
        
        echo $src;
        
        if(file_exists('./archivos/'.$src)){
            unlink('./archivos/'.$src);
            echo "Eliminado";
        } else{
            echo "No existe el archivo";
        }
    ?>
</body>

</html>