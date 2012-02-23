<?php
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require_once(APP_PATH.'config.php');   

	// Open Sesion.
 	$oSesion->aperturaSesion();
	
	// Close Sesion.
	$oSesion->cierreSesion();

	// Redirect home page.
	header('Location: '.$config_urls['BASE_URL']);
	exit;
?>