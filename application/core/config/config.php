<?php	
/**
 * JPHP Framework
 * Config - include config settings of FrameWork
 *
 * @version 0.1
 * @author José E. Villena
 */ 
	/* Include constants in configs file. */
	require_once(dirname( __FILE__ ).'/settings.php');	
	require_once(dirname( __FILE__ ).'/constants.php');	
	require_once(dirname( __FILE__ ).'/db_tables.php');
	if ($config_mode['DEBUG']){
		error_reporting(E_ALL ^ E_STRICT);
		define('START_TIME', microtime(1));
		// Mode smarty debuger
		define("DEBUG_SMARTY", true);
		// Mode Data Base SQL debuger	
		define("DEBUG_SQL", true);
	}else if ($config_mode['DEVELOP']){
        // Mode Smarty debuger
        define("DEBUG_SMARTY", true);
        // Mode Data Base SQL debuger
        define("DEBUG_SQL", false);
    }else{
        // Mode Smarty debuger
        define("DEBUG_SMARTY", false);
        // Mode Data Base SQL debuger
        define("DEBUG_SQL", false);
    }
	
	// Modo PHP debuger
	if($config_mode['DEBUG']) {
		ini_set('display_errors', 1); 
		ini_set('log_errors', 1); 
		error_reporting(E_ALL);
	}

	// Session variables
	$SESION_SEGURIDAD_INCLUIR_NOMBRE_EXPLORADOR = true;
	$SESION_SEGURIDAD_BLOQUES_IP = 4;
	$SESION_SEGURIDAD_PALABRA_SEGURA = "uptosave_2011";
	$SESION_SEGURIDAD_REGENERAR_ID = true;
	
	
	
	// Rand random root. 
	srand();				
	
	
		
	// Management Session class
	require_once('sesion.class.php');
	// Session class creation
	$oSesion = new Sesion();
	$oSesion->incluir_nombre_explorador = $SESION_SEGURIDAD_INCLUIR_NOMBRE_EXPLORADOR;
	$oSesion->bloques_ip = $SESION_SEGURIDAD_BLOQUES_IP;
	$oSesion->palabra_segura = $SESION_SEGURIDAD_PALABRA_SEGURA;
	$oSesion->regenerar_id = $SESION_SEGURIDAD_REGENERAR_ID;	
	
    // Include Settings Class
    include($config_urls['CLASS_URL'].'settings.class.php');
    include($config_urls['CLASS_URL'].'combos.class.php');
  
	// Include Error Class
    include(Settings::getSettingsVars('CLASS_URL').'error.class.php');
    

    // Include Basic Functions
    include(Settings::getSettingsVars('LIB_URL').'uptosave/php/functions.php');

    // Include Smarty Class smarty.php.
    //include(Settings::getSettingsVars('CLASS_URL').'smarty.class.php');
	
	
	
	// Include Tools Class 
	include(Settings::getSettingsVars('CLASS_URL').'tools.class.php');
	
    
     
	
    
    // require our registry
    require_once($config_urls['CONTROLLER_URL'].'jphpController.php');
    $registry = JPHPController::singleton();
    
    // require our module objects
    require_once(Settings::getSettingsVars('CONTROLLER_URL').'modulesController.php');
    $registry_objects = ModulesController::singleton();
    
    // Setting path of model db
    $registry->setDataBaseObject('database','db');
    $oBD = $registry->getObject('db')->newConnection(DATABASE_GESTOR, BD_SERVER, BD_USER , BD_PASSWORD  ,BD_DATABASE ,DATABASE_CHARSET); 
    
    
    
     // Include Language Class
    include(Settings::getSettingsVars('CLASS_URL').'localizer.class.php');
    
   
    
    
    
    
  
      // Include Smarty Class smarty.php.
    require_once('smarty.class.php');
    $oSesion->inicioSesion();
        
    $datos_usuario=$oSesion->getSesion('datos_usuario');
    
    if (isset($datos_usuario['id_usuario'])){
        Settings::setSettingsVars('DEFAULT_LANG',$datos_usuario['codigo_idioma']);
        
        Settings::setSettingsVars('ID_ZONE',$datos_usuario['id_zone']);
        $name_zone = Combos::getNameTimeZone($datos_usuario['id_zone']);
        Settings::setSettingsVars('NAME_ZONE',$name_zone);
        date_default_timezone_set($name_zone);
        
        
        $oSmarty->assign('LOGUEADO',true);
        
       
            
            $aDatosSesionUsuario = $oSesion->getSesion('datos_usuario');
            $oSmarty->assign('datos_sesion',$aDatosSesionUsuario);
        
    }else{
         $oSmarty->assign('LOGUEADO',false);
            $oSesion->cierreSesion();
            $oSmarty->assign('datos_sesion','');
        Settings::setSettingsVars('DEFAULT_LANG','en');
        Settings::setSettingsVars('NAME_ZONE','Europe/London');
        date_default_timezone_set('Europe/London');
    }   
    Localizer::init(Settings::getSettingsVars('DEFAULT_LANG'));
	
    
   
    
	// Assign Global language variable
    $oSmarty->assign("DEFAULT_LANG",DEFAULT_LANG);
    $oSmarty->assign("BASE_URL",BASE_URL);
    $oSmarty->assign("config_urls",$config_urls);   
    
    // Asignamos la constante definida en el fichero de configuracion con el directorio del sitio.
    $oSmarty->assign('DIRECTORIO_SITIO', APP_NAME);
    // Asignamos la constante definida en el fichero de configuracion con la ruta relativa hacia el directorio raíz del sitio.
    $oSmarty->assign('BASE_PATH', BASE_PATH);   
    // Asignamos la constante definida en el fichero de configuracion con la ruta absoluta del sitio web.
    $oSmarty->assign('RUTA_WEB_ABSOLUTA', BASE_URL);
    
     $oSmarty->assign('BASE_THEMES_URL',BASE_THEMES_URL);
    
    // Asignamos la ruta de las imágenes
    $oSmarty->assign('IMAGES_URL', IMAGES_URL);
    
    
    
	
?>