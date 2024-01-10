<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "./idiomas.php";

        function crearSelect(){
            global $listaIdiomas;
            $listaIdiomas = array_keys($listaIdiomas);
            $string = '<select name="idioma">';
            foreach($listaIdiomas as $idioma){
                $string.="<option value=$idioma>$idioma</option>";
            }
            return $string.= '</select>';
        }
        $select = crearSelect();
        if(!isset($_COOKIE['color']) || !isset($_COOKIE['idioma']) || !isset($_COOKIE['colorFondo']) || !isset($_COOKIE['colorFuente'])){
            if(!isset($_POST['verForm'])){
                echo <<<FORM
                <div class="container">
                    <form method="post" action="">
                        Color de la fuente: <input type="color" name="fontColor"/>
                        Idioma: $select
                        Color de fondo: <input type="color" name="colorFondo"/>
                        <input type="submit" name="verForm" value="Ver formulario"/>
                    </form>
                </div>
                FORM;
            } else{
                setcookie('colorFondo',$_POST['colorFondo'],  time() + (10 * 365 * 24 * 60 * 60));
                setcookie('fontColor',$_POST['fontColor'],  time() + (10 * 365 * 24 * 60 * 60));
                setcookie('idioma',$_POST['idioma'],  time() + (10 * 365 * 24 * 60 * 60));
                header('Location: verFormulario.php');
            }
        } else{
            header('Location: verFormulario.php');
        }
    ?>
</body>
</html>