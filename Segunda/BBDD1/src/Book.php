<?php
    namespace Segunda\books;
    use Segunda\books\DBConnection;
    
    Class Book extends DBConnection{
        private $id;
        private $isbn;
        private $title;
        private $author;
        private $stock;
        private $price;
    
        public function __construct($id, $isbn, $title, $author, $stock, $price) {
            $this->id = $id;
            $this->isbn = $isbn;
            $this->title = $title;
            $this->author = $author;
            $this->stock = $stock;
            $this->price = $price;
            parent::__construct('./config.json');
            parent::dbConnect();
        }

        public function insert(){
                $query = "INSERT INTO book (id, isbn, title, author, stock, price) 
                          VALUES (:id, :isbn, :title, :author, :stock, :price)";
        
                $statement = $this->connection->prepare($query);
        
                $statement->bindParam(':id', $this->id);
                $statement->bindParam(':isbn', $this->isbn);
                $statement->bindParam(':title', $this->title);
                $statement->bindParam(':author', $this->author);
                $statement->bindParam(':stock', $this->stock);
                $statement->bindParam(':price', $this->price);
        
                if ($statement->execute()) {
                    echo "Book inserted successfully.";
                } else {
                    echo "Error inserting book: " . implode(" ", $statement->errorInfo());
                }
        }

    }