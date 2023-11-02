<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css" type="text/css">
    <title>Document</title>
</head>

<body>

    <?php
        if(!isset($_GET["mes"])){
            echo <<<FORM
            <form action="" name="formulario" class="formulario" >
                <select name="mes" class="elegir-mes">
                    <option value="enero">Enero</option>
                    <option value="febrero">febrero</option>
                    <option value="marzo">marzo</option>
                    <option value="abril">abril</option>
                    <option value="mayo">mayo</option>
                    <option value="junio">junio</option>
                    <option value="julio">julio</option>
                    <option value="agosto">agosto</option>
                    <option value="septiembre">septiembre</option>
                    <option value="octubre">octubre</option>
                    <option value="noviembre">noviembre</option>
                    <option value="diciembre">diciembre</option>
                </select>
                <input type="submit" class="boton-submit">
            </form>
            FORM;
        } else {
            $numDias=0;
            $mes=$_GET["mes"];
            switch($mes){
                case 'enero':
                    $numDias=31;
                    break;
                case 'febrero':
                    $numDias=28;
                    break;
                case 'marzo':
                    $numDias=31;
                    break;
                case 'abril':
                    $numDias=30;
                    break;
                case 'mayo':
                    $numDias=31;
                    break;
                case 'junio':
                    $numDias=30;
                    break;
                case 'julio':
                    $numDias=31;
                    break;
                case 'agosto':
                    $numDias=31;
                    break;
                case 'septiembre':
                    $numDias=30;
                    break;
                case 'octubre':
                    $numDias=31;
                    break;
                case 'noviembre':
                    $numDias=30;
                    break;
                case 'diciembre':
                    $numDias=31;
                    break;
            }
            echo <<<CABECERA
            <div class="container">
                <div class="cabecera">
                <h1 class="centrar-texto color-marron">$mes</h1>
                </div>
                <div class="centrar-todo">
            CABECERA;
            for($i=1;$i<=$numDias;$i++){
                echo "<div class='dia'><h2>$i<h2></div>";
            }
            echo '</div></div>';
        }
    ?>
</body>

</html>