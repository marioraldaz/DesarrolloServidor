<?php

    abstract class Figura{
        private $color;
        private $tamaño;

        public function __construct($color,$tamaño){
            $this->color = $color;
            $this->tamaño = $tamaño;
        }

        public function __toString(){
            return 'Color: '.$this->color.'Tamaño (px): '.$this->tamaño;
        }

        public function getColor(){
            return $this->color;
        }
    }

?>