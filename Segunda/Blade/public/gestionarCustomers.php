<?php
    require '../vendor/autoload.php';
    use Daw2\Blade\Customer;
    use Daw2\Blade\DBConnection;
    use Philo\Blade\Blade;

    DBConnection::getConnection();
    $customers = Customer::getCustomers();

    $views = '../views';
    $cache = '../cache';
    $blade = new Blade($views, $cache);
    // Your data for the view
    // Render the Blade view
    
    if(isset($_POST['deleteCustomer'])){
        header("refresh:5");
        Customer::deleteCustomerById($_POST['deleteCustomer']);
        echo "Customer deleted successfully, refreshing in 5 seconds.";
    }
    echo $blade->view()->make('viewCustomers', ['titulo'=>'titulo'],['customers' => $customers])->render();