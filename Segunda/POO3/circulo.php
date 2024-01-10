<?php

    class Triangulo extends Figura{
        private $radio;
        public function getRadio(){
            return $this->radio;
        }

        public function __construct($color,$radio){
            $this->radio = $radio;
            parent::__construct($color,$radio);
        }

        public function __toString(){
            return parent::__toString().' Longitud del lado :'.$this->longitudLado.' Perimetro: '.$this->perimetro.' Area:'. $this->area.' Altura: '.$this->altura;
        }
    }

?>