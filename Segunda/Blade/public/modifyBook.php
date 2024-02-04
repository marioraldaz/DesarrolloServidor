<?php

    require '../vendor/autoload.php';
    use Daw2\Blade\Book;
    use Daw2\Blade\DBConnection;
    use Philo\Blade\Blade;
    DBConnection::getConnection();
    
    
    $book = Book::getBookById($_GET['id']);
    $book=$book[0];
    $views = '../views';
    $cache = '../cache';
    $blade = new Blade($views, $cache);

    echo $blade->view()->make('viewModifyBook', ['titulo'=>'titulo'],['book' => $book, 'titulo' => 'Lista de Familias', 'encabezado' => 'Familias Disponibles'])->render();

    $params = Book::getBookById($_GET['id']);

    if(isset($_POST['updateBook'])){
        header('refresh:5');

        Book::modifyBook($_POST['updateBook'],$_POST['isbn'],$_POST['title'],$_POST['author'],$_POST['stock'],$_POST['price']);
        echo "<br>refreshing page in 5 seconds...";
    }