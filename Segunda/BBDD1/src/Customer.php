<?php
    Namespace Segunda\books;

    Class Customer extends DBConnection{
        public $id;
        public $firstname;
        public $surname;
        public $email;
        public $type;

        public function __construct($id, $firstName, $surname, $email, $type){
            $this->id = $id;
            $this->firstname = $firstName;
            $this->surname = $surname;
            $this->email = $email;
            $this->type = $type;
            parent::__construct('./config.json');
            parent::dbConnect();
        }
        
        public function insert(){
            var_dump($this->connection);
            $query = "INSERT INTO customer (id, firstname, surname, email, type) VALUES (:id, :firstname, :surname, :email, :type)";

            $statement = $this->connection->prepare($query);
            
            $statement->bindParam(':id', $this->id);
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
}