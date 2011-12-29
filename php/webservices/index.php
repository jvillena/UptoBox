<?php 
	require_once ('../../configuracion/configuracion.php');
	require_once ('usuario.class.php');
	require_once ('sesion.class.php');	
	require_once ("RestServer.php");
	require_once ("WebServices.php");
	
	// Fichero inicial para inicializar los webservices.
	spl_autoload_register();

	// 'debug' or 'production'
	$mode = 'production';
	
	$server = new RestServer($mode);
	$server->refreshCache();
	$server->addClass('WebServices');
	$server->handle();
?>