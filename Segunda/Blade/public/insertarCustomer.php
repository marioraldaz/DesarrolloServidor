<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Customer</title>
</head>
<body>
    <?php
        require '../vendor/autoload.php';
        use Daw2\Blade\Customer;
        use Daw2\Blade\DBConnection;
        use Philo\Blade\Blade;

        DBConnection::getConnection();

        $views = '../views';
        $cache = '../cache';
        $blade = new Blade($views, $cache);
        // Your data for the view

        echo $blade->view()->make('viewInsertarCustomer')->render();
        if(isset($_POST['insertar'])){
            $nuevo = new Customer($_POST['firstName'],$_POST['surname'],$_POST['email'],$_POST['type']);
            $nuevo->insert();
            header("Refresh:0");
        }
    ?>
</body>
</html>