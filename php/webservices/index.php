<?php 
	require_once ('../../config/config.php');
	require($config_urls['BASE_PATH'].'/class/user.class.php');
	require($config_urls['BASE_PATH'].'/class/file.class.php');	
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