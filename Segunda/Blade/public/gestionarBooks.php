<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Customers</title>
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

        $views = '../views';
        $cache = '../cache';
        $blade = new Blade($views, $cache);
        if(isset($_POST['deleteBook'])){
            header('refresh:5');
            Book::deleteBookById($_POST['deleteBook']);
            echo "Book deleted successfully, refreshing page in 5 seconds";
        }

        echo $blade->view()->make('viewBooks', ['titulo'=>'Gestionar Libros'],['books' => $booksInDB, 'titulo' => 'Lista de Familias', 'encabezado' => 'Familias Disponibles'])->render();
        
    ?>
</body>

</html>