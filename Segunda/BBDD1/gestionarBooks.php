<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button type="submit" name="insertarBook">Insertar Book</button>
    <button type="submit" name="verDatos">Ver Datos</button>
<?php
    require 'vendor/autoload.php';
    use Segunda\books\Book;

if (isset($_POST['insertarBook'])) {
    echo <<<FORM
   
    <form method="post" action=""> 
    
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
    <input type="hidden" name="insertarBook" value="">
    <button type="submit" name="insertar">Add Book</button>
</form>
FORM;
if(isset($_POST['insertar'])){
    $nuevo = new Book(
        $_POST['isbn'],
        $_POST['title'],
        $_POST['author'],
        $_POST['stock'],
        $_POST['price']
    );
    $nuevo->insert();
}
}

?>
</body>
</html>