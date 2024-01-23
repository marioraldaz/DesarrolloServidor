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

        if(isset($_POST['customer_firstname'])){
            DBConnection::getConnection();
            Customer::getCustomerByName($_POST['customer_firstname'], $_POST['customer_lastname']);
            $booksInDB = Book::getBooks();
            echo '<div class="container"><form method="POST" action="">';
            echo '<a href="./">Go Back</a></br>';
            echo "Make sale for $_POST[customer_firstname]  $_POST[customer_lastname]</br>";
        //
          
            //
            echo "c";
            $books=[];
            if(isset($_POST['booksToBuy'])){
                
                echo "b";
            if(isset($_POST['comprar'])){
                echo "a";
                if(isset($_POST['booksToBuy'])){
                    $books=explode(',', $_POST['booksToBuy']);
                    var_dump($books);
                if(gettype($books)!=='array'){
                    $books=[$books];
                }
                    echo "3";
                    
                    if(gettype($books)=='array'){
                        array_push($books,$_POST['comprar']);
                    } else{
                        $books=[$_POST['comprar']];
                        echo "2";
                    }
                }
                
            } else{
                $books=[];
                echo "1";
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
               
                foreach ($arrayBooks[0]as $key => $value) {
                    
                    echo '<th>' . htmlspecialchars($key) . '</th>';
                }
                
                
                echo '<th>Actions</th>';
                echo '</tr>';
                var_dump($arrayBooks);
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