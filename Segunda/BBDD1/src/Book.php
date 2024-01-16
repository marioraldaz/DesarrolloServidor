<?php
    namespace Segunda\books;
    use PDO;
    Class Book extends DBConnection{
        private $isbn;
        private $title;
        private $author;
        private $stock;
        private $price;
    
        public function __construct($isbn, $title, $author, $stock, $price) {
            
            $this->isbn = $isbn;
            $this->title = $title;
            $this->author = $author;
            $this->stock = $stock;
            $this->price = $price;
            parent::__construct('./config.json');
            parent::dbConnect();
        }

        public function insert(){
                $query = "INSERT INTO book ( isbn, title, author, stock, price) 
                          VALUES ( :isbn, :title, :author, :stock, :price)";
        
                $statement = $this->connection->prepare($query);
        
                $statement->bindParam(':isbn', $this->isbn);
                $statement->bindParam(':title', $this->title);
                $statement->bindParam(':author', $this->author);
                $statement->bindParam(':stock', $this->stock);
                $statement->bindParam(':price', $this->price);
                $success=$statement->execute();
                if ($success) {
                    echo "Book inserted successfully.";
                } else {
                    echo "Error inserting book: " . implode(" ", $statement->errorInfo());
                }
        }

        public function deleteBookById($id) {
            $query = "DELETE FROM book WHERE id = :id";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
    
            if ($statement->execute()) {
                echo "Book with ID $id deleted successfully.";
            } else {
                echo "Error deleting book: " . implode(" ", $statement->errorInfo());
            }
        }
        public function deleteBookByTitle($title) {
            $query = "DELETE FROM book WHERE title = :title";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(':title', $title, PDO::PARAM_STR);
    
            if ($statement->execute()) {
                echo "Book with title '$title' deleted successfully.";
            } else {
                echo "Error deleting book: " . implode(" ", $statement->errorInfo());
            }
        }

    }