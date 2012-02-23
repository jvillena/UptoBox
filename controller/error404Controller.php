<?php

/**
 * JPHPFramework
 * Template class
 *
 * @version 0.1
 * @author José Villena
 */
class Error404 extends JPHPController{

	/**
	 * Constructor to create a new Template object
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
		// Assign template for index file
		$oSmarty->assign('CONTENT',$oSmarty->fetch('error404/content.tpl'));
		// Display Main Struct with index file
		$oSmarty->display('index/index.tpl');




	}

}

?>