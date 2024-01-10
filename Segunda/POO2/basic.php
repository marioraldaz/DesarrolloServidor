<?php
    class Basic extends Costumer{
        private $cantidad=200;
        public function __construct($nombre,$apellidos,$correo){
            parent::__construct($nombre,$apellidos,$correo);
        }

        public function __toString(){
            return parent::__toString()." cantidad:".$this->cantidad;
        }
    }
?>