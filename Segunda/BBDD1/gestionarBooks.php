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
    use Segunda\books\Book;
    use Segunda\books\Sale;

    DBConnection::getConnection();
    $books = Book::getBooks();
    
    echo '<form method="POST" action=""><table border="1">';
    echo '<button type="submit" name="insertarBook">Insertar Book</button>';
    echo '<a href="./">Go Back</a>';
    echo '<tr>';

    foreach ($books[0] as $key => $value) {
        echo '<th>' . htmlspecialchars($key) . '</th>';
    }
    
    echo '<th>Actions</th>';
    echo '</tr>';
    
    foreach ($books as $params) {
        echo '<tr>';
        foreach ($params as $key => $value) {
            echo '<td>' . htmlspecialchars($value) . '</td>';
        }
        echo '<td>';
        echo "<button type='submit' name='seeSales' value=$params[id]>See Sales</button>";
        echo '<button type="submit" name="seeBorrowedBooks" value="seeBorrowedBooks">See Borrowed Books</button>';
        echo '<button type="submit" name="seeBorrowedBooks" value="modifyCustomer">Modify</button>';
        echo '<button type="submit" name="seeBorrowedBooks" value="deleteCustomer">Delete</button>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</table></form>';

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
} elseif(isset($_POST['seeSales'])){
    $sales=Sale::getSales($_POST['seeSales']);
    var_dump($sales);
}

?>
</body>
</html>