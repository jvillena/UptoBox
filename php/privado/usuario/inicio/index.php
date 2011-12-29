<?php 
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../../../configuracion/configuracion.php');
	require(BASE_PATH.'/clases/usuario.class.php');	
	require(BASE_PATH.'/php/privado/usuario/seguridad.php');	
	
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	$datos = $oUsuario->getDatosUsuario($datos_usuario['id_usuario']);
	$oSmarty->assign('nombre_usuario',$datos['nombre']." ".$datos['apellidos']);
	$oSmarty->assign('id_usuario',$datos['id_usuario']);
	$oSmarty->assign('foto',$datos['ruta_foto']);
	
	$metatitle = "uptobox.net";
	$metadescription = "uptobox.net";
	$oSmarty->assign('metatitle',$metatitle);
	$oSmarty->assign('metadescription',$metadescription);
	
	// Marcamos documentos como opción principal
	$oSmarty->assign('menu_principal','documentos');
	$oSmarty->assign('contenido_central','inicio');
	
	// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
	$oSmarty->template_dir = DIRECTORIO_PLANTILLAS."privado/usuario";

	
	//Asignamos las plantillas que vamos a utilizar
	
	$oSmarty->assign('LATERAL_DERECHO',$oSmarty->fetch('lateral_dcha.tpl'));
	$oSmarty->assign('CONTENIDO_CENTRAL',$oSmarty->fetch('contenido_central.tpl'));
	
	
	require(BASE_PATH.'/php/publico/cargar_layout.php')

?>