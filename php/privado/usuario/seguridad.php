<?php

if(!$oSesion->ComprobarSesion()){
	
	$oError->redirectUsuarioNoRegistrado();
}
else{
	
	$aDatosSesionUsuario=$oSesion->getSesion('datos_usuario');
	
	if(isset($aDatosSesionUsuario) && array_key_exists('id_rol',$aDatosSesionUsuario)){
		if($aDatosSesionUsuario['id_rol']==ID_ROL_USUARIO ){
			//¡¡¡OK!!!
		}
		else{
			
			//No tiene permisos para ver este script
			$oError->redirectIndex();
		}
	}
	else{
		$oError->redirectIndex();
	}
}


?>