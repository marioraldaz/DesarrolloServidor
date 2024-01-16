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

        $dbConnection=new DBConnection('./config.json');
        $connection=$dbConnection->connection;
        $books=$connection->prepare("Select * from customer");
        $books->execute();
        $books = $books->fetchAll(PDO::FETCH_ASSOC);

        echo '<table border="1">';
        echo '<tr>';
        foreach ($books[0] as $key => $value) {
            echo '<th>' . htmlspecialchars($key) . '</th>';
        }
        echo '<th>Actions</th>';
        echo '</tr>';
        
        foreach ($books as $params) {
            echo '<tr>';
            foreach ($params as $key => $value) {
                echo '<td>' . htmlspecialchars($value) . '</td>';
            }
            echo '<td>';
            echo '<a href="seeSales.php?id=' . $params['id'] . '">See Sales</a>';
            echo '<a href="seeBorrowedBooks.php?id=' . $params['id'] . '">See Borrowed Books</a>';
            echo '<a href="modifyCustomer.php?id=' . $params['id'] . '">Modify</a>';
            echo '<a href="deleteCustomer.php?id=' . $params['id'] . '">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</table>';


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
            FORM;
            if(isset($_POST['insertar'])){
                $nuevo = new Customer($_POST['firstName'],$_POST['surname'],$_POST['email'],$_POST['type'],$connection);
                $nuevo->insert();
            }
        }  elseif(isset($_POST['borrarCustomer'])){

        } elseif(isset($_POST['verCustomers'])){

        } elseif(isset($_POST['buscarCustomer'])){
        
        }
    ?>
</body>
</html>