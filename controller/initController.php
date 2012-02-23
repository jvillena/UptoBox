<?php

/**
 * JPHPFramework
 * Template class
 *
 * @version 0.1
 * @author José Villena
 */
class Init extends JPHPController{
	
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
         Tools::addCSS('base.css','local','screen');
         Tools::addCSS('jquery/bubblePopup/jquery.bubblepopup.v2.3.1.css','global','screen');
         //Style need contextMenu
          Tools::addCSS('jquery/contextmenu/jquery.contextMenu.css','global','screen');
         //Style neeed for upload files.
         Tools::addCSS('jquery/upload/fileuploader.css','global','screen');
         //Style neeed for treeview
         Tools::addCSS('jquery/dynatree/skin-vista/ui.dynatree.css','global','screen');
         
        //Javascripts effect bootstrap popover and alert dialog
        Tools::addJS('bootstrap/bootstrap-popover.js');
        Tools::addJS('bootstrap/bootstrap-alerts.js');
        Tools::addJS('jquery/bubblePopup/jquery.bubblepopup.v2.3.1.min.js');
        //Javascripts need to use context Menu. -->
        Tools::addJS('jquery/contextmenu/jquery.contextMenu.js');
      
        //Javascripts neeed to upload files. 
        Tools::addJS('jquery/upload/fileuploader.js');
         //Javascript neeed to treeview
        Tools::addJS('jquery/dynatree/jquery.dynatree.js');
        
	
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
		global $oSmarty,$oSesion,$oUser,$oFile;
		
		// Call Content setting and html
		parent::addContent();
        //Para el título y la descripción de la página
        $metatitle = "UptoSave.com";
        $metadescription = "UptoSave is new Box bussines cloud for sharing files";
        $oSmarty->assign('metatitle',$metatitle);
        $oSmarty->assign('metadescription',$metadescription);
            
    
        $datos_usuario=$oSesion->getSesion('datos_usuario');
        $datos = $oUser->getDatosUsuario($datos_usuario['id_usuario']);
        $oSmarty->assign('nombre_usuario',$datos['nombre']." ".$datos['apellidos']);
        $oSmarty->assign('id_usuario',$datos['id_usuario']);
        $oSmarty->assign('foto',$datos['ruta_foto']);
    
        //Comprobamos capacidad de almacenamiento máximo para el usuario
        $datos_usuario_configuracion = $oUser->getSettingParams($datos_usuario['id_usuario']);
        $oSmarty->assign('datos_usuario_configuracion',$datos_usuario_configuracion);
        //Calculamos el tamaño actual usado por el usuario
        $actual_size = $oFile->getActualSizeUser($datos_usuario['id_usuario']);
        $actual_size = Settings::getByteSize($actual_size);
        $oSmarty->assign('actual_size',$actual_size);
        //Calculamos el tamaño máximo en MB
        $max_size = Settings::getByteSize($datos_usuario_configuracion['max_size']);
        $oSmarty->assign('max_size',$max_size);
        
       
        // Marcamos documentos como opción principal
        $oSmarty->assign('menu_principal','files');
        $oSmarty->assign('contenido_central','inicio');
    
         //Nombre de la carpeta padre por defecto la carpeta raiz
         $name_parent_folder = Localizer::getTranslate('tx_sub_file');
         //Comprobamos el directorio en el que estamos sino nos metemos en el directorio root
           $aRoot = explode("/",$_GET['id_root']);
        if (count($aRoot)>0)
            $_GET['id_root'] = $aRoot[count($aRoot)-1];
        
        if (isset($_GET['id_root']) && $_GET['id_root']!=0){
            
            $aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], $_GET['id_root']);
            $oSmarty->assign('aFile',$aFile);   
            $oSmarty->assign('id_padre',$_GET['id_root']);
            $oSesion->setSesion('id_root', $_GET['id_root']);
            //Return name of parent folder
            $name_parent_folder = $oFile->getParentNameFolder( $_GET['id_root']);
            if ($name_parent_folder==""){
                $name_parent_folder = Localizer::getTranslate('tx_sub_file');
            }
            
        }else{
            //Nos traemos los ficheros y carpetas del directorio root
            $aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], 0);
            $oSmarty->assign('aFile',$aFile);   
            $oSmarty->assign('id_padre',0);
            $oSesion->setSesion('id_root',0);
            $name_parent_folder = Localizer::getTranslate('tx_sub_file');
        }
    
        //Asignamos el nombre de la carpeta padre
        $oSmarty->assign('name_parent_folder',$name_parent_folder);
        
        //Ultimas actualizaciones de ficheros y carpetas
        $aRecentFile = $oFile->getRecentUpdates($datos_usuario['id_usuario']);
        $oSmarty->assign('aRecentFile',$aRecentFile);   
    
       
        // Assign template for index file
        $oSmarty->setTemplateDir(APP_ROOT.'www/templates/private/user');
        
        //Cargamos las variables de las etiquetas dinámicas de texto
        $oSmarty->assign('tx_titulo_display',Localizer::getTranslate('tx_options_display_folder'));
        $oSmarty->assign('tx_titulo_treeview',Localizer::getTranslate('tx_root_tree'));
    
    
        //Asignamos las plantillas que vamos a utilizar
         $oSmarty->assign('LATERAL_DERECHO',$oSmarty->fetch('right_side.tpl'));
         $oSmarty->assign('CONTENIDO_CENTRAL',$oSmarty->fetch('center_content.tpl'));
         
    
    
        
         $oSmarty->setTemplateDir(APP_ROOT.'www/templates/private/layout');
        //Asignamos las plantillas que vamos a utilizar
        $oSmarty->assign('HEADER',$oSmarty->fetch('header.tpl'));
        $oSmarty->assign('FOOTER',$oSmarty->fetch('footer.tpl'));
        // Display Main Struct with index file
        $oSmarty->display('index.tpl');
		
		
		
	
	}	
	
}

?>