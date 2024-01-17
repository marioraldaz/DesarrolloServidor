<?php
    namespace Segunda\books;
    Class Sale extends DBConnection{
        public $customer_id;

        public function __construct($customer_id) {
            $this->customer_id = $customer_id;
            parent::getConnection();
        }
        public function insert(){
            $query=$this->connection->prepare("INSERT INTO sale (customer_id) VALUES ('$this->customer_id')");
            $query->execute();
        }

        public static function getSales($customerID){
            $file = DBConnection::$connection->prepare("SELECT * FROM sale where customer_id = '$customerID'");
            $file->execute();
            var_dump($file->fetchAll());
            return $file->fetchAll();
        }
    }