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
	
	$name_parent_folder = Localizer::getTranslate('tx_sub_file');
	$request  = str_replace("/uptobox/user/path/", "", $_SERVER['REQUEST_URI']);
	$params     = explode("/", $request);   
	$root = $params[0];
	if (isset($_GET['id_root'])){
		$root = $_GET['id_root'];
		
	}
	//if (count($aRoot)>0)
	///	$root= $aRoot[count($aRoot)-1];
	
	//Comprobamos el directorio en el que estamos sino nos metemos en el directorio root
	if (isset($root) && $root!=0){
		$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'],$root);
		$oSmarty->assign('aFile',$aFile);	
		$id_padre = $root;
		$name_folder = $oFile->getNameFolder($id_padre,0);
		//Return name of parent folder
		$name_parent_folder = $oFile->getParentNameFolder($id_padre);
		if ($name_parent_folder==""){
			$name_parent_folder = Localizer::getTranslate('tx_sub_file');
		}
			$oSesion->setSesion('id_root',$root);
		
	}else{
		//Nos traemos los ficheros y carpetas del directorio root
		$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], 0);
		$oSmarty->assign('aFile',$aFile);	
		$id_padre = 0;
		$name_folder = Localizer::getTranslate('tx_sub_file');
		$name_parent_folder = Localizer::getTranslate('tx_sub_file');
		$oSesion->setSesion('id_root',0);
	}
	$oSmarty->assign('id_padre',$id_padre);

	//Obtenemos el nombre de la carpeta actual
	
	$oSmarty->assign('name_parent_folder',$name_parent_folder);
	
	//Ultimas actualizaciones de ficheros y carpetas
	$aRecentFile = $oFile->getRecentUpdates($datos_usuario['id_usuario']);
	$oSmarty->assign('aRecentFile',$aRecentFile);	
	
	
	
	
	$resultado=array();
	// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
	$oSmarty->template_dir = $config_urls['APP_TEMPLATES_DIR']."private/user";
    $result = $oSmarty->fetch('files/row_success.tpl');
	$result .= $oSmarty->fetch('files/row_file.tpl');
	$resultado[0] = $result;
	$resultado[1] = $id_padre;
	
	//Calculamos la ruta desde el raiz
	$label_root = Localizer::getTranslate('tx_sub_file');
	if ($id_padre == 0){
		$resultado[2] = '<img src="'.BASE_URL.'images/icons/icon_tree.png"/><a href="#" id="tree_collapse" onclick="$(\'#tree\').toggle();" style="color:#3376A4;background: none;">'.$label_root. '</a> <span style="color:#3376A4"> ></span> ';
	}else{
		$aPath = $oFile->getFilePath($id_padre);
		$archivo = "'".$aPath['id_archivo']."'";
		$nombre= "'".$aPath['nombre']."'";
		$url = "'".BASE_URL."user/path/".$aPath['id_archivo']."/".$aPath['nombre']."'";
		$header_path = '<img src="'.BASE_URL.'images/icons/icon_tree.png"/><a href="#" id="tree_collapse" onclick="$(\'#tree\').toggle();" style="color:#3376A4;background: none;">'.$label_root. '</a> <span style="color:#3376A4"> ></span> ';
		$last_fold = '<a class="link_blue" style="color:#3376A4;background: none;" href="#" onclick="loadPath('.$archivo.','.$nombre.' ,'.$url.');" >'.$aPath['nombre'].'</a>'; 
		while ($aPath['id_archivo_padre']!=0){
			$aPath = $oFile->getFilePath($aPath['id_archivo_padre']);
			$archivo = "'".$aPath['id_archivo']."'";
			$nombre= "'".$aPath['nombre']."'";
			$url = "'".BASE_URL."user/path/".$aPath['id_archivo']."/".$aPath['nombre']."'";
			
			$root_path = '<a style="color:#3376A4;background: none;" href="#" onclick="loadPath('.$archivo.','.$nombre.' ,'.$url.');" >'.$aPath['nombre'].'</a> <span style="color:#3376A4"> ></span> '.$root_path;		 
		}
		 $resultado[2] = $header_path.$root_path.$last_fold;
	}
	//name of file or folder
	$resultado[3] =  $name_folder;

	echo json_encode($resultado);
	

?>