<?php	 
	/*
	 * CONFIGURACIÓN GLOBAL.
	 */
	define('ID_ROL_ADMINISTRADOR', 1);
	define('ID_ROL_USUARIO', 2);
	
	// Email para el envío de las peticiones de contacto.
	define('EMAIL_ENVIO_PETICIONES_CONTACTO', 'info@uptobox.net');
	
	// Email para el envío de las peticiones de trabaja con nosotros.
	define('EMAIL_ENVIO_PETICIONES_TRABAJO', 'trabajo@uptobox.net');	
	
	# Define la ruta física del sitio
    define("APP_PHISICAL_PATH",$_SERVER['DOCUMENT_ROOT'] );//. "/"
    # Define la ruta base del sitio
    define("BASE_PATH", APP_PHISICAL_PATH . DIRECTORIO_SITIO."/");
	# El directorio donde se ubican las traducciones
    define("LOCALE", BASE_PATH . "locale/");
    
    # El idioma por defecto bajo el cual se deben llenar obligatoriamente todos los datos
    define("DEFAULT_LANG", "es");
    # Define el URL base
    define("BASE_URL","http://" . $_SERVER['HTTP_HOST']  . DIRECTORIO_SITIO. "/");
    
    # definimos los estilos, librerias y clases
    define("LIB_URL",BASE_PATH."librerias");
    define("CLASS_URL",BASE_PATH."clases");
    define("CONFIG_URL",BASE_PATH."configuracion");
    define("IMAGES_URL",BASE_URL."imagenes");
    define("DATOS_URL",BASE_URL."datos");
    
    define("DIRECTORIO_PLANTILLAS", BASE_PATH.'plantillas/');
	//////////////////////////////
	// TABLAS DE BASE DE DATOS. //
	//////////////////////////////
	
	// Tabla de roles.
	define('TB_USUARIO_ROL', 'rol');

	// Tabla de usuarios.
	define('TB_USUARIO', 'usuario');

	// Tabla de mensajes.
	define('TB_MENSAJE', 'mensaje');
	
	//Tabla paises
	define('TB_PAIS', 'pais');
	
	
	define('TB_CAMBIO_EMAIL','cambio_email');
	
	define('TB_PAISES','paises');
	
	define('TB_REGIONES','regiones');
	
	define('TB_LOCALIDADES','localidades');
	
	define('TB_PAYPAL','paypal');

	//Tabla de configuracion
	define('TB_CONFIGURACION','configuracion');

	
	/*************************************************/
	/* DATOS DE PRUEBA*/
	/*************************************************/
	
	$datos_mensaje=array('asunto'=>rand(0,10000),
						'texto'=>rand(0,10000));
	
	$usuario_emisor=1;
	$usuario_receptor=2;
	$objeto=1;
	
	
	
	
?>