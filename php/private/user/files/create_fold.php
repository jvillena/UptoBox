<?php 
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../../../config/config.php');
	require(BASE_PATH.'/class/file.class.php');	
	require(BASE_PATH.'/php/private/user/security.php');	
	
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	
	$errores=$oFile->modificar($datos_usuario['id_usuario'], $_POST);
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
