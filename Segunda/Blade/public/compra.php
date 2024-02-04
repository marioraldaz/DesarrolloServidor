<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
</head>

<body>
    <?php
          require '../vendor/autoload.php';
          use Daw2\Blade\Book;
          use Daw2\Blade\DBConnection;
          use Daw2\Blade\Sale;
          use Philo\Blade\Blade;
  
          DBConnection::getConnection();
          $booksInDB = Book::getBooks();

          

    ?>
</body>

</html>