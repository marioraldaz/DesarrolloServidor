<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require 'vendor/autoload.php';
        use Segunda\books\DBConnection;
        use Segunda\books\Book;
        use Segunda\books\Sale;
        use Segunda\books\Customer;
        DBConnection::getConnection();
        session_start();
        if(!isset($_SESSION['customerID'])){
            if(isset($_POST['customer_firstname']) && isset($_POST['customer_lastname']) ){
                $customer = Customer::getCustomerByName($_POST['customer_firstname'], $_POST['customer_lastname']);
                if($customer){
                    $customer=$customer[0];
                }
                if(count($customer)==0 || $customer===null){
                    echo "<h1>Customer Not Found</h1>";
                } else{
                    $_SESSION['customerID'] = $customer['id'];
                }
            } 
        }
        
        if(isset($_SESSION['customerID'])){
            $customer=Customer::getCustomerByID($_SESSION['customerID'])[0];
            $booksInDB = Book::getBooks();
            echo '<div class="container"><form method="POST" action="">';
            echo '<a href="./">Go Back</a></br>';
            echo "Make sale for $customer[firstname] $customer[surname]</br>";
        //
          
            //
            $books=[];
            if(isset($_POST['booksToBuy'])){
                if(isset($_POST['comprar'])){
                    if(isset($_POST['booksToBuy'])){
                      
                        $books=explode(',', $_POST['booksToBuy']);
                    if(gettype($books)!=='array'){
                        
                        $books=[$books];
                    }                    
                        if(gettype($books)=='array' && strlen($_POST['booksToBuy']) > 0){
                            array_push($books,$_POST['comprar']);
                        } else{
                            $books=[$_POST['comprar']];
                        }
                    }
                    
                } else{
                    $books=[];
                }
                if(isset($_POST['quitarLibro'])){
                    unset($books[$_POST['quitarLibro']]);
                }
                
            if(count($books)>0){
                echo "<br>Books in cart</br>";
                echo "<table>";

                $arrayBooks=[];
                foreach($books as $book){
                    array_push($arrayBooks,Book::getBookById($book)[0]);
                }
                foreach ($arrayBooks[0] as $key => $value) {
                    
                    echo '<th>' . htmlspecialchars($key) . '</th>';
                }
                
                
                echo '<th>Actions</th>';
                echo '</tr>';
                foreach ($arrayBooks as $params) {
                    echo '<tr>';
                    foreach ($params as $key => $value) {
                        echo '<td>' . htmlspecialchars($value) . '</td>';
                    }
                    echo '<td>';
                    echo "<button type=submit name=quitarLibro value=$params[id]>Quitar libro</button>";
                    echo '</td>';
                    echo '</tr>';
                }
                echo "</table>";
                $compra= implode(', ', $books);
                echo "<a href='gestionarCompra.php?compra=$compra&customerID=$_SESSION[customerID]'>Hacer compra</a>";
            }
            }

            //
            echo "</br> Books available</br>";

            echo "<table>";
            foreach ($booksInDB[0] as $key => $value) {
                echo '<th>' . htmlspecialchars($key) . '</th>';
            }
            
            echo '<th>Actions</th>';
            echo '</tr>';
            
            foreach ($booksInDB as $params) {
                echo '<tr>';
                foreach ($params as $key => $value) {
                    echo '<td>' . htmlspecialchars($value) . '</td>';
                }
                echo '<td>';
                echo "<button type=submit name=comprar value=$params[id]>Comprar libro</button>";
                echo '</td>';
                echo '</tr>';
            }
            echo "</table>";
                $books= implode(', ', $books);

                echo "<input type=hidden name='booksToBuy' value='$books' >";
            
            echo "<input type=hidden value=$_POST[customer_firstname] name=customer_firstname>";
            echo "<input type=hidden value=$_POST[customer_lastname] name=customer_lastname>";
               
            
            echo '</form></div>';

        
        } else{
            echo <<<FORM
                <form method="post" action="">
                    Insert customer firstname: <input type="text" name="customer_firstname"/>
                    Insert customer lastname: <input type="text" name="customer_lastname"/>

                    <input type="submit" value="Hacer compra" />
                </form>
            FORM;
        }
    ?>
</body>
</body>

<style>
       body {
    font-family: 'Arial', sans-serif;
    margin: 20px;
    display: flex;
}

*{
  
}
.container {
    width:80%;
    margin: auto;

}

table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

form {
    margin-top: 20px;
}

input[type="text"] {
    padding: 8px;
    width: 200px;
}

input[type="submit"], button {
    padding: 10px;
    cursor: pointer;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
}

a {
    text-decoration: none;
    color: #4CAF50;
    margin-bottom: 20px;
    display: inline-block;
}
    </style>
</html>