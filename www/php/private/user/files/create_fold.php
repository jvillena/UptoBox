<?php 
	// Page code
	header ('Content-type: text/html; charset=utf-8');
	
	
	require('../../../../../application/core/config/config.php');
	require($config_urls['BASE_PATH'].'class/file.class.php');	
	require($config_urls['BASE_PATH'].'www/php/private/user/security.php');	
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	$resultado=array();
	if($id_file = $oFile->setFolderTree($datos_usuario['id_usuario'], $datos_usuario['id_root'] ,$_POST)){
			$resultado[0]="Yuhuu! Se ha creado correctamente";
		 	$resultado[1]=2;
			//Cargamos los ficheros y resultados de carpetas del directorio
			//Nos traemos los ficheros y carpetas del directorio root
			$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], $datos_usuario['id_root']);
			$oSmarty->assign('aFile',$aFile);
			$oSmarty->assign('id_usuario',$datos_usuario['id_usuario']);
			// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
			// Assign template for index file
            $oSmarty->setTemplateDir(APP_ROOT.'www/templates/private/user');
			$result = $oSmarty->fetch('files/row_file.tpl');
			$resultado[2] = $result;
			
	}else{
			$resultado[0]="Ups! No se puede crear esa carpeta con ese nombre. Ya existe una igual!!";
		 	$resultado[1]=1;
	}
	
	echo json_encode($resultado);
?>
