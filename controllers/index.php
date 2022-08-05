 <?php

	if ( isset($_POST['opcn']) ) {

		
		if ($_POST['opcn'] == 'tabla') {

			include_once('../models/index.php');
			$Datos_Class = new Datos();
			$datos = $Datos_Class->consultaDatos();

			echo json_encode($datos);

		}

		if ($_POST['opcn'] == 'nuevo') {

			include_once('../models/index.php');
			$p = $_POST;
			$Datos_Class = new Datos();
			$datos = $Datos_Class->crearDatos($p);

			if( $datos > 0 ){
                $resp = [ "error" => false ];
            }else if ($datos == -1) {
            		$resp = [ "error" => true, "msj" => "Correo duplicado" ];
            } else {
                $resp = [ "error" => true, "msj" => "" ];
            }

			echo json_encode($resp);

		}

		if ($_POST['opcn'] == 'editar') {

			include_once('../models/index.php');
			$p = $_POST;
			$Datos_Class = new Datos();
			$datos = $Datos_Class->editarDatos($p);
			
			if( $datos > 0 ){
                $resp = [
                    "error" => false ];
            }else if ($datos == -1) {
            		$resp = [ "error" => true, "msj" => "Correo duplicado" ];
            } else {
                $resp = [ "error" => true, "msj" => "" ];
            }

			echo json_encode($resp);

		}

		if ($_POST['opcn'] == 'eliminar') {

			include_once('../models/index.php');
			$p = $_POST;
			$Datos_Class = new Datos();
			$datos = $Datos_Class->eliminarDatos($p);
			if( $datos > 0 ){
                $resp = [
                    "error" => false ];
            }else{
                $resp = [
                    "error" => true ];
            }

			echo json_encode($resp);

		}

		if ($_POST['opcn'] == 'select') {

			include_once('../models/index.php');
			$Datos_Class = new Datos();
			$datos = $Datos_Class->consultaSelectEmpleados();

			echo json_encode($datos);

		}
		
	} 


?>