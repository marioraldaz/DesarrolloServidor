<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function exception_handler(Throwable $exception) {
          echo "Uncaught exception: " , $exception->getMessage(), "\n";
        }
        
        set_exception_handler('exception_handler');
        
        throw new Exception('Uncaught Exception');

    ?>
</body>
</html>