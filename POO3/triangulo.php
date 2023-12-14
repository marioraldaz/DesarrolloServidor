<?php

    class Triangulo extends Figura{
        private $longitudLado;
        private $perimetro;
        private $area;
        private $altura;
        public function getPerimetro(){
            return $this->perimetro;
        }

        public function getArea(){
            return $this->area;
        }
        public function getAltura(){
            return $this->altura;
        }
        public function __construct($longitudLado){
            $this->longitudLado=$longitudLado;
            $this->perimetro=$longitudLado*3;
            $this->altura=$longitudLado*sqrt(3)/2;
            $this->area=($longitudLado*$this->altura)/2;
        }

        public function __toString(){
            return parent::__toString().' Longitud del lado :'.$this->longitudLado.' Perimetro: '.$this->perimetro.' Area:'. $this->area.' Altura: '.$this->altura;
        }
    }

?>