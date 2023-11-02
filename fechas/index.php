<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php
    include 'calendario_funciones.php';

    if(!isset($_POST['ejercicio1']) && !isset($_POST['ejercicio2']) && !isset($_POST['ejercicio3'])&& !isset($_POST['ejercicio4'])){
    echo <<<FORM
        <form method="post" action="">
            <button type="submit" name="ejercicio1">Ejercicio1</button>
            <button type="submit" name="ejercicio2">Ejercicio2</button>
            <button type="submit" name="ejercicio3">Ejercicio3</button>
            <button type="submit" name="ejercicio4">Ejercicio4</button>
        </form>
    FORM;
    } elseif(isset($_POST['ejercicio1'])){
        date_default_timezone_set('Europe/Madrid');
        $fechaHoy=date("d-m-y",time());
        $horaHoy=date("H:i:s",time());
        $fechaMañana=date("d-m-y",strtotime(' +1 day'));
        $fechaLunes=date('d-m-y',strtotime('next Monday'));
        echo <<<TEXTO
            <h1>Fecha y hora de hoy: $fechaHoy  $horaHoy</h1></br>
            <h1>Fecha mañana: $fechaMañana</h1></br>
            <h1>Fecha lunes: $fechaLunes</h1></br>
        TEXTO;
    } elseif(isset($_POST['ejercicio2'])){
        if(!isset($_POST['fecha'])){
        echo <<<FORM
            <form method="post" action="">
                Fecha en formato yyyy-mm: <input type="text" name="fecha"/>
                <input type="hidden" name="ejercicio2"/>
            </form>
        FORM;
        } else{
            $fecha=explode('-',$_POST['fecha']);

            calendario_mensual($fecha[1],0,$fecha[0]);
            
        }
    } elseif(isset($_POST['ejercicio3'])){
        if(!isset($_POST['año'])){
            echo <<<FORM
                <form method="post" action="">
                    Fecha en formato yyyy: <input type="text" name="año"/>
                    <input type="hidden" name="ejercicio3"/>
                </form>
            FORM;
            } else{    
                calendario_anual($_POST['año']);
            }
    } elseif(isset($_POST['ejercicio4'])){
        if(!isset($_POST['año'])){
            echo <<<FORM
                <form method="post" action="">
                    Fecha en formato yyyy: <input type="text" name="año"/>
                    <input type="hidden" name="ejercicio4"/>
                </form>
            FORM;
            } else{    
                calendario_anual2($_POST['año']);
            }
    }

    ?>
</body>

</html>