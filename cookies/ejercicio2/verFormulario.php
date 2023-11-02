<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    echo " <div class='container' style=background-color:$_COOKIE[color] color:$_COOKIE[fontColor]> <form method='POST' action=''>";
    switch($_COOKIE['idioma']){
        case 'español':
            echo 'Usuario: <input type="text" name="usuario"/>';
            echo 'Contraseña: <input type="password" name="contraseña"/>';
            break;
        case 'ingles':
            echo 'User: <input type="text" name="usuario"/>';
            echo 'Password: <input type="password" name="contraseña"/>';
            break;
    }
    echo "</form>";
 
?>
</body>
</html>