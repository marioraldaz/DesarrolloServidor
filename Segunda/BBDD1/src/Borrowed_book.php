<?php
    namespace Segunda\books;
    use PDO;
    use PDOException;
    class BorrowedBooks extends DBConnection {

        public $book_id;
        public $customer_id;
        public $start;
        public $end;
    
        public function __construct($configFile, $book_id, $customer_id, $start, $end = null) {
            parent::__construct($configFile);
            $this->book_id = $book_id;
            $this->customer_id = $customer_id;
            $this->start = $start;
            $this->end = $end;
        }
    
        public function insertBorrowedBook() {
            try {
                $this->dbConnect();
    
                // Assuming $this->connection is the PDO connection object
                $query = "INSERT INTO borrowed_books (book_id, customer_id, start, end) 
                          VALUES (:book_id, :customer_id, :start, :end)";
    
                $statement = $this->connection->prepare($query);
    
                $statement->bindParam(':book_id', $this->book_id, PDO::PARAM_INT);
                $statement->bindParam(':customer_id', $this->customer_id, PDO::PARAM_INT);
                $statement->bindParam(':start', $this->start, PDO::PARAM_STR);
                $statement->bindParam(':end', $this->end, PDO::PARAM_STR);
    
                $statement->execute();
            } catch (PDOException $error) {
                echo "Error inserting borrowed book: " . $error->getMessage();
            } finally {
                $this->dbClose();
            }
        }
    
        public function getBorrowedBooksByCustomer($customer_id) {
            try {
                $this->dbConnect();
    
                // Assuming $this->connection is the PDO connection object
                $query = "SELECT * FROM borrowed_books WHERE customer_id = :customer_id";
    
                $statement = $this->connection->prepare($query);
                $statement->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
                $statement->execute();
    
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $error) {
                echo "Error retrieving borrowed books: " . $error->getMessage();
            } finally {
                $this->dbClose();
            }
        }
    }