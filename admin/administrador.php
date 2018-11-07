<?php

	$administrador = new ConexionSqlite();
	if (isset($_POST['opcionAdministrador'])){
		switch ($_POST['opcionAdministrador']) {
			case 0: $administrador->agregarInformacion();
					break;
		}
	}


	class ConexionSqlite{
		
		private $manejador;

		function __construct(){
			$this->manejador = new PDO('sqlite:../res/bd/demo.sqlite');
		}

		private function query($sql) {
	        $stmt = $this->manejador->prepare($sql);
	        $res = $stmt->execute();
	    }

		public function agregarInformacion(){
			$imageName = NULL;
	    	$archivo = (isset($_FILES['archivo'])) ? $_FILES['archivo'] : null;
			if ($archivo) {
				$ruta_destino_archivo = "../res/img/{$archivo['name']}";
				$archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);
				$ruta_destino_archivo = "res/img/{$archivo['name']}";
				$imageName = $archivo['name'];
				echo $imageName;
				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
				$this->query("insert into principal values(null,'$imageName','$titulo','$descripcion')");
				header('Location: index.php');
			}			
		}
	}

?>