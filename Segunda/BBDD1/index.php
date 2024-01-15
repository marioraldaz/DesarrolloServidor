<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <!-- Buttons to perform actions -->
        <button type="submit" name="crearDatabase">Crear Base de Datos</button>
        <button type="submit" name="insertarCustomer">Insertar Customer</button>
        <button type="submit" name="insertarBook">Insertar Book</button>
        <button type="submit" name="verDatos">Ver Datos</button>
        <button type="submit" name="eliminarDatos">Eliminar Datos</button>
        <button type="submit" name="desconectar">Desconectar</button>
    </form>
    <?php
    require 'vendor/autoload.php';
    use Segunda\books\DBConnection;
    use Segunda\books\Customer;
    $dbConnection = new DBConnection("./config.json");
    $dbConnection->dbConnect();
    
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['crearDatabase'])) {
            $dbConnection->CrearDB("./books.sql");
            echo "Base de datos creada.";
        } elseif (isset($_POST['insertarCustomer'])) {
            echo <<<FORM
            <form method="post" action="">
                <label for="id">ID:</label>
                <input type="text" name="id" required>
                <br>
            
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
                <input type="hidden" name="insertarCustomer" value="">
                <button type="submit" name="insertar">Submit</button>
            FORM;
            if(isset($_POST['insertar'])){
                $nuevo = new Customer($_POST['id'],$_POST['firstName'],$_POST['surname'],$_POST['email'],$_POST['type']);
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
        } else if (isset($_POST['insertarBook'])) {
            echo <<<FORM
           
            <form method="post" action="process_form.php"> <!-- Replace "process_form.php" with the actual name of your PHP processing script -->
            <label for="id">ID:</label>
            <input type="text" name="id" required>
            <br>
            
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" required>
            <br>
            
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <br>
            
            <label for="author">Author:</label>
            <input type="text" name="author" required>
            <br>
            
            <label for="stock">Stock:</label>
            <input type="number" name="stock" required>
            <br>
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" name="price" required>
            <br>

            <button type="submit" name="submit">Add Book</button>
        </form>
        FORM;
        if(isset($_POST['insertar'])){
            $nuevo = new Customer($_POST['id'],$_POST['firstName'],$_POST['surname'],$_POST['email'],$_POST['type']);
            $nuevo->insert();
        }
    }
}
    ?>
    
 
</body>
</html>