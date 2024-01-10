<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        var_dump($_POST['captcha']);
        var_dump($_POST['respuestaUser']);

        if($_POST['captcha']==$_POST['respuestaUser']){
            echo "<h1>No eres un robot</h1>";
        } else{
            echo "<h1>captcha incorrecto</h1>";
        }

    ?>
</body>
</html>