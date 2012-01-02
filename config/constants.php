<?php	 
	/*
	 * CONFIGURACIÓN GLOBAL.
	 */
	define('ID_ROL_ADMINISTRADOR', 1);
	define('ID_ROL_USUARIO', 2);
	
	 // The applications root path, so we can easily get this path from files located in other folders
	define( "APP_PATH", dirname( __FILE__ ) ."/" );
	define( "APP_PATH_CONFIG", "/config/" );
	
	// The applications root path, so we can easily get this path from files located in other folders
	// Define App name
	define('APP_NAME', basename(APP_PATH));
	
	// Email para el envío de las peticiones de contacto.
	define('EMAIL_ENVIO_PETICIONES_CONTACTO', 'info@uptobox.net');
	
	// Email para el envío de las peticiones de trabaja con nosotros.
	define('EMAIL_ENVIO_PETICIONES_TRABAJO', 'trabajo@uptobox.net');	
	
	// Define absolute path
	define("APP_PHISICAL_PATH",$_SERVER['DOCUMENT_ROOT'] . "/");
	
	 # Define el URL base
    define("BASE_URL","http://" . $_SERVER['HTTP_HOST'] . "/".APP_NAME."/");
    
	
	// Define relative path
	define("BASE_PATH",$_SERVER['DOCUMENT_ROOT'] . "/".APP_NAME."/");

	// Translate languages dir
    define("LOCALE", BASE_URL . "locale/");
	
	 // Define Error path
    define("ERROR_ACCESS",APP_PHISICAL_PATH."error");

    // Define root file of our app web
    define( "INDEX_NAME", "index" );
    
   
	// @TODO make a setting
	date_default_timezone_set("Europe/Madrid");
	
    # definimos los estilos, librerias y clases
    define("LIB_URL",BASE_PATH."libs/");
    define("CLASS_URL",BASE_PATH."class/");
    define("CONFIG_URL",BASE_URL."config/");
    define("IMAGES_URL",BASE_URL."images/");
    define("DATAS_URL",BASE_URL."datas/");
	define("MODULE_URL",BASE_URL."modules/");
    
	
	 //Array CSS Styles
	$css_styles=array();

	//Array JS Scripts
	$js_scripts = array();

	//Arrays JS Module Scripts
	$js_modules_scripts = array();

	//Arrays CSS Module Styles
	$css_modules_styles = array();
	
	
	define("APP_TEMPLATES_DIR",  BASE_PATH.'templates/');

	define("APP_ROOT", APP_PHISICAL_PATH."/".APP_NAME."/");
	
	
	// Work FrameWork Mode
    $config_urls = array("APP_NAME" => APP_NAME,
    					"APP_PATH" =>APP_PATH,
    					"APP_PATH_CONFIG"=>APP_PATH_CONFIG,
    					"APP_PHISICAL_PATH"=>APP_PHISICAL_PATH,
    					"BASE_URL"=>BASE_URL,
    					"BASE_PATH"=>BASE_PATH,
    					"DATAS_URL"=>DATAS_URL,
    					"LOCALE"=>LOCALE,
    					"ERROR_ACCESS"=>ERROR_ACCESS,
    					"CLASS_URL"=>CLASS_URL,
    					"LIB_URL"=>LIB_URL,
    					"CONFIG_URL"=>CONFIG_URL,
   						"IMAGES_URL"=>IMAGES_URL,
    					"MODULE_URL"=>MODULE_URL,
    					"APP_TEMPLATES_DIR"=>APP_TEMPLATES_DIR,
    					"APP_ROOT"=>APP_ROOT,
    					"INDEX_NAME"=>INDEX_NAME,
    					"DEFAULT_LANG"=>DEFAULT_LANG);
	
	 $config_mode = array("DEVELOP" =>true,
    					"DEBUG"=>false,
    					"ONLINE"=>false);
	
	
	
	
?>