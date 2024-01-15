<?php
    namespace Segunda\books;
    Class Sale extends DBConnection{
        public $customer_id;

        public function __construct($customer_id) {
            parent::__construct('./config.json');
            parent::dbConnect();
            $this->customer_id = $customer_id;
        }
        public function insert(){
            $query=$this->connection->prepare("INSERT INTO sale (customer_id) VALUES ('$this->customer_id')");
            $query->execute();
        }
    }