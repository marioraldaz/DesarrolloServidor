<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./global.css" type="text/css">
</head>
<body>
<div class="header" style="width:100%; height:30px; background-color:beige; margin-bottom:20px">
    <form method="post" action="">
        <!-- Buttons to perform actions -->
        <a href="./gestionarCustomers.php" >Gestionar Clientes</a>
        <a href="./gestionarBooks.php" >Gestionar Libros</a>
        <button type="submit" name="verDatos">Ver Datos</button>
        <button type="submit" name="desconectar">Desconectar</button>
    </form>
    </div>
    
    <?php
    require 'vendor/autoload.php';
    use Segunda\books\Customer;
    use Segunda\books\DBConnection;
    $dbConnection=new DBConnection('./config.json');
    $connection=$dbConnection->connection;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['insertarCustomer'])) {
            echo <<<FORM
            <form method="post" action="">
            
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" required>
                <br>
            
                <label for="surname">Surname:</label>
                <input type="text" name="surname" required>
                <br>
            
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <br>
            
                <label for="type">Type:</label>
                <input type="text" name="type" required>
                <br>
                <input type="hidden" name="insertarCustomer" value=""></br>
                <button type="submit" name="insertar">Submit</button>
            FORM;
            if(isset($_POST['insertar'])){
                $nuevo = new Customer($_POST['firstName'],$_POST['surname'],$_POST['email'],$_POST['type'],$connection);
                $nuevo->insert();
            }
        } elseif (isset($_POST['verDatos'])) {
            $dbConnection->verDatos();
            echo "Ver datos.";
        } elseif (isset($_POST['eliminarDatos'])) {
            // Add code to delete data
            echo "Datos eliminados.";
        } elseif (isset($_POST['desconectar'])) {
            $dbConnection->dbClose();
            echo "Desconectado de la base de datos.";
        } 
}
    ?>
    
 
</body>
</html>