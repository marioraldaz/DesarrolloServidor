<?php
    namespace Daw2\Blade;
    use PDO;
    use PDOException;
    Class Sale_Book extends DBConnection{
    public $book_id;
    public $sale_id;
    public $amount;

    public function __construct($book_id, $sale_id, $amount){
        $this->book_id = $book_id;
        $this->sale_id = $sale_id;
        $this->amount = $amount;
    }

    public function insert(){
        try{

            $statement=DBConnection::$connection->prepare("INSERT INTO sale_book (book_id, sale_id, amount) VALUES (:book_id, :sale_id, :amount)");
            $statement->bindParam(':book_id',$this->book_id);
            $statement->bindParam(':sale_id',$this->sale_id);
            $statement->bindParam(':amount',$this->amount);
            $success=$statement->execute();
            if($success){
                echo "Inserción de producto en venta correcta.";
            } else{
                echo "Inserción de producto en venta fallida.";
            }
        } catch(PDOException $e){
            if($e->getCode()=="23000"){
                $update=DBConnection::$connection->prepare("Update sale_book SET amount = amount +1 where sale_id = $this->sale_id and book_id = $this->book_id");
                $update->execute();
            } else{
                var_dump($e);
            }

        }
    }

    }
