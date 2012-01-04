<?php 
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../../../config/config.php');
	require($config_urls['BASE_PATH'].'/class/user.class.php');
	require($config_urls['BASE_PATH'].'/class/file.class.php');	
	require($config_urls['BASE_PATH'].'/php/private/user/security.php');	
	
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	$datos = $oUser->getDatosUsuario($datos_usuario['id_usuario']);
	$oSmarty->assign('nombre_usuario',$datos['nombre']." ".$datos['apellidos']);
	$oSmarty->assign('id_usuario',$datos['id_usuario']);
	$oSmarty->assign('foto',$datos['ruta_foto']);
	
	$metatitle = "uptobox.net";
	$metadescription = "uptobox.net";
	$oSmarty->assign('metatitle',$metatitle);
	$oSmarty->assign('metadescription',$metadescription);
	// Marcamos documentos como opción principal
	$oSmarty->assign('menu_principal','files');
	$oSmarty->assign('contenido_central','inicio');
	
	//Nos traemos los ficheros y carpetas del directorio root
	$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], 0);
	$oSmarty->assign('aFile',$aFile);	
	$oSmarty->assign('id_padre',0);
	
	// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
	$oSmarty->template_dir = $config_urls['APP_TEMPLATES_DIR']."private/user";

	
	//Asignamos las plantillas que vamos a utilizar
	
	$oSmarty->assign('LATERAL_DERECHO',$oSmarty->fetch('right_side.tpl'));
	$oSmarty->assign('CONTENIDO_CENTRAL',$oSmarty->fetch('center_content.tpl'));
	
	
	require($config_urls['BASE_PATH'].'/php/public/load_layout.php')

?>