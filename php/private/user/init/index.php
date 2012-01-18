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
	
	$metatitle = "uptobox.net";
	$metadescription = "uptobox.net";
	$oSmarty->assign('metatitle',$metatitle);
	$oSmarty->assign('metadescription',$metadescription);
	// Marcamos documentos como opción principal
	$oSmarty->assign('menu_principal','files');
	$oSmarty->assign('contenido_central','inicio');
	
	//Nombre de la carpeta padre por defecto la carpeta raiz
	$name_parent_folder = Localizer::getTranslate('tx_sub_file');
	
	//Comprobamos el directorio en el que estamos sino nos metemos en el directorio root
	if (isset($_GET['id_root']) && $_GET['id_root']!=0){
		$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], $_GET['id_root']);
		$oSmarty->assign('aFile',$aFile);	
		$oSmarty->assign('id_padre',$_GET['id_root']);
		
		//Return name of parent folder
		$name_parent_folder = $oFile->getParentNameFolder($id_padre);
		if ($name_parent_folder==""){
			$name_parent_folder = Localizer::getTranslate('tx_sub_file');
		}
		
	}else{
		//Nos traemos los ficheros y carpetas del directorio root
		$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], 0);
		$oSmarty->assign('aFile',$aFile);	
		$oSmarty->assign('id_padre',0);
		
		$name_parent_folder = Localizer::getTranslate('tx_sub_file');
	}
	
	//Asignamos el nombre de la carpeta padre
	$oSmarty->assign('name_parent_folder',$name_parent_folder);
	
	//Ultimas actualizaciones de ficheros y carpetas
	$aRecentFile = $oFile->getRecentUpdates($datos_usuario['id_usuario']);
	$oSmarty->assign('aRecentFile',$aRecentFile);	
	
	// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
	$oSmarty->template_dir = $config_urls['APP_TEMPLATES_DIR']."private/user";

	//Cargamos las variables de las etiquetas dinámicas de texto
	$oSmarty->assign('tx_titulo_display',Localizer::getTranslate('tx_options_display_folder'));
	$oSmarty->assign('tx_titulo_treeview',Localizer::getTranslate('tx_root_tree'));
	
	
	//Asignamos las plantillas que vamos a utilizar
	
	$oSmarty->assign('LATERAL_DERECHO',$oSmarty->fetch('right_side.tpl'));
	$oSmarty->assign('CONTENIDO_CENTRAL',$oSmarty->fetch('center_content.tpl'));
	
	
	require($config_urls['BASE_PATH'].'/php/public/load_layout.php')

?>