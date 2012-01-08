<?php 
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../../../config/config.php');
	require($config_urls['BASE_PATH'].'/class/file.class.php');	
	require($config_urls['BASE_PATH'].'/php/private/user/security.php');	
	
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	
	$resultado=array();
	if($id_file = $oFile->setFolderTree($datos_usuario['id_usuario'], $_POST)){
			$resultado[0]="Yuhuu! Se ha creado correctamente";
		 	$resultado[1]=2;
			
			//Cargamos los ficheros y resultados de carpetas del directorio
			//Nos traemos los ficheros y carpetas del directorio root
			$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], $_POST['id_padre']);
			$oSmarty->assign('aFile',$aFile);
			$oSmarty->assign('id_usuario',$datos_usuario['id_usuario']);
			// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
			$oSmarty->template_dir = $config_urls['APP_TEMPLATES_DIR']."private/user";
			$result = $oSmarty->fetch('files/row_file.tpl');
			$resultado[2] = $result;
			
	}else{
			$resultado[0]="Ups! No se puede crear esa carpeta con ese nombre. Ya existe una igual!!";
		 	$resultado[1]=1;
	}
	
	echo json_encode($resultado);
?>
