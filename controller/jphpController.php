<?php
/**
 * The JPHPController controller
 * Implements the Registry and Singleton design patterns
 *
 * @version 0.1
 * @author Jose Villena
 */
class JPHPController {
	
	/**
	 * Our array of objects
	 * @access private
	 */
	private static $objects = array();
	
	/**
	 * Our array of settings
	 * @access private
	 */
	private static $settings = array();
	
	/**
	 * The frameworks human readable name
	 * @access private
	 */
	private static $frameworkName = 'Welcome to JPHP Framework version 0.1';
	
	/**
	 * The instance of the registry
	 * @access private
	 */
	private static $instance;
	
	/**
	 * Public constructor can be access directly
	 * @access public
	 */
	public function __construct()
	{
		
        
	}
	

	/** 
	 * Magic autoload function
	 * used to include the appropriate -controller- files when they are needed
	 * @param String the name of the class
	 */
	function __autoload( $class_name )
	{
		require_once('controllers/' . $class_name . '/' . $class_name . '.php' );
	}
	
	/**
	 * generateOutput method used to links all part of html web page
	 * @access public
	 * @return 
	 */
	public function generateOutput(){
		$this->initialize();
		$this->addHeader();
		$this->addFooter();
		$this->addContent();
		
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
	 * prevent cloning of the object: issues an E_USER_ERROR if this is attempted
	 */
	public function __clone()
	{
		trigger_error( 'Cloning the registry is not permitted', E_USER_ERROR );
	}
	
	/**
	 * Setting security protection, language, permission
	 * @return void
	 */
	public function initialize(){
		global $oSesion, $oSmarty;
		
		$oSesion->aperturaSesion();
	
		if(!$oSesion->ComprobarSesion()){
			Error::redirectUsuarioNoRegistrado();
			exit();
		}
        
        
        // Change smarty template dir 
        $oSmarty->setTemplateDir(APP_ROOT.'www/templates/public/layout');
	}
	
	/**
	 * Stores an object in the registry
	 * @param String $object the name of the object
	 * @param String $key the key for the array
	 * @return void
	 */
	public function setDataBaseObject($object, $key)
	{
	    global $config_urls;
		
		
		require_once($config_urls['BASE_PATH'].'application/model/'. $object . '.class.php');
		self::$objects[ $key ] = new $object( self::$instance );
	}
	
	
	/**
	 * Stores stylesheet
	 * @return void
	 */
	public function setMedia()
	{
	    Tools::addCSS('login.css','local','screen'); 
        Tools::addCSS('bootstrap.css','local','screen');
        Tools::addCSS('public.css','local','screen');
        Tools::addCSS('jquery/jquery-ui-1.8.12.custom.css','global','screen');
        Tools::addCSS('jquery/contextmenu/jquery.contextMenu.css','global','screen');
        
        //Javascripts need to validate forms
        Tools::addJS('jquery/jquery.js');
        Tools::addJS('jquery/validate/validate.js');
        Tools::addJS('jquery/jquery-ui.min.js');
        Tools::addJS('jquery/jquery_ui/jquery-ui.custom.js');  
        Tools::addJS('jquery/jquery.cookie.js');   
        //Javascripts need for styles in radios and checkboxs
        Tools::addJS('jquery/checkbox/customInput.jquery.js');
        Tools::addJS('jquery/checkbox/customInput.jquery.js');   
        Tools::addJS('uptosave/jscripts/comunes.js');
         //Javascripts need to use bootstrap
        Tools::addJS('bootstrap/bootstrap-dropdown.js');
        Tools::addJS('bootstrap/bootstrap-tabs.js');
        Tools::addJS('bootstrap/bootstrap-modal.js');
        Tools::addJS('bootstrap/bootstrap-twipsy.js');
            
        
		
	}
	
	/**
	 * Function addHeader add header variables such as (Web Page's name, styles, js, favicon)
	 * @return header.tpl
	 */
	public function addHeader(){
		global $oSmarty, $css_styles, $js_scripts;
		
		//make chart set of web page
		header ('Content-type: text/html; charset=utf-8');
		
		//Assign Global Variables
		$oSmarty->assign('APP_NAME',APP_NAME);
		
		//Favicon settings
		$oSmarty->assign('fav_icon',APP_THEMES_DIR.'/img/icon/'.FAV_ICON);
		// Iphone Icon
		$oSmarty->assign('fav_icon_apple_touch',APP_THEMES_DIR.'/img/icon/'.FAV_ICON_IPHONE);
		// Iphone Retina Icon
		$oSmarty->assign('fav_icon_apple_72x72',APP_THEMES_DIR.'/img/icon/'.FAV_ICON_IPHONE_RETINA);
		//Ipad icon
		$oSmarty->assign('fav_icon_apple_114x114',APP_THEMES_DIR.'/img/icon/'.FAV_ICON_IPAD);
		
		$this->setMedia();
		
		//Add styles
		$oSmarty->assign('aStyles',$css_styles);
		//Add scripts
		$oSmarty->assign('aScripts',$js_scripts);
		
		// Assign template for index file
		$oSmarty->assign('HEADER',$oSmarty->fetch('header.tpl'));
		
	}
	
	/**
	 * Function addFooter add footer variables and html struct
	 * @return footer.tpl
	 */
	public function addFooter(){
		global $oSmarty;
		// Assign template for index file
		$oSmarty->assign('FOOTER',$oSmarty->fetch('footer.tpl'));
	}
	
	
	/**
	 * Function addContent add content variables and html struct
	 * @return left.tpl and content.tpl
	 */
	public function addContent(){
		
	}
	
	/**
	 * Stores an object in the registry
	 * @param String $object the name of the object
	 * @param String $key the key for the array
	 * @return void
	 */
	public function storeObject( $object, $key )
	{
		require_once($object . 'Controller.php'); //'www/' . APP_NAME . '/php/'. $object. '/' . $object . 'Controller.php'
		self::$objects[ $key ] = new $object( self::$instance );
	}
	
	/**
	 * Gets an object from the registry
	 * @param String $key the array key
	 * @return object
	 */
	public function getObject( $key )
	{
		if( is_object ( self::$objects[ $key ] ) )
		{
			return self::$objects[ $key ];
		}
	}
	
	/**
	 * Stores settings in the registry
	 * @param String $data
	 * @param String $key the key for the array
	 * @return void
	 */
	public function storeSetting( $data, $key )
	{
		self::$settings[ $key ] = $data;
	}
	
	/**
	 * Gets a setting from the registry
	 * @param String $key the key in the array
	 * @return void
	 */
	public function getSetting( $key )
	{
		return self::$settings[ $key ];
	}
	
	/**
	 * Gets the frameworks name
	 * @return String
	 */
	public function getFrameworkName()
	{
		return self::$frameworkName;
	}
	
	
}

?>