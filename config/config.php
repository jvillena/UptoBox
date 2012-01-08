<?php	 
/**
 * UptoBox
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
	
		

	/* Variables para la creación de sesión. */
	$SESION_SEGURIDAD_INCLUIR_NOMBRE_EXPLORADOR = true;
	$SESION_SEGURIDAD_BLOQUES_IP = 4;
	$SESION_SEGURIDAD_PALABRA_SEGURA = "alea_woja";
	$SESION_SEGURIDAD_REGENERAR_ID = true;
	
	
	/******************************************************************************/
	/* FIN DE LAS VARIABLES A MODIFICAR PARA LA CORRECTA CONFIGURACIÓN DEL SITIO. */
	/******************************************************************************/
	
	/* Iniciamos la semilla para generación de números aleatorios. */
	srand();				
	
	// Calculamos la ruta relativa del archivo actual con respecto a la carpeta raíz del sitio.
	$ruta_relativa_archivo_actual = explode("/", str_replace('\\', '/', $_SERVER['PHP_SELF']));
	$ruta_relativa_archivo_actual_sobre_raiz = "";
	// Vamos construyéndo la ruta relativa, quitando la parte del nombre del script.
	// Nos olvidamos del indice 0, puesto que corresponde con la explode sobre la primera '/'.
	for ($i = 1; $i < (count($ruta_relativa_archivo_actual) - 2); $i++) {
		$ruta_relativa_archivo_actual_sobre_raiz .= "../";	
	}
	// Le quitamos la última / si es que la tiene.
	if (($ruta_relativa_archivo_actual_sobre_raiz != "") && ($ruta_relativa_archivo_actual_sobre_raiz{strlen($ruta_relativa_archivo_actual_sobre_raiz) - 1} == "/"))
		$ruta_relativa_archivo_actual_sobre_raiz = substr($ruta_relativa_archivo_actual_sobre_raiz, 0, (strlen($ruta_relativa_archivo_actual_sobre_raiz) - 1));     
	
	
	// Definimos el separador entre rutas si no está previamente definido por ser una versión de php anterior a la 4.
	// Esto es para separar una ruta de otra no es el separador de directorios dentro de una ruta.
	if (!defined("PATH_SEPARATOR")) { 
	  	if (strpos($_ENV["OS"], "Win") !== false) 
			define("PATH_SEPARATOR", ";"); 
	  	else 
			define("PATH_SEPARATOR", ":"); 
	} 
	
	// Definimos la variable $_SERVER['DOCUMENT_ROOT'] si no está previamente definida por el servidor.
	if(!isset($_SERVER['DOCUMENT_ROOT'])) { 
		$script_name = $_SERVER['SCRIPT_NAME']; 
		$f = ereg_replace('\\\\', '/', $_SERVER["PATH_TRANSLATED"]); 
		$f = str_replace('//', '/', $f); 
		$_SERVER['DOCUMENT_ROOT'] = eregi_replace($script_name, "", $f); 
	} 
	
	
	// Include Settings Class
	include($config_urls['CLASS_URL'].'settings.class.php');
	include($config_urls['CLASS_URL'].'combos.class.php');
	
	
	// Include Tools Class
	include(Settings::getSettingsVars('CLASS_URL').'tools.class.php');
	
	
	// Incluímos en el include path del sistema la ruta del directorio de configuracion. Es decir, la ruta del archivo actual.
	//insertar_include_path(CONFIG_URL);	
		
	/* Include Session Class */
	include(Settings::getSettingsVars('CLASS_URL').'session.class.php');
	/* Creación del objeto de sesión. */
	$oSesion = new SessionClass();
	$oSesion->incluir_nombre_explorador = $SESION_SEGURIDAD_INCLUIR_NOMBRE_EXPLORADOR;
	$oSesion->bloques_ip = $SESION_SEGURIDAD_BLOQUES_IP;
	$oSesion->palabra_segura = $SESION_SEGURIDAD_PALABRA_SEGURA;
	$oSesion->regenerar_id = $SESION_SEGURIDAD_REGENERAR_ID;	
	
	/* Include Data Base Class. */
	include(Settings::getSettingsVars('CLASS_URL').'adodb5/adodb.inc.php');
	/* Creación del objeto de base de datos. */	
	$oBD = ADONewConnection(DATABASE_GESTOR);
	$oBD->debug = DEBUG_SQL;	
	$oBD->Connect(BD_SERVER, BD_USER,  BD_PASSWORD, BD_DATABASE);
	$oBD->Execute("SET NAMES '".DATABASE_CHARSET."'");

	// Include Language Class
	include(Settings::getSettingsVars('CLASS_URL').'localizer.class.php');
	
	$oSesion->inicioSesion();
		
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	
	if (isset($datos_usuario['id_usuario'])){
		Settings::setSettingsVars('DEFAULT_LANG',$datos_usuario['codigo_idioma']);
		
		Settings::setSettingsVars('ID_ZONE',$datos_usuario['id_zone']);
		$name_zone = Combos::getNameTimeZone($datos_usuario['id_zone']);
		Settings::setSettingsVars('NAME_ZONE',$name_zone);
		date_default_timezone_set($name_zone);
		
	}else{
		Settings::setSettingsVars('DEFAULT_LANG','en');
		Settings::setSettingsVars('NAME_ZONE','Europe/London');
		date_default_timezone_set('Europe/London');
	}	
	Localizer::init(Settings::getSettingsVars('DEFAULT_LANG'));
	// Include Error Class
	include(Settings::getSettingsVars('CLASS_URL').'error.class.php');
	

	// Include Basic Functions
	include(Settings::getSettingsVars('LIB_URL').'php/functions.php');

	// Include Smarty Class smarty.php.
	include(Settings::getSettingsVars('CLASS_URL').'smarty.class.php');
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
	
	// Asignamos la ruta de las imágenes
	$oSmarty->assign('IMAGES_URL', IMAGES_URL);
	
//	require_once(CLASS_URL.'/smarty.class.php');
	
	
	
?>