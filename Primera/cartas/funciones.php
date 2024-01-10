<?php 
    $imagesDir = "./imagenes";
    

    function ordenar($baraja){
        $baraja=sort($baraja);
        return $baraja;
    }
    
    function pintarCartas(){
        global $imagesDir;
        global $baraja;
        foreach($baraja as $carta){
            $ruta = $imagesDir.'/'.$carta.'.jpg';
            echo "<img src='$ruta' class='card' alt = $ruta/>";
        }
       
}

function seleccionarCartas($nCartas,$palos){
    global $baraja;
    $array=[];
    if(sizeof($palos)==0){
        $listaPalos=['oros','copas','espadas','bastos'];
        $palos=[];
        array_push($palos,$listaPalos[array_rand($listaPalos)]);
    }
    foreach($palos as $pal){
        $arrayRandoms=[];
        for($i= 1; $i<=$nCartas; $i++){ 
            $valido=false;
            while(!$valido){
                $random = rand(1,12);
                if(!in_array($random,$arrayRandoms)){
                    array_push($arrayRandoms,$random);
                    array_push($array, $random.$pal );
                    $valido=true;
                }
            }
        }
    }
    $baraja=$array;
    return pintarCartas();
}

    function crearBaraja(){
    $palos=['oros','copas','espadas','bastos'];
    $array=[];
    foreach($palos as $pal){
    for($i= 1; $i<=12; $i++){ array_push($array,$i.$pal); } } return $array; } function seleccionadorDeCartas(){ echo
        <<<FORM
        <h1>Seleccionador de Cartas</h1>

        <div class="container">
            <form method="post" action="">
                <h1>Seleccione el número de cartas</h1>
                <input type="number" name="numeroCartas" />
                <h1> Seleccione el palo (opcionales)</h1>
                Oros:<input type="checkbox" name="oros" />
                Copas:<input type="checkbox" name="copas" />
                Espadas:<input type="checkbox" name="espadas" />
                Bastos:<input type="checkbox" name="bastos" />
                <input type="hidden" name="seleccionarCartas"/>
                <input type="submit" name="enviar" />
            </form>
        </div>
        FORM;
        }
        function verBaraja(){
        pintarCartas();
        }
        ?>