<?php
/**
 * Modules Controller Class
 * @package JPHPFramework
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */

class ModulesController{
	/**
	 * Our array of modules
	 * @access private
	 */
	private static $modules = array();

	/**
	 * The instance of the module registry
	 * @access private
	 */
	private static $instance;

	/**
	 * Our array of settings
	 * @access private
	 */
	private static $settingsModule = array();

	/**
	 * Constructor to create a new Template object
	 */
	public function __construct( )
	{
		
	}
	/**
	 * singleton method used to access the object
	 * @access public
	 * @return
	 */
	public static function singleton()
	{
		if( !isset( self::$instance ) )
		{
			$obj = __CLASS__;
			self::$instance = new $obj;
		}

		return self::$instance;
	}



	/**
	 * loadModule allows you to add new module such as loginForm, Payments at any time.
	 * @param String $modules the name of the module
	 * @param String $key the key for the array
	 * @return void
	 */
	public function loadModule( $module, $key )
	{
		global $config_urls;
        
		require_once($config_urls['MODULE_URL'].$module .'/controller/'.$module . 'Controller.php');
		self::$modules[ $key ] = new $module( self::$instance );
	}

	/**
	 * prevent cloning of the object: issues an E_USER_ERROR if this is attempted
	 */
	public function __clone()
	{
		trigger_error( 'Cloning the registry is not permitted', E_USER_ERROR );
	}

	/**
	 * Gets an module from the registry
	 * @param String $key the array key
	 * @return module
	 */
	public function getModule( $key )
	{
		global $config_urls, $oSmarty;

		// Change smarty template dir
		$oSmarty->setTemplateDir($config_urls['APP_ROOT'].'/modules/'.$key.'/templates/');

		if (!file_exists($config_urls['MODULE_URL'].$key.'/php/'.$key.'.php'))
		{
			// Error!, we don't have a page for that!
			Error::redirect404();
		}else{

				if( is_object ( self::$modules[ $key ] ) )
				{
					return self::$modules[ $key ];
				}
		}
	}

	/**
	 * Stores stylesheet and scripts
	 * @return void
	 */
	public function setMedia()
	{

	}

	/**
	 * display method used to links all part of html web page
	 * @access public
	 * @return
	 */
	public function display(){
		return "";
	}

	/**
	 * Stores settings in the registry
	 * @param String $data
	 * @param String $key the key for the array
	 * @return void
	 */
	public function setSettingModule( $data, $key )
	{
		self::$settingsModule[ $key ] = $data;
	}

	/**
	 * Gets a setting from the registry
	 * @param String $key the key in the array
	 * @return void
	 */
	public function getSettingModule( $key )
	{
		return self::$settingsModule[ $key ];
	}

	/**
	 * Set Language of Module
	 * @return void
	 */
	public function setTranslateModule($translate, $module){
		Localizer::init($translate,$module);
	}


}

?>