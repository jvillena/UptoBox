<?php
	require('../../../configuracion/configuracion.php');	
	require(BASE_PATH.'clases/usuario.class.php');
	require(BASE_PATH.'clases/notificacion.class.php');
	
	switch($_POST['action']) { 
	  case '1': 
	    logear_usuario(); 
	    break;    
	  default: 
	    // Acción por defecto. 
	    echo json_encode("-1");
	} 
	
	function logear_usuario() {
		global $oSesion, $oUsuario, $oError;

		// Abrimos la sesión.
			//Comprobamos el login
		if($oSesion->comprobarSesion()){
			$oError->redirectUsuario();
		}
	 	$resultado=array();
		
		// Comprobamos que el usuario se encuentra registrado en el sistema.
		 if($oUsuario->loguearUsuario($_POST['username'], $_POST['password'])== 1){
		 	if($oUsuario->administradorLogueado()){
				//echo $oError->redirectAdministrador();
				$resultado[0]="Yuhuuu! Bienvenido a UptoBox.net";
		 		$resultado[1]=2;
			}else{
				//echo $oError->redirectUsuario();
				$resultado[0]="Yuhuuu! Bienvenido a UptoBox.net";
				$resultado[1]=3;
			}
		 }else{
		 	$resultado[0]="Usuario o contraseña no válidos.";
		 	$resultado[1]=1;
		 }
		 	// Utilizamos json para poder pasar objectos.
		echo json_encode($resultado);
	}
?>