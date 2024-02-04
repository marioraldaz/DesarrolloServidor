<?php
    require '../vendor/autoload.php';
    use Daw2\Blade\Customer;
    use Daw2\Blade\DBConnection;
    use Philo\Blade\Blade;

    DBConnection::getConnection();
    $customer = Customer::getCustomerById($_GET['id']);
    $customer=$customer[0];
    $views = '../views';
    $cache = '../cache';
    $blade = new Blade($views, $cache);
    // Your data for the view
    // Render the Blade view
    
    if(isset($_POST['updateCustomer'])){
        header("refresh:5");
        $id = $_POST['updateCustomer'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $newEmail = $_POST['newEmail'];
        $type = $_POST['type'];

        // Use the Customer model to modify the customer
        Customer::modifyCustomer($id, $firstname, $surname, $newEmail, $type);

        echo "Customer deleted successfully, refreshing in 5 seconds.";
    }
    echo $blade->view()->make('viewModifyCustomer', ['titulo'=>'titulo'],['customer' => $customer])->render();