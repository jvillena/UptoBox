<?php 
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../../../config/config.php');
	require(BASE_PATH.'/class/profile.class.php');	
	require(BASE_PATH.'/php/private/user/security.php');	
	
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	if (isset($_GET['action']) && ($_GET['action'] == 'profile')){
		$errores=$oProfile->editProfile($datos_usuario['id_usuario'], $_POST);	
	}else if (isset($_GET['action']) && ($_GET['action'] == 'general')){
		$errores=$oProfile->editProfileGeneral($datos_usuario['id_usuario'], $_POST);
		//Obtenemos el nombre del idioma del usuario
		$datos_perfil = $oProfile->get($datos_usuario['id_usuario']);
		$language_user = Combos::getIdioma($datos_perfil[0]['id_idioma']);	
		Settings::setSettingsVars('DEFAULT_LANG',$language_user['codigo']);
		$oSesion->setSesion('id_idioma',$datos_perfil[0]['id_idioma']);
		$oSesion->setSesion('codigo_idioma',$language_user['codigo']);
		
		//Obtenemos el nombre de la zona horaria
		$oSesion->setSesion('id_zone',$_POST['timezone']);
		
		
		
	}
	
	$resultado=array();
	$aErrores=array();
	if(is_array($errores)){
		if(count($errores)){
			$aErrores="<ul class='error'>";
			foreach($errores as $key=>$value){
				$aErrores.='<li>'.$value.'</li>';
				
			}
			$aErrores.="</ul>";
		}
		
	}
	else{
		
		if($errores=='ok'){
			$resultado[0]="Yuhuu! Se ha modificado correctamente el perfil";
		 	$resultado[1]=2;
			
		}
		else{
			$resultado[0]="Ups! No se ha podido modificar los datos. Inténtelo mas tarde.";
			$resultado[0].=$aErrores;
		 	$resultado[1]=1;
		}
	
	}
	
	echo json_encode($resultado);
?>
