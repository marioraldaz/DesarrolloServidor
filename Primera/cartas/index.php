<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        include("funciones.php");
        include("variables.php");
        $cartas=[];
        echo '<h1>EJERCICIO BARAJA</h1>';
    
        if(isset($_POST['verBaraja'])){
            
            crearBaraja();
            pintarCartas();
            
        } else if(isset($_POST['seleccionarCartas'])){
            
            seleccionadorDeCartas();
            $palos=[];
            if(isset($_POST['oros']))
                array_push($palos, 'oros');
            
            if(isset($_POST['copas']))
                array_push($palos, 'copas');
        
            if(isset($_POST['espadas']))
                array_push($palos, 'espadas');
        
            if(isset($_POST['bastos']))
                array_push($palos, 'bastos');
            
            if(isset($_POST['enviar'])){
                
                seleccionarCartas($_POST['numeroCartas'],$palos);
            }

        } else{
            echo <<<FORM
                <form action='' method="POST">
                    <button name='verBaraja'>Ver baraja</button>
                    <button name='seleccionarCartas'>Seleccionar cartas</button>
                </form>
            FORM;
            
            echo "</div>";
        }
    ?>
</body>

</html>