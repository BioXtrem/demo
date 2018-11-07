<?php

	$administrador = new ConexionSqlite();
	if (isset($_POST['opcionAdministrador'])){
		switch ($_POST['opcionAdministrador']) {
			case 0: $administrador->agregarInformacion();
					break;
			case 1: $administrador->editarInformacion();
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

	    public function select($sql){
	    	$stmt = $this->manejador->prepare($sql);
	    	$stmt->execute();
	    	$resultado = $stmt->fetchAll();
	        return $resultado;
	    }

		public function agregarInformacion(){
	    	$archivo = (isset($_FILES['archivo'])) ? $_FILES['archivo'] : null;
	    	$imageName = $archivo['name'];
			if ($imageName != '') {
				$ruta_destino_archivo = "../res/img/{$archivo['name']}";
				$archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);
				$ruta_destino_archivo = "res/img/{$archivo['name']}";
				$imageName = $archivo['name'];
				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
				$this->query("insert into principal values(null,'$imageName','$titulo','$descripcion')");
				header('Location: agregar.php');
			}			
		}

		public function editarInformacion(){
			$id = $_POST['id'];
			if ($_POST['btn_accion'] == 1){				
				$titulo = $_POST['titulo'];
				$descripcion = $_POST['descripcion'];
		    	$archivo = (isset($_FILES['archivo'])) ? $_FILES['archivo'] : null;
		    	$imageName = $archivo['name'];
				if ($imageName != '') {
					$ruta_destino_archivo = "../res/img/{$archivo['name']}";
					$archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);
					$ruta_destino_archivo = "res/img/{$archivo['name']}";
					
					$this->query("update principal set Imagen = '$imageName', Titulo = '$titulo', Descripcion = '$descripcion' where Id_Principal=$id;)");
					
				}else{
					$this->query("update principal set Titulo = '$titulo', Descripcion = '$descripcion' where Id_Principal=$id;)");
				}
				
			}else{
				$this->query("delete from principal where Id_Principal=$id;)");
			}
			header('Location: editar.php');
		}
	}

?>