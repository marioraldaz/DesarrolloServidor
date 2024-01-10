<?php
   
   class Cabecera{
    public $titulo;
    
    public function __construct($tit){
        $this->titulo = $tit;
    }

    public function __toString(){
        $cadena="
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>$this->titulo</title>
        </head>";
        return $cadena;
    }

   }

?>