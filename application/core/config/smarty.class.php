<?php 
	/* 
		IMPORTANTE:
		Se supone que previamente a la inclusión de este script se ha realizado la inclusión del script de 'config.php' que está en el directorio configuracion.
	*/
	require($config_urls['BASE_PATH'].'smarty/libs/Smarty.class.php');		
	$oSmarty = new Smarty;
	// Definimos el directorio de plantillas.
	$oSmarty->setTemplateDir(APP_TEMPLATES_DIR.'www/templates');
	// Definimos los directorios de compilación y de cahé.
	$oSmarty->setCompileDir(APP_ROOT.'smarty/templates_c');
	$oSmarty->setCacheDir(APP_ROOT.'smarty/cache');
	// Establecemos los parámetros necesarios.
	$oSmarty->allow_php_templates= true;
	$oSmarty->force_compile = true;
	//$oSmarty->force_compile = false;
	$oSmarty->caching = false;
	//$oSmarty->caching = true;
	$oSmarty->cache_lifetime = 100;
	$oSmarty->debugging = DEBUG_SMARTY;
	
	
	//Registramos el plugin de idiomas en smarty
	$oSmarty->registerPlugin('block', 'translate', array('Localizer', 'translate'), true);
    
    $oSmarty->assign('ID_ROL_ADMINISTRADOR', ID_ROL_ADMINISTRADOR);
    $oSmarty->assign('ID_ROL_USUARIO', ID_ROL_USUARIO); 
    
    
    
    if( empty( $_SERVER['HTTP_REFERER'])) {
        $_SERVER['HTTP_REFERER'] = getenv('HTTP_REFERER');
    }   
    
        
    
        
	
?>