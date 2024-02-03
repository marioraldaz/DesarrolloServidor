<?php
    namespace Daw2\Blade;
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

        public static function getCustomerById($id){
            $statement = DBConnection::$connection->prepare("Select * FROM customer where id = $id");
            if ($statement->execute()) {
                $params=$statement->fetchAll(PDO::FETCH_ASSOC);
                return $params;
            } else {
                return false;
            }
        }

        public static function getCustomerByName($firstname,$surname){
            $statement = DBConnection::$connection->prepare("SELECT * FROM customer WHERE firstname = :firstname AND surname = :surname");
            $statement->bindParam(':firstname', $firstname);
            $statement->bindParam(':surname', $surname);
            $statement->execute();
            if ($statement->execute()) {
                $params=$statement->fetchAll(PDO::FETCH_ASSOC);
                return $params;
            } else {
                return false;
            }
        }

        public static function modifyCustomer($id, $firstname, $surname, $newEmail, $type){
            try {
                // ... (your connection setup)
        
                $statement = DBConnection::$connection->prepare("UPDATE customer SET firstname = :newFirstname, surname = :newSurname, email = :newEmail, type = :newType WHERE id = :customerId");
                $statement->bindParam(':newFirstname', $firstname);
                $statement->bindParam(':newSurname', $surname);
                $statement->bindParam(':newEmail', $newEmail);
                $statement->bindParam(':newType', $type);
                $statement->bindParam(':customerId', $id, PDO::PARAM_INT); // Assuming $id is an integer
                $statement->execute();
        
                echo "Update successful";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }

        
        
}