<?php

    abstract class Figura{
        private $color;
        private $alto;
        private $ancho;

        public function __construct($color,$alto, $ancho){
            $this->color = $color;
            $this->alto=$alto;
            $this->ancho=$ancho;
        }

        public function __toString(){
            return ".$this->color.''.$this->alto ";
        }
    }

?>