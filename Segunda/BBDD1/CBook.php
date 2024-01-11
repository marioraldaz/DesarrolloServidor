<?php

    Class Book extends DBConnection{
        public $id;
        public $firstName;
        public $surname;
        public $email;
        public $type;

        public function __construct($id, $firstName, $surname, $email, $type){
            $this->id = $id;
            $this->firstName = $firstName;
            $this->surname = $surname;
            $this->email = $email;
            $this->type = $type;
        }
    }