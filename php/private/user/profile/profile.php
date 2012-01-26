<?php 
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../../../config/config.php');
	require($config_urls['BASE_PATH'].'class/user.class.php');
	require($config_urls['BASE_PATH'].'class/profile.class.php');
	require($config_urls['BASE_PATH'].'class/file.class.php');	
	require($config_urls['BASE_PATH'].'php/private/user/security.php');	
//echo date_default_timezone_get() . ' => ' . date('e') . ' => ' . date('T');
//die("");
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	$datos = $oUser->getDatosUsuario($datos_usuario['id_usuario']);
	$oSmarty->assign('nombre_usuario',$datos['nombre']." ".$datos['apellidos']);
	$oSmarty->assign('id_usuario',$datos['id_usuario']);
	$oSmarty->assign('foto',$datos['ruta_foto']);
	
	$datos_perfil = $oProfile->get($datos_usuario['id_usuario']);
	$oSmarty->assign('datos_perfil',$datos_perfil);
	//Comprobamos capacidad de almacenamiento máximo para el usuario
	$datos_usuario_configuracion = $oUser->getSettingParams($datos_usuario['id_usuario']);
	$oSmarty->assign('datos_usuario_configuracion',$datos_usuario_configuracion);
	//Calculamos el tamaño actual usado por el usuario
	$actual_size = $oFile->getActualSizeUser($datos_usuario['id_usuario']);
	$actual_size = Settings::getByteSize($actual_size);
	$oSmarty->assign('actual_size',$actual_size);
	//Calculamos el tamaño máximo en MB
	$max_size = Settings::getByteSize($datos_usuario_configuracion['max_size']);
	$oSmarty->assign('max_size',$max_size);
	
	//Ultimas actualizaciones de ficheros y carpetas
	$aRecentFile = $oFile->getRecentUpdates($datos_usuario['id_usuario']);
	$oSmarty->assign('aRecentFile',$aRecentFile);	
	
	$metatitle = "UptoSave.com";
	$metadescription = "UptoSave.com";
	$oSmarty->assign('metatitle',$metatitle);
	$oSmarty->assign('metadescription',$metadescription);
	
	// Marcamos documentos como opción principal
	$oSmarty->assign('menu_principal','myaccount');
	$oSmarty->assign('contenido_central','profile');
	
	
	// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
	$oSmarty->template_dir = $config_urls['APP_TEMPLATES_DIR']."private/user";

	
	//Asignamos las plantillas que vamos a utilizar
	
	$oSmarty->assign('LATERAL_DERECHO',$oSmarty->fetch('right_side.tpl'));
	$oSmarty->assign('CONTENIDO_CENTRAL',$oSmarty->fetch('center_content.tpl'));
	
	
	require($config_urls['BASE_PATH'].'php/private/load_layout.php')

?>