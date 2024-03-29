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
        use Segunda\books\Book;
        use Segunda\books\Sale;
        use Segunda\books\Sale_Book;
        use Segunda\books\DBConnection;
        session_start();
        session_destroy();

        DBConnection::getConnection();
        $compraFromURL = $_GET['compra'];
        $booksID= explode(",",$compraFromURL);
        $books=[];
        
        $sale = new Sale(date("Y-m-d H:i:s"),$_SESSION['customerID'] );
        $sale->insert();

        foreach ($booksID as $bookID){
            
            $sale_book = new Sale_Book($bookID,$sale->id,1);
            $sale_book->insert();
        }
        
        echo "<a href=./index.php>Volver</a>";
    ?>
</body>
</html>