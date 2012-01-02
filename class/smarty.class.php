<?php 
	/* 
		IMPORTANTE:
		Se supone que previamente a la inclusión de este script se ha realizado la inclusión del script de 'configuracion.php' que está en el directorio configuracion.
	*/
		
	require(BASE_PATH.'smarty/libs/Smarty.class.php');		
	
	$oSmarty = new Smarty;
	// Definimos el directorio de plantillas.
	$oSmarty->template_dir = APP_TEMPLATES_DIR;
	// Definimos los directorios de compilación y de cahé.
	$oSmarty->compile_dir = APP_ROOT.'smarty/templates_c';
	$oSmarty->cache_dir = APP_ROOT.'smarty/cache';
	
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
	
		
	$oSesion->inicioSesion();
	
	$logueado=$oSesion->comprobarSesion();
	
	$oSmarty->assign('LOGUEADO',$logueado);
	
	if(!$logueado){
	
		$oSesion->cierreSesion();
		$oSmarty->assign('usuario_sesion','');
	}
	else{
		
		$aDatosSesionUsuario = $oSesion->getSesion('datos_usuario');
		$oSmarty->assign('datos_sesion',$aDatosSesionUsuario);
	}
		
	
	
	
	
	
	
	
?>