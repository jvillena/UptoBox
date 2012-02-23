<?php 

/**
 * JPHPFramework
 * Template class
 *
 * @version 0.1
 * @author José Villena
 */
    if ( ! defined( 'JPHP_SECURITY' ) )
    {
        echo 'Error de acceso';
        exit();
    }
    
    require_once(APP_PATH.'config.php');  
    require($config_urls['BASE_PATH'].'class/user.class.php');
    require($config_urls['BASE_PATH'].'class/profile.class.php');
    require($config_urls['BASE_PATH'].'class/file.class.php');  
    require($config_urls['BASE_PATH'].'www/php/private/user/security.php'); 
    // require our registry
    require_once(CONTROLLER_URL.'/jphpController.php');
    
    $registry = JPHPController::singleton();
    
    $registry->storeObject('profile','profile');
    $registry->getObject('profile')->generateOutput();
    exit();
	
	
	
	

?>