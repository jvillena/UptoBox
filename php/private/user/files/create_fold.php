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
	if($oFile->setFolderTree($datos_usuario['id_usuario'], $_POST)){
			$resultado[0]="Yuhuu! Se ha creado correctamente";
		 	$resultado[1]=2;
			
	}else{
			$resultado[0]="Ups! No se puede crear esa carpeta con ese nombre. Ya existe una igual!!";
		 	$resultado[1]=1;
	}
	
	echo json_encode($resultado);
?>
