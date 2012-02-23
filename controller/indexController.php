<?php

/**
 * JPHPFramework
 * Template class
 *
 * @version 0.1
 * @author José Villena
 */
class Index extends JPHPController{
	
	/**
	 * Constructor to create a new Template object
	 * @param JPHPFramework $registry the frameworks registry
	 */
	public function __construct( )
	{
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
		parent::addFooter();
	}
	
	public function addContent()
	{
		global $oSmarty;
		
		// Call Content setting and html
		parent::addContent();
        //Para el título y la descripción de la página
        $metatitle = "UptoSave.com";
        $metadescription = "UptoSave.com";
        $oSmarty->assign('metatitle',$metatitle);
        $oSmarty->assign('metadescription',$metadescription);
		// Assign template for index file
	    $oSmarty->setTemplateDir(APP_ROOT.'www/templates/public/index');
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