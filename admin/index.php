<!Doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Pagina demo">
	<link rel="icon" href="../favicon.ico">
	<title>Demo | Página principal</title>
	<link rel="stylesheet" href="../res/css/materialize.min.css">
</head>
<body>
	<div class="row">
	<form class="col s12" action="administrador.php" method = "post" enctype="multipart/form-data">
		<div class="row">
        	<div class="input-field col s6">
          		<input id="titulo" name="titulo" type="text" class="validate">
          		<label for="titulo">Titulo</label>
        	</div>
        	<div class="input-field col s6">
        		<div class="file-field input-field">
					<div class="btn">
						<span>File</span>
						<input id="archivo" name="archivo" type="file" accept="image/*" required="">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
			    </div>
        	</div>
      	</div>
      	<div class="row">
      		<div class="input-field col s12">
				<textarea id="descripcion" name="descripcion" class="materialize-textarea" required></textarea>
				<label for="descripcion">Descripcion</label>
	        </div>
      	</div>
      	<input type="hidden" name="opcionAdministrador" id="opcionAdministrador" value="0"/>
      	<button type="submit" class="waves-effect waves-light btn">Guardar</button>
	</form>
	</div>

	<script src="../res/js/materialize.min.js"></script>
</body>
</html>