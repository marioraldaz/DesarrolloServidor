<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See Customer Sales</title>
</head>
<body>
    <?php

        require '../vendor/autoload.php';
        use Philo\Blade\Blade;
        use Daw2\Blade\Sale;
        use Daw2\Blade\DBConnection;

        DBConnection::getConnection();
        $sales = Sale::getSalesByCostumerId($_GET['id']);
        $views = '../views';
        $cache = '../cache';
        $blade = new Blade($views, $cache);
        // Your data for the view
        // Render the Blade view

        echo $blade->view()->make('viewCustomerSales', ['titulo'=>'titulo'],['sales' => $sales])->render();

    ?>
</body>
</html>