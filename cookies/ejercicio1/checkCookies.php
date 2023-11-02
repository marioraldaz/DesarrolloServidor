1 <?php
    if(!isset($_COOKIE['Comprobar'])){
        setcookie('Comprobar',1,time()+3600);
        header('Refresh: 5; url=http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']); 
        //Al redirigir recarga la pagina y por defecto los navegadores tienen activadas las cookies 
        //(en teoria debes avisar de que se estan usando tus cookies, pero por estan activadas siempre si no lo cambias en la config del navegador)
        echo 'Comprobando si tiene activadas las cookies<br/>';
        echo 'Esta comprobaci&oacute; se reptir&aacute; cada 5 segundos';
    }else{
        echo 'Gracias por activar las cookies';
    }
?>
