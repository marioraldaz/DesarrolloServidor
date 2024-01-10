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
     if(isset($_GET['edad']) && !is_numeric($_GET['edad'])){
        echo '<h1>La edad no es valida</h1>';
        $_GET['edad']=null;
    }
    if(!isset($_GET['enviar']) || !isset($_GET['nombre']) || !isset($_GET['fecha-de-nacimiento']) || !isset($_GET['aaa']) || !isset($_GET['color']) || !isset($_GET['tiempo1']) || $_GET['edad']==null ){
    echo <<<FORM
    <form method="get" action="" class="formulario">  
        <div class="container">

            <div class="elem-container">
                0<input type="range" min="0" max="100" value="50" class="slider" name="barra">100 + <input type="number"
                    name="numero" class="number">
            </div>

            <div class="elem-container">
                Estaciones
                <select name="aaa" class="estaciones" id="aaa">
                    <option value="Invierno">Invierno</option>
                    <option value="Primavera">Primavera</option>
                    <option value="Verano">Verano</option>
                    <option value="Otoño">Otoño</option>
                </select>
            </div>

            <div class="elem-container">
                Color favorito <input type="color" name="color">
            </div>

            <div class="elem-container">
                Nombre <input type="text" name="nombre">
            </div>

            <div class="elem-container">
                Apellido <input type="text" name="apellido">
            </div>

            <div class="elem-container">
                Email <input type="text" name="email">
            </div>

            <div class="elem-container">
                Fecha de nacimiento <input type="date" name="fecha-de-nacimiento" class="elem-date">
            </div>

            <div class="elem-container">
                Edad (0-150) <input type="text" name="edad">
            </div>

            <div class="elem-container">
                Pagina personal: <input type="text" name="pagina-personal">
                <div class="horario">
                    Horario: De <input type="time" name="tiempo1"> a <input type="time" name="tiempo2">
                </div>
            </div>

            <div class="elem-container">
                <input type="submit" value="Enviar" name="enviar">
            </div>
        </div>
    </form>
    FORM;
} else{
        $barra = $_GET['barra'];
        $numero = $_GET['numero'];
        $suma=$barra+$numero;
        $estaciones = $_GET['aaa'];
        $color = $_GET['color'];
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $email = $_GET['email'];
        $fecha_de_nacimiento = $_GET['fecha-de-nacimiento'];
        $edad = $_GET['edad'];
        $pagina_personal = $_GET['pagina-personal'];
        $tiempo1 = $_GET['tiempo1'];
        $tiempo2 = $_GET['tiempo2'];
        $horario = $tiempo1. " a ". $tiempo2;
        echo <<<DISPLAY
        <div class="container">

            <div class="elem-container">
              Suma: $suma
            </div>

            <div class="elem-container">
                Estaciones $estaciones
            </div>

            <div class="elem-container">
                Color favorito <div class="cuadro-color" style="background-color:$color"></div>
            </div>

            <div class="elem-container">
                Nombre $nombre
            </div>

            <div class="elem-container">
                Apellido $apellido
            </div>

            <div class="elem-container">
                Email $email
            </div>

            <div class="elem-container">
                Fecha de nacimiento $fecha_de_nacimiento
            </div>

            <div class="elem-container">
                Edad $edad
            </div>

            <div class="elem-container">
                Pagina personal: $pagina_personal
                <div class="horario">
                    Horario: $horario
                </div>
            </div>
        </div>
        DISPLAY;
    }

    ?>
</body>

</html>