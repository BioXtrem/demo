<?php
	
	class ConexionSqlite{

		private $manejador;

		function __construct() {
			$this->manejador = new PDO('sqlite:res/bd/demo.sqlite');
			if (!$this->manejador) {
		        echo "Connection to database failed!\n";
		    }
		}

	    public function select($sql){
	    	$stmt = $this->manejador->prepare($sql);
	    	$stmt->execute();
	    	$resultado = $stmt->fetchAll();
	        return $resultado;
	    }

	}

    
?>