<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./global.css" type="text/css">
</head>
<body>
    <?php
    require 'vendor/autoload.php';
    use Segunda\books\DBConnection;
    DBConnection::getConnection();
    ?>
    
<div class="header" style="width:100%; height:30px; background-color:beige; margin-bottom:20px">
    <form method="post" action="">
        <!-- Buttons to perform actions -->
        <a href="./gestionarCustomers.php" >Gestionar Clientes</a>
        <a href="./gestionarBooks.php" >Gestionar Libros</a>
        <a href="./compra.php" >Realizar compra</a>
    </form>
    </div>
    
 
</body>
</html>