<?php

if(!$oSesion->ComprobarSesion()){
	
	Error::redirectUsuarioNoRegistrado();
}
else{
	
	$aDatosSesionUsuario=$oSesion->getSesion('datos_usuario');
	
	if(isset($aDatosSesionUsuario) && array_key_exists('id_rol',$aDatosSesionUsuario)){
		if($aDatosSesionUsuario['id_rol']==ID_ROL_USUARIO ){
			//¡¡¡OK!!!
		}
		else{
			
			//No tiene permisos para ver este script
			Error::redirectIndex();
		}
	}
	else{
		Error::redirectIndex();
	}
}


?>