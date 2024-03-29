<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./global.css" type="text/css">
</head>
<body>
    <form method="POST" action="">
        <button type="submit" name="insertarCustomer">Insertar Customer</button>
        <a href="./">Go Back</a>
    </form>
    <?php
        require 'vendor/autoload.php';
        use Segunda\books\Customer;
        use Segunda\books\DBConnection;
        use Segunda\books\Sale;

        DBConnection::getConnection();

        $customer = Customer::getCustomers();

        if (isset($_POST['insertarCustomer'])) {
            echo <<<FORM
            <form method="post" action="">
            
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" required>
                <br>
            
                <label for="surname">Surname:</label>
                <input type="text" name="surname" required>
                <br>
            
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <br>
            
                <label for="type">Type:</label>
                <input type="text" name="type" required>
                <br>
                <input type="hidden" name="insertarCustomer" value=""></br>
                <button type="submit" name="insertar">Submit</button>
            </form>
            FORM;
            if(isset($_POST['insertar'])){
                $nuevo = new Customer($_POST['firstName'],$_POST['surname'],$_POST['email'],$_POST['type']);
                $nuevo->insert();
                header("Refresh:0");
            }
        }  elseif(isset($_POST['seeSales'])){
           $sales = Sale::getSalesByCostumerId($_POST['seeSales']);
           var_dump($sales);

        } elseif(isset($_POST['seeBorrowedBooks'])){

        } elseif(isset($_POST['modifyCustomer'])){
            $params=Customer::getCustomerById($_POST['modifyCustomer'])[0];
            echo <<<FORM
            <form method="post" action="">
            
                <label for="firstName">First Name:</label>
                <input type="text" name="firstname" value=$params[firstname] required>
                <br>
            
                <label for="surname">Surname:</label>
                <input type="text" name="surname" value=$params[surname] required>
                <br>
            
                <label for="email">Email:</label>
                <input type="email" name="email" value=$params[email] required>
                <br>
            
                <label for="type">Type:</label>
                <input type="text" name="type" value=$params[type] required>
                <br>
                <input type="hidden" name="modifyCustomer" value=$params[id] />
                <button type="submit" name="insertar" value=$_POST[modifyCustomer]>Submit</button>
            </form>
            FORM;
            if(isset($_POST['insertar'])){
                Customer::modifyCustomer($_POST['insertar'],$_POST['firstname'],$_POST['surname'],$_POST['email'],$_POST['type']); 
                header("Refresh:0");
            }
        }
        elseif(isset($_POST['deleteCustomer'])){
            Customer::deleteCustomer($_POST["deleteCustomer"]);
            header("Refresh:0");
        }

        if(count($customer)>0){
                 echo '<form method="post" action="">';
        echo '<table border="1">';
        echo '<tr>';
        foreach ($customer[0] as $key => $value) {
            echo '<th>' . htmlspecialchars($key) . '</th>';
        }
        echo '<th>Actions</th>';
        echo '</tr>';
        
        foreach ($customer as $params) {
            echo '<tr>';
            foreach ($params as $key => $value) {
                echo '<td>' . htmlspecialchars($value) . '</td>';
            }
            echo '<td>';
            echo "<button type='submit' name='seeSales' value=$params[id]>";
            echo "See Sales</button>";
        
            echo "<button type='submit' name='seeBorrowedBooks' value=$params[id]>";
            echo "See Borrowed Books</button>";
        
            echo "<button type='submit' name='modifyCustomer' value=$params[id]>";
            echo 'Modify</button>';
        
            echo "<button type='submit' name='deleteCustomer' value=$params[id]>";
            echo 'Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
        echo '</form>';
        }
       
    ?>
</body>
</html>