<!Doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Pagina demo">
	<link rel="icon" href="../favicon.ico">
	<title>Demo | Administrar | Editar</title>
	<link rel="stylesheet" href="../res/css/materialize.min.css">
</head>
<body>

	<?php 
		require ('administrador.php');
		$manejador= new ConexionSqlite();  
    ?>

    <?php
	    $texto=$manejador->select("select * from principal;");
	    //Manejo ejemplo de la informacion de la bd
	    foreach ($texto as $row) {

	    	echo "<div class='row'>
					<form class='col s12' action='administrador.php' method = 'post' enctype='multipart/form-data'>
						<div class='row'>
				        	<div class='input-field col s6'>
				          		<input id='titulo' name='titulo' type='text' class='validate' value='".$row['Titulo']."'>
				          		<label for='titulo'>Titulo</label>
				        	</div>
				        	<div class='input-field col s6'>
				        		<div class='file-field input-field'>
									<div class='btn'>
										<span>File</span>
										<input id='archivo' name='archivo' type='file' accept='image/*'>
									</div>
									<div class='file-path-wrapper'>
										<input class='file-path validate' type='text'>
									</div>
							    </div>
				        	</div>
				      	</div>
				      	<div class='row'>
				      		<div class='input-field col s12'>
								<textarea id='descripcion' name='descripcion' class='materialize-textarea' required>".$row['Descripcion']."</textarea>
								<label for='descripcion'>Descripcion</label>
					        </div>
				      	</div>
				      	<input type='hidden' name='opcionAdministrador' id='opcionAdministrador' value='1'/>
				      	<input type='hidden' name='id' id='id' value='".$row['Id_Principal']."'/>
				      	<button name='btn_accion' value='1' type='submit' class='waves-effect waves-light btn'>Editar</button>
				      	<button name='btn_accion' value='2' type='submit' class='waves-effect waves-light btn'>Eliminar</button>
					</form>
				</div>";
	    }
  	?>

	<script src="../res/js/materialize.min.js"></script>
</body>
</html>