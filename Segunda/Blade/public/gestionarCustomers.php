<?php
    require '../vendor/autoload.php';
    use Daw2\Blade\Customer;
    use Daw2\Blade\DBConnection;
    use Philo\Blade\Blade;

    DBConnection::getConnection();
    $customersInDB = Customer::getCustomers();

    $views = '../views';
    $cache = '../cache';
    $blade = new Blade($views, $cache);
    // Your data for the view
    // Render the Blade view
    
    echo $blade->view()->make('viewCustomers', ['titulo'=>'titulo'],['customersInDB' => $customersInDB, 'titulo' => 'Lista de Familias', 'encabezado' => 'Familias Disponibles'])->render();

