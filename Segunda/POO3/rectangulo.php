<?php

    class Triangulo extends Figura{
        private $anchura;
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
        public function getAnchura(){
            return $this->anchura;
        }
        public function __construct($color,$altura,$anchura){
            $this->altura=$altura;
            $this->anchura=$anchura;
            $this->perimetro=$altura*2 + $anchura*2;
            $this->area=$this->altura*$this->anchura;
            parent::__construct($color,$this->area);
        }

        public function __toString(){
            return parent::__toString().' Altura: '.$this->altura.' Anchura :'.$this->anchura.' Perimetro: '.$this->perimetro.' Area:'. $this->area.' Altura: '.$this->altura;
        }
    }

?>