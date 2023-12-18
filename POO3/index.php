<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <h1> Elija la figura: </h1>
    <form method="post" action="mostrarFigura.php">
        <input type="radio" name="figura" value="triangulo">triangulo
        <input type="radio" name="figura" value="Cuadrado">Cuadrado
        <input type="radio" name="figura" value="Rectangulo">Rectangulo
        <input type="radio" name="figura" value="Circulo">Circulo
        Tamaño en cm: <input type="number" name="tamaño">
        <input type="submit" name="submit" value="Mostrar Figura">
    </form>
</body>

</html>