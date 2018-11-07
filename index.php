<!Doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Pagina demo">
	<link rel="icon" href="favicon.ico">
	<title>Demo | Página principal</title>
	<link rel="stylesheet" href="res/css/materialize.min.css">
</head>
<body>
	<?php 
		require ('conexion.php');
		$manejador= new ConexionSqlite();  
    ?>

    <?php
	    $texto=$manejador->select("select * from principal;");
	    //Manejo ejemplo de la informacion de la bd
	    foreach ($texto as $row) {
	    	echo "<h1>".$row['Titulo']."</h1><br/>";
	    	echo $row['Descripcion']."<br/>";
	    	echo "<img src='res/img/".$row['Imagen']."'>";
	    }
  	?>

	<script src="res/js/materialize.min.js"></script>
</body>
</html>