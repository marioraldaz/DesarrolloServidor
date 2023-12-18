<?php

    
    function palabraAleatoria(){
        $jsonURL= "./datos.json";
        $JSON = file_get_contents($jsonURL);
        $datos = json_decode($JSON,true); //TRUE FOR ASSOCIATIVE
        $palabras=$datos["palabras"];
        
        return $palabras[array_rand($palabras)];
    }

    function abecedario(){
        $jsonURL= "./datos.json";
        $JSON = file_get_contents($jsonURL);
        $datos = json_decode($JSON,true); //TRUE FOR ASSOCIATIVE
        $abecedario=$datos["abecedario"];
        return $abecedario;
    }

    function pintarLetras($letras,$letrasUsadas){
        $string="";
        foreach($letras as $letra){
            if(array_search($letra,$letrasUsadas)){
                $string.="<div class=usada>$letra</div>";
            } else{
                $string.="<div class=noUsada><input type=submit class=noUsada name='enviar' value='$letra'  /></input></div>";
            }
        }
        return $string;
    }

    function pintarHuecos($palabra,$letrasAdivinadas){
        $string="";
        $palabra = str_split($palabra);

        foreach($palabra as $letra){
            if(in_array($letra,$letrasAdivinadas)){
                $string.="<div class=huecoConLetra>$letra</div>";
            } else{
                $string.="<div class=hueco></div>";
            }
        }
        return $string;
    }

    function existeLetra($palabra,$letraABuscar){
        $palabra = str_split($palabra);
        
        foreach($palabra as $letra){
            if($letra==$letraABuscar){
                return true;
            }
        }
        return false;
    }

    function perder(){
        echo "Has Perdido.";
        session_destroy();
    }

    function ganar(){
        echo "Has Ganado!";
        session_destroy();
    }
?>