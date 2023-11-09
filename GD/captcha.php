<?php

function generateImage(){
    ob_start();
    $imagenCreada = imagecreatefromjpeg("./fondo.jpeg");
    $negro = imagecolorallocate($imagenCreada, 0x00, 0x00, 0x00);        
    $char='';
    $captcha="";
    for($i=0;$i<4;$i++){
        $char = mb_chr(rand(65,90));
        $captcha.= $char;
        imagefttext($imagenCreada, 25, rand(1,10), $i*35, 55, $negro, "OpenSans-Regular.ttf", $char);
    }
    imagepng($imagenCreada);
    $imagen=ob_get_contents();
    ob_end_clean();
    $cadena=base64_encode($imagen);
    $cadenaCompleta='data:image/png;base64,'.$cadena;
    return ["imagen"=>$cadenaCompleta, "palabra"=>$captcha];
    }
?>
