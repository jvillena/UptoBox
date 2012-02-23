<?php	
/**
 * JPHP Framework
 * Constant file - File to describe Global Setting
 *
 * @version 0.1
 * @author José E. Villena
 */ 
    define('ID_ROL_ADMINISTRADOR', 1);
    define('ID_ROL_USUARIO', 2);
	 // The applications root path, so we can easily get this path from files located in other folders
	define( "APP_PATH", dirname( __FILE__ ) ."/" );
	define( "APP_PATH_CONFIG", "/application/core/config/" );

	// The applications root path, so we can easily get this path from files located in other folders
	// Define FrameWork name 
	define('FRAMEWORK_NAME', basename(APP_PATH));
	
	// Define absolute path
	define("APP_PHISICAL_PATH",$_SERVER['DOCUMENT_ROOT'] . "/");
	
	# Define el URL base
    define("BASE_URL","http://" . $_SERVER['HTTP_HOST'] . "/uptosave/");
    
    // Define relative path
    define("BASE_PATH",$_SERVER['DOCUMENT_ROOT'] . "/".APP_NAME."/");
    
	// Translate languages dir
    define("LOCALE", BASE_URL . "locale/");
    
     // Define root file of our app web
    define( "INDEX_NAME", "index" );
    
    // Define root file of our app web
    define( "THEME_NAME", "blue" );
    
     // definimos ruta errores
    define("ERROR_ACCESS",APP_PHISICAL_PATH);

    
    // @TODO make a setting
    date_default_timezone_set("Europe/Madrid");
    
    // define dir css, libs, class, models.
    define("MODEL_URL",BASE_URL."application/model/");
    define("LIB_URL",BASE_PATH."libs/");
    define("CLASS_URL",BASE_PATH."class/");
    define("CONFIG_URL",BASE_URL."application/config/");
    define("IMAGES_URL",BASE_URL."images/");
    define("DATAS_URL",BASE_URL."datas/");
    define("MODULE_URL",BASE_PATH."modules/");
    define("CONTROLLER_URL",BASE_PATH."controller/");
    define("VENDORS_URL",BASE_URL."vendors/");
    define("APP_THEMES_DIR",BASE_URL."themes/");
    define("IMAGES_THEMES_URL",APP_THEMES_DIR.THEME_NAME."/images/");  
    define("BASE_THEMES_URL",APP_THEMES_DIR.THEME_NAME."/");
      
      
     //Array CSS Styles
    $css_styles=array();

    //Array JS Scripts
    $js_scripts = array();

    //Arrays JS Module Scripts
    $js_modules_scripts = array();

    //Arrays CSS Module Styles
    $css_modules_styles = array();
    
    

    define("APP_ROOT", APP_PHISICAL_PATH.APP_NAME."/");
    
    
    
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
                        "CONTROLLER_URL"=>CONTROLLER_URL,
                        "APP_TEMPLATES_DIR"=>APP_TEMPLATES_DIR,
                        "APP_ROOT"=>APP_ROOT,
                        "IMAGES_THEMES_URL"=>IMAGES_THEMES_URL,
                        "INDEX_NAME"=>INDEX_NAME);
    
    
    // Work FrameWork Mode 
    $config_mode = array("DEVELOP" =>true,
    					"DEBUG"=>false,
    					"ONLINE"=>false);
    
    define("APP_TEMPLATES_DIR", APP_PHISICAL_PATH.'www/templates');
    
	define("APP_VIEW_DIR", BASE_URL. 'www/'.APP_NAME);
	
	define("APP_ROOT", APP_PHISICAL_PATH."/uptosave/");
	
	
?>