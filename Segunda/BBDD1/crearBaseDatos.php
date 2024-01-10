<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        try {
            // Configuración de la conexión a la base de datos
            $dsn = 'mysql:host=localhost;dbname=books';
            $usuario = 'root';
            $contrasena = '';
        
            // Crear una instancia de la clase PDO
            $conexion = new PDO($dsn, $usuario, $contrasena);
        
            // Configurar el modo de error para mostrar excepciones
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // Ruta del archivo SQL
            $archivoSQL = './books.sql';
        
            // Leer el contenido del archivo SQL
            $sql = file_get_contents($archivoSQL);
        
            // Ejecutar las consultas SQL
            $conexion->exec($sql);
        
            echo "Archivo SQL ejecutado correctamente";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        
</body>
</html>