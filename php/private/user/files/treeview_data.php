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
	
	$resultado = "";
	//Comprobamos el directorio en el que estamos sino nos metemos en el directorio root
	if (isset($_GET['id_root']) && $_GET['id_root']==0){
		$aFile = $oFile->getFoldersTree($datos_usuario['id_usuario'], $_GET['id_root']);
		
		//Creamos la estructura para devolver el Árbol de directorio
		if ($aFile != ""){
			$label_root = Localizer::getTranslate('tx_root_tree');
			$resultado = '[';
			$resultado .= '{"title":"'.$label_root.'", "isFolder": "true", "isLazy": "true", "expand": "true", "key": "0", "children": [ ';
			foreach($aFile as $key=>$value){
				$title =  $aFile[$key]['nombre'];
				$id_folder = $aFile[$key]['id_archivo'];
				$resultado .= '{"title":"'.$title.'", "isFolder": "true", "isLazy": "true", "expand": "true", "key": "'.$id_folder.'"}';
				if ($key != (count($aFile) - 1)){
					$resultado .= ",";
				}
			}
			$resultado .= ' ]}]';
		}
		 		
	}else{
		//Nos traemos los ficheros y carpetas del directorio root
		$aFile = $oFile->getFoldersTree($datos_usuario['id_usuario'], $_GET['id_root']);
		//Creamos la estructura para devolver el Árbol de directorio
		if ($aFile != ""){
			$resultado = '[';
			foreach($aFile as $key=>$value){
				$title =  $aFile[$key]['nombre'];
				$id_folder = $aFile[$key]['id_archivo'];
				$resultado .= '{"title":"'.$title.'", "isFolder": "true", "isLazy": "true", "expand": "true", "key": "'.$id_folder.'"}';
				if ($key != (count($aFile) - 1)){
					$resultado .= ",";
				}
			}
			$resultado .= ' ]';
		}
	}
	
			
	echo $resultado;
	

?>