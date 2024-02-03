<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Borrowed Books</title>
</head>
<body>
    <?php
        require '../vendor/autoload.php';
        use Daw2\Blade\Borrowed_book;
        use Daw2\Blade\DBConnection;
        use Philo\Blade\Blade;

        DBConnection::getConnection();
        $borrowedBooks = Borrowed_book::getBorrowedBooksByCustomer($_GET['id']);

        $views = '../views';
        $cache = '../cache';
        $blade = new Blade($views, $cache);

        echo $blade->view()->make('viewCustomerSales', ['titulo'=>'See Borrowed Books'],['borrowedBooks' => $borrowedBooks])->render();

    ?>
</body>
</html>