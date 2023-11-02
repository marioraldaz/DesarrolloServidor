<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once "usuarios.php";
    if(!isset($_POST['enviar'])){
        echo <<<FORM
        <form method="post" action="">
            Usuario: <input type="text" name="usuario">
            Contraseña: <input type="text" name="contraseña">
            <input type="submit" name="enviar" value="enviar">
        </form>
        FORM;
    } else {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $correcto=false;
        foreach ($usuarios as $key => $value) {
            if($usuario == $key && $contraseña == $value){
                $correcto=true;
                header('Location: verdatos.php');
            }
        } 
        if(!$correcto) {
            header('Refresh:5; url=index.php');
            echo 'Usuario o contraseña incorrectos, en 10 segundos se redireccionara a la pagina de inicio';
        }
    }
    ?>
</body>

</html>