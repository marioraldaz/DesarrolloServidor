<?php

    class Costumer extends Persona{
        private static $lastId=0;
        private $id;
        private $correo;

        public function __construct($nombre,$apellidos,$correo){
            self::$lastId++;
            $this->id=self::$lastId;
            parent::__construct($nombre,$apellidos);
            $this->correo = $correo;
        }

        public function __toString(){
            return "id:".intval($this->id)." nombre:".parent::__toString()." correo:".$this->correo;
        }
    }

?>