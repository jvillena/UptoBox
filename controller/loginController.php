<?php

/**
 * Login Controller
 * Template class
 *
 * @version 0.1
 * @author José Villena
 */
class Login extends JPHPController{
	
	/**
	 * Constructor to create a new Template object
	 * @param JPHPFramework $registry the frameworks registry
	 */
	public function __construct( )
	{
		$this->name = 'login';
        $this->version = 0.1;
        $this->author = 'José E. Villena';
        $this->translate = Settings::getSettings('DEFAULT_LANG');
        parent::__construct();
	}
	
	/**
	 * Stores stylesheet
	 * @return void
	 */
	public function setMedia()
	{
		global $oSmarty, $css_styles, $js_scripts;
		parent::setMedia();
        
        Tools::loaderClass('user.class.php');
         Tools::loaderClass('notification.class.php');
        
	}
	
	/**
	 * Function addHeader add header variables such as (Web Page's name, styles, js, favicon)
	 */
	public function addHeader(){
		parent::addHeader();
		$this->setMedia();
	}
	
	/**
	 * Function addFooter add footer variables
	 */
	public function addFooter(){
	}
	
	public function addContent()
	{
		global $oSmarty, $registry_objects, $config_urls, $settings_vars;
		// Call Content setting and html
		parent::addContent();
        
        
         //Para el título y la descripción de la página
        $metatitle = "UptoSave.com";
        $metadescription = "UptoSave.com";
        $oSmarty->assign('metatitle',$metatitle);
        $oSmarty->assign('metadescription',$metadescription);
        
        
        // Load module LoginForm
        $registry_objects->loadModule('loginForm','loginForm');
        $data = array(
                        'name'=>'form_login',
                        'id'=>'form_login',
                        'fields'=>array('username','password'),
                        'validation'=>array('username'=>'required','password'=>'required'),
                        'type'=>array('username'=>'text','password'=>'password'),
                        'mode_jquery'=>true,
                        'method'=>'POST',
                        'submit'=>array('id'=>'blogin','name'=>'logueo','value'=>'Login'),
                        'action'=>'www/php/public/'.$this->name.'/login_ajax.php');

        $registry_objects->setSettingModule($data,'loginForm');

        $html_form = $registry_objects->getModule('loginForm')->display();

        
        // Assign template for index file
        $oSmarty->setTemplateDir(APP_ROOT.'www/templates/public/login');
        // Assign template for index file
        $oSmarty->assign('LOGIN_MODULE',$html_form);
        $oSmarty->assign('LATERAL_DERECHO', "");
        $oSmarty->assign('CONTENIDO_CENTRAL',$oSmarty->fetch('center_content.tpl'));        
        
        $oSmarty->setTemplateDir(APP_ROOT.'www/templates/public/layout');
        //Asignamos las plantillas que vamos a utilizar
        $oSmarty->assign('HEADER',$oSmarty->fetch('header.tpl'));
        $oSmarty->assign('FOOTER',$oSmarty->fetch('footer.tpl'));
        // Display Main Struct with index file
        $oSmarty->display('index.tpl');
		
		
		
	
	}	
	
}

?>