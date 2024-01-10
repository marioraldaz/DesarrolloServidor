<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./global.css" type="text/css">
</head>
<body>
    <?php
        include "utilidades.php";
        session_start();
        $abecedario = abecedario();
        
        
        if(!isset($_SESSION["palabra"])){
            $_SESSION["palabra"] =  palabraAleatoria();
        }
        $palabra = $_SESSION["palabra"];

        
        if(!isset($_SESSION["letrasUsadas"])){
            $_SESSION["letrasUsadas"] = [];
        } 

    
        if(!isset($_SESSION["letrasAdivinadas"])){
            $_SESSION["letrasAdivinadas"] = [];
        }
        
        if(isset($_POST["enviar"])){
            array_push($_SESSION["letrasUsadas"], $_POST['enviar']);
            if(existeLetra($palabra, $_POST['enviar']))
                array_push($_SESSION["letrasAdivinadas"],$_POST["enviar"]); 
        }
            
        
        $letrasUsadas=$_SESSION["letrasUsadas"];
        $letrasAdivinadas=$_SESSION["letrasAdivinadas"];
        
        var_dump($palabra);
        var_dump($letrasAdivinadas);

        
        $letras=pintarLetras($abecedario,$letrasUsadas);
        
        $huecos=pintarHuecos($palabra, $letrasAdivinadas);
        
        if(sizeof($letrasUsadas)>=5){
            perder();
            header("location:index.php");
        }
        if($letrasAdivinadas==strlen($palabra)){
            ganar();
            header("location:index.php");
        }

        echo <<<DISPLAY
            <div class="container">
                <div class="palabra">
                    $huecos
                </div>
                <form method="post" action="">
                    <div class="letras">
                        $letras
                    </div>
                </form>
            </div>
        DISPLAY;

    ?>
</body>
</html>