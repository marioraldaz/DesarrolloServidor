<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

    if(!isset($_POST["Enviar"])){

        session_start();
        var_dump($usuarios);
        echo <<<FORM
        <form method="post" action="">
            <input type="text" name="nombre">
            <input type="text" name="passwd">
            <input type="submit" name="Enviar" value="Enviar" />
        </form>
        FORM;

    } else{
        $mensajeUsuario=comprobarNombre($_POST["nombre"],$usuarios);
        $mensajePasswd=comprobarPasswd($_POST["passwd"]);
         

    }

    

    $jsonURL= "./usuarios.json";
    $JSON = file_get_contents($jsonURL);
    $usuarios = json_decode($JSON,true); //TRUE FOR ASSOCIATIVE
    function comprobarNombre($nombre,$usuarios){
        if(strlen($nombre)<6){
            return "Nombre incorrecto";
        }
        foreach($usuarios as $usuario ){
            if($usuario["nombre"] == $nombre){
                return "El usuario ya existe";
            }
        }
        
        $_SESSION["nombre"]=$_POST["nombre"];;
        return "Usuario guardado"; 
    }
    
    function comprobarInicioSesion($nombre,$passwd,$usuarios){
        foreach($usuarios as $usuario ){
            if($$usuario["passwd"] == $passwd && $usuario["nombre"] == $nombre){
                return "El usuario ya existe";
            }
        }
    }
    
    function comprobarPasswd($passwd){
        if(strlen($passwd)< 6){
            return "La contraseña es demasiado corta, debe tener entre 6 y 12 caracteres";
        } elseif(strlen($passwd)){
            return "La contraseña es demasiado larga, debe tener entre 6 y 12 caracteres";
        }
    
        $array=explode("",$passwd);
        $mayus=false;
        $minus=false;
        $number=false;
        for($i=0; $i<sizeof($array);$i++){
            if(IntlChar::isupper($array[$i])){
                $mayus=true;
            } elseif(IntlChar::islower($array[$i])){
                $minus=true;
            } elseif(is_numeric($array[$i])){
                $number=true;
            }
        }
        $respuesta="";
        if(!$mayus) $respuesta.= "La contraseña debe tener por lo menos una mayúscula </br>";
        if(!$minus) $respuesta.= "La contraseña debe tener por lo menos una minúscula </br>";
        if(!$number) $respuesta.= "La contraseña debe tener por lo menos un numero </br>";
        return $respuesta;
    }
    
    
    
    
    ?>
</body>
</html>