<?php
    Namespace Segunda\books;

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
            parent::__construct('./config.json');
        }
        
        public function insert(){
            $query = "INSERT INTO customer ( firstname, surname, email, type) VALUES ( :firstname, :surname, :email, :type)";

            $statement = $this->connection->prepare($query);
            
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