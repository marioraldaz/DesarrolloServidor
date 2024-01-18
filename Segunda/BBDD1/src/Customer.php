<?php
    Namespace Segunda\books;
    use PDO;
    use PDOException;
    Class Customer extends DBConnection{
        public $firstname;
        public $surname;
        public $email;
        public $type;


        public function __construct($firstName, $surname, $email, $type){
            $this->firstname = $firstName;
            $this->surname = $surname;
            $this->email = $email;
            $this->type = $type;
            parent::getConnection();
        }
        
        public function insert(){
            $query = "INSERT INTO customer ( firstname, surname, email, type) VALUES ( :firstname, :surname, :email, :type)";

            $statement = DBConnection::$connection->prepare($query);
            
            $statement->bindParam(':firstname', $this->firstname);
            $statement->bindParam(':surname', $this->surname);
            $statement->bindParam(':email', $this->email);
            $statement->bindParam(':type', $this->type);
            
            $success= $statement->execute();
            if($success){
                echo "Customer insertado correctamente";
            } else{
                echo "Error al insertar el libro";
            }
        }

        public static function getCustomers(){
            $statement = DBConnection::$connection->prepare("SELECT * FROM customer");
        if ($statement->execute()) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                // Handle the case where the query execution failed
                return false;
            }
        }

        public static function deleteCustomer($id){
            $statement = DBConnection::$connection->prepare("DELETE FROM customer where id = $id");
            if ($statement->execute()) {
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                
                return false;
            }
        }
}