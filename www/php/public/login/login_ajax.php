<?php
    require_once(dirname( __FILE__ ).'/../../../../application/core/config/config.php');
	require($config_urls['BASE_PATH'].'class/user.class.php');
	require($config_urls['BASE_PATH'].'class/notification.class.php');
	
	switch($_POST['action']) { 
	  case '1': 
	    logear_usuario(); 
	    break;    
	  default: 
	    // Acción por defecto. 
	    echo json_encode("-1");
	} 
	
	function logear_usuario() {
		global $oSesion, $oUser, $oError;

		// Abrimos la sesión.
			//Comprobamos el login
		if($oSesion->comprobarSesion()){
			$oError->redirectUsuario();
		}
	 	$resultado=array();
		
		// Comprobamos que el usuario se encuentra registrado en el sistema.
		 if($oUser->loguearUsuario($_POST['username'], $_POST['password'])== 1){
		 	if($oUser->administradorLogueado()){
				//echo $oError->redirectAdministrador();
				$resultado[0]="Yuhuuu! Bienvenido a UptoSave.com";
		 		$resultado[1]=2;
			}else{
				//echo $oError->redirectUsuario();
				$resultado[0]="Yuhuuu! Bienvenido a UptoSave.com";
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