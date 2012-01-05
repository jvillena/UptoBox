<?php 
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	require('../../../../config/config.php');
	require($config_urls['BASE_PATH'].'class/user.class.php');
	require($config_urls['BASE_PATH'].'class/profile.class.php');
	require($config_urls['BASE_PATH'].'class/combos.class.php');
	require($config_urls['BASE_PATH'].'class/file.class.php');	
	require($config_urls['BASE_PATH'].'php/private/user/security.php');		
	
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	$datos = $oUser->getDatosUsuario($datos_usuario['id_usuario']);
	$oSmarty->assign('nombre_usuario',$datos['nombre']." ".$datos['apellidos']);
	$oSmarty->assign('id_usuario',$datos['id_usuario']);
	$oSmarty->assign('foto',$datos['ruta_foto']);
	
	$datos_perfil = $oProfile->get($datos_usuario['id_usuario']);
	$oSmarty->assign('datos_perfil',$datos_perfil);
	
	// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
	$oSmarty->template_dir = $config_urls['APP_TEMPLATES_DIR']."private/user";

	
	//Asignamos las plantillas que vamos a utilizar
	
	$resultado = $oSmarty->fetch('profile/tab_general.tpl');
	
	
	echo json_encode($resultado);
?>
