<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNI</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    <div class="container">


        <?php
			if(isset($_GET["dni"]) && is_numeric($_GET["dni"])){
				$dni=$_GET["dni"];
				$letras=['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
				$index=(int) $dni%(23);
				$letra=$letras[$index];
				
				echo "<h1>Tu dni es $dni $letra</h2>";

			} else {
				echo <<< FORMULARIO
				<h1>Introduzca su DNI:</h1>
				<form method="get" action="index.php">
					<input type="text" name="dni">
				</form>
				FORMULARIO;
			}
		?>


    </div>
</body>

</html>