<?php

/**
 * JPHPFramework
 * Template class
 *
 * @version 0.1
 * @author José Villena
 */
class LoginForm extends ModulesController{

	/**
	 * vars class name
	 * @access public
	 */
	public $moduleName = 'loginForm';

	/**
	 * Our array of datas
	 * @access public
	 */
	public static $datas = array();

	/**
	 * Our array of Form's Fields
	 * @access public
	 */
	public static $fields = array();

	/**
	 * Our array of Form's Fields Validations
	 * @access public
	 */
	public static $fieldsValidations = array();

	/**
	 * Our boolean ways of passings vars
	 * @access public
	 */
	public static $is_jquery = false;

	/**
	 * Languages of module
	 * @access public
	 */
	public $translate;

	/**
	 * Constructor to create a new Template object
	 */
	public function __construct( )
	{
		$this->moduleName = 'loginForm';
    	$this->version = 1.0;
    	$this->author = 'José E. Villena';
    	$this->translate = Settings::getSettings('DEFAULT_LANG');
    	self::setTranslateModule($this->translate,$this->moduleName);
    	self::setMedia();
    	self::setView();
		parent::__construct();



	}

	/**
	 * Stores stylesheet and scripts
	 * @return void
	 */
	public function setMedia()
	{
		Tools::addJS('scripts.js','module',$this->moduleName);

		parent::setMedia();
	}

	/**
	 * setView
	 * Load Default View for the module
	 * @access public
	 * @return
	 */
	public function setView(){
		global $config_urls;

		include 'modules/'.$this->moduleName.'/php/'.$this->moduleName.'.php';
	}

	/**
	 * setTranslateModule
	 * Load Default Language of the Web in the module texts
	 * @access public
	 * @return
	 */
	public function setTranslateModule($translate, $moduleName){
		parent::setTranslateModule($translate,$moduleName);
	}

	/**
	 * display method used to links all part of html web page
	 * @access public
	 * @return
	 */
	public function display(){
		global $oSmarty, $settings_vars, $config_urls, $js_modules_scripts, $css_modules_styles;

		parent::display();

		self::$datas = self::getSettingModule($this->moduleName);

		self::$fields = self::$datas['fields'];

		self::$fieldsValidations = self::$datas['validation'];
        
        if (self::$datas['mode_jquery']){
            self::$is_jquery = true;
        }

		//Add Module styles
		$oSmarty->assign('aModuleStyles','');
		//Add Module scripts
		$oSmarty->assign('aModuleScripts',$js_modules_scripts[$this->moduleName]);


		// Get data
		$oSmarty->assign('datas', self::$datas);

		$oSmarty->assign('is_jquery', self::$is_jquery);

		$oSmarty->assign('PATH',$config_urls['MODULE_IMG_DIR'].$this->moduleName."/");

		// Assign template for index file
		$html = $oSmarty->fetch('loginForm.tpl');

		return $html;
	}



	/**
	 * Gets a setting from the registry
	 * @param String $key the key in the array
	 * @return void
	 */
	public function getSettingModule( $key )
	{
		return parent::getSettingModule($key);;
	}

	
	/**
	 * setValidateForm check and validates Form's fields
	 * @param Array of fields
	 * @return boolean
	 */
	public static function setValidateForm($data){
		if (self::validateUsername($data['username']) && self::validatePassword1($data['password'])){
			return true;
		}
		return false;
	}
	
	/**
	 * validateUsername check and validates Username field
	 * @param String fields
	 * @return boolean
	 */
	public static function validateUsername($name){
		//NO cumple longitud minima
		if(strlen($name) < 4)
			return false;
		//SI longitud pero NO solo caracteres A-z
		else if(!preg_match("/^[a-zA-Z]+$/", $name))
			return false;
		// SI longitud, SI caracteres A-z
		else
			return true;
	}
	
	/**
	 * validatePassword1 check and validates Password field
	 * @param String fields
	 * @return boolean
	 */
	public static function validatePassword1($password1){
		//NO tiene minimo de 5 caracteres o mas de 12 caracteres
		if(strlen($password1) < 5 || strlen($password1) > 12)
			return false;
		// SI longitud, NO VALIDO numeros y letras
		else if(!preg_match("/^[0-9a-zA-Z]+$/", $password1))
			return false;
		// SI rellenado, SI email valido
		else
			return true;
	}
	
	/**
	 * validatePassword2 check and validates Password field
	 * @param String fields
	 * @return boolean
	 */
	public static function validatePassword2($password1, $password2){
		//NO coinciden
		if($password1 != $password2)
			return false;
		else
			return true;
	}
	
	/**
	 * validateEmail check and validates email field
	 * @param String fields
	 * @return boolean
	 */
	public static function validateEmail($email){
		//NO hay nada escrito
		if(strlen($email) == 0)
			return false;
		// SI escrito, NO VALIDO email
		else if(!filter_var($_POST['email'], FILTER_SANITIZE_EMAIL))
			return false;
		// SI rellenado, SI email valido
		else
			return true;
	}


}

?>