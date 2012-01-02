<?php
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../config/config.php');

	// Abrimos la sesión.
 	$oSesion->aperturaSesion();
	
	// Cerramos la sesión.
	$oSesion->cierreSesion();

	// Redireccionamos a la página de inicio.
	header('Location: '.$config_urls['BASE_URL']);
	exit;
?>