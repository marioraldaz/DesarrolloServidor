<?php

    class Triangulo extends figura{

        private $ancho;
        public function __construct($alto,$ancho){

        }

        public function __toString(){
            return parent::__toString().$ancho;
        }
    }
?>