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
        use Daw2\Blade\Sale_Book;
        use Philo\Blade\Blade;

        session_start();
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=[];
        }

        DBConnection::getConnection();
        $booksInDB = Book::getBooks();

        $views = '../views';
        $cache = '../cache';
        $blade = new Blade($views, $cache);
        if(isset($_POST['add'])){
            $found=false;
            foreach($_SESSION['cart'] as &$cartBook){
                if($cartBook['id']==$_POST['add']){
                    $cartBook['amount']++;
                    $found=true;
                    break;
                }
            }
            if(!$found){
                array_push($_SESSION['cart'],['id'=>$_POST['add'],'amount'=>1]);
            }
            echo "<br>Book added to cart</br>";
            var_dump($_SESSION['cart']);
        }

        if (isset($_POST['delete'])) {
            foreach ($_SESSION['cart'] as $key => $book) {
                if ($book['id'] == $_POST['delete']) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
        }

        if(isset($_POST['comprar'])) {

        }
        
        $cart=[];
        foreach ($_SESSION['cart'] as $book){
            array_push($cart, array('book'=>Book::getBookById($book['id'])[0],'amount'=>$book['amount']));
        }

        var_dump($cart);
        echo $blade->view()->make('viewCompra', ['titulo'=>'Gestionar Libros'],['books' => $booksInDB, 'cart'=>$cart])->render();


    ?>
</body>

</html>