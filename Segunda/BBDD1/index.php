<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "./DBConnection.php";
    $dbConnection = new DBConnection("./config.json");
    $dbConnection->dbConnect();
    echo<<<FORM
    <form method="post" action="">
    
    <!-- Buttons to perform actions -->
    <button type="submit" name="crearDatabase">Crear Base de Datos</button>
    <button type="submit" name="insertarDatos">Insertar datos</button>
    <button type="submit" name="verDatos">Ver Datos</button>
    <button type="submit" name="eliminarDatos">Eliminar Datos</button>
    <button type="submit" name="desconectar">Desconectar</button>
    
    </form>
    FORM;
    
    
    if(isset($_POST['crearDatabase'])){
        $dbConnection->CrearDB("./books.sql");
    }
    if(isset($_POST['insertarDatos'])){
        $dbConnection->CrearDB("./books.sql");
    }
    if(isset($_POST['verDatos'])){
        $dbConnection->CrearDB("./books.sql");
    }
    if(isset($_POST['eliminarDatos'])){
        $dbConnection->CrearDB("./books.sql");
    }
    
    ?>
</body>
</html>