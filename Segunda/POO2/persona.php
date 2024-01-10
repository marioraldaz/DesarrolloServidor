<?php

    class Persona{
        private $nombre;
        private $apellidos;

        public function __construct($nombre, $apellidos){
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
        }

        public function __toString(){
            return " nombre:".$this->nombre." apellidos:".$this->apellidos;
        }
    }
?>