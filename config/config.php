<?php	 
	/*******************************************************************/
	/* VARIABLES A MODIFICAR PARA LA CORRECTA CONFIGURACIÓN DEL SITIO. */
	/*******************************************************************/
	// Estilo del sitio web
	define("ESTILO_CSS", "gris");	

	// Si estamos trabajando en local.
	if($_SERVER['HTTP_HOST'] == "localhost") {
		// Si es el directorio raíz se definirá como "" nunca como "/".
		// Si es el directorio raíz se definirá como "" nunca como "/".
		define("DIRECTORIO_SITIO", "/uptobox");
		// Variables de base de datos.
		$BD_USUARIO = 'root';
		$BD_PASSWORD = '';
		$BD_BASE_DATOS = 'bd_uptobox';
		$BD_SERVIDOR = 'localhost';	

		$DEBUG = true;
		// Modo debuger de smarty.
		define("DEBUG_SMARTY", true);
		// Modo debuger de base de datos.	
		define("DEBUG_SQL", false);
	}
	else{
		// Si es el directorio raíz se definirá como "" nunca como "/".
		define("DIRECTORIO_SITIO", "");
		// Variables de base de datos.
		$BD_USUARIO = 'uptobox';
		$BD_PASSWORD = 'uptobox';
		$BD_BASE_DATOS = 'bd_uptobox';
		$BD_SERVIDOR = 'localhost';	

		$DEBUG = false;
		// Modo debuger de smarty.
		define("DEBUG_SMARTY", false);
		// Modo debuger de base de datos.	
		define("DEBUG_SQL", false);
	}
	
	/* Inclusión de las constantes. */
	require_once('constants.php');	
	
	// Modo debuger de php.
	if($DEBUG) {
		ini_set('display_errors', 1); 
		ini_set('log_errors', 1); 
		error_reporting(E_ALL);
	}
	else{
		error_reporting(0);
	}

	/* Variables para la creación de sesión. */
	$SESION_SEGURIDAD_INCLUIR_NOMBRE_EXPLORADOR = true;
	$SESION_SEGURIDAD_BLOQUES_IP = 4;
	$SESION_SEGURIDAD_PALABRA_SEGURA = "alea_woja";
	$SESION_SEGURIDAD_REGENERAR_ID = true;
	
	/* Variables de la base de datos. */
	$BASE_DATOS_GESTOR = 'mysql';
	$BASE_DATOS_CHARSET = 'utf8';
	
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
	
	

	
	
	// Incluímos en el include path del sistema la ruta del directorio de configuracion. Es decir, la ruta del archivo actual.
	//insertar_include_path(CONFIG_URL);	
		
	// Incluímos en el include path del sistema la ruta del directorio de clases.
	//insertar_include_path(CLASS_URL);
	require_once(CLASS_URL.'/error.class.php');	
	/* Inclusión de la clase encargada de manejar las sesiones. */
	require_once(CLASS_URL.'/sesion.class.php');
	/* Creación del objeto de sesión. */
	$oSesion = new Sesion();
	$oSesion->incluir_nombre_explorador = $SESION_SEGURIDAD_INCLUIR_NOMBRE_EXPLORADOR;
	$oSesion->bloques_ip = $SESION_SEGURIDAD_BLOQUES_IP;
	$oSesion->palabra_segura = $SESION_SEGURIDAD_PALABRA_SEGURA;
	$oSesion->regenerar_id = $SESION_SEGURIDAD_REGENERAR_ID;	
	
	/* Inclusión de la clase de la base de datos. */
	require_once(CLASS_URL.'/adodb5/adodb.inc.php');
	/* Creación del objeto de base de datos. */	
	$oBD = ADONewConnection($BASE_DATOS_GESTOR);
	$oBD->debug = DEBUG_SQL;	
	$oBD->Connect($BD_SERVIDOR, $BD_USUARIO,  $BD_PASSWORD, $BD_BASE_DATOS);
	$oBD->Execute("SET NAMES '".$BASE_DATOS_CHARSET."'");

	
	/* Inclusión de funciones básicas. */
	require_once (LIB_URL.'/php/functions.php');
	
	/* Inclusión de la clase de idiomas*/
	include(CLASS_URL.'/localizer.class.php');
	Localizer::init(DEFAULT_LANG);
	
	require_once(CLASS_URL.'/smarty.class.php');
	
	/* Inclusión de libreria para reescalado inteligente de imagenes. */
	//include(LIB_URL.'/php/rescalado_imagen/image.php');
	
	//Asignamos la variable global del idioma
	$oSmarty->assign("DEFAULT_LANG",DEFAULT_LANG);
	$oSmarty->assign("BASE_URL",BASE_URL);
	
	
?>