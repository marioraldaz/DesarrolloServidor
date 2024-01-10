<?php

    Class libro{
        public $titulo="default_title";
        public function __construct($tit){
            $this->titulo=$tit;
        }
        public function __toString(){
            return $this->titulo;
        }
    }
?>