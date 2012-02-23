<?php
/**
 * JPHP Framework
 * Index.php file to call loader file in core folder
 *
 * @version 0.1
 * @author José E. Villena
 */
require_once(dirname( __FILE__ ).'/application/core/config/config.php');
// We will use this to ensure scripts are not called from outside of the framework
define( "JPHP_SECURITY", true );
if ( (isset($_GET['name'])) && ($_GET['name'] == 'index')){
    $aDatosSesionUsuario=$oSesion->getSesion('datos_usuario');
    if( isset($aDatosSesionUsuario) ){
         include('www/php/private/user/init/index.php');
    }else{
    	include('www/php/public/index/index.php');
    }
}else if ( (isset($_GET['name'])) && ($_GET['name'] == 'login')){
	include('www/php/public/login/login.php');
}else if ( (isset($_GET['name'])) && ($_GET['name'] == 'logout')){
    include('www/php/private/logout.php');
}else if ( (isset($_GET['name'])) && ($_GET['name'] == 'login/verificate')){
    include('www/php/public/login/login_ajax.php');
}else if ( (isset($_GET['name'])) && ($_GET['name'] == 'user/files/create')){
    include('www/php/private/user/files/create_fold.php');
}else if ( (isset($_GET['name'])) && ($_GET['name'] == 'user/files/edit')){
    include('www/php/private/user/files/edit_folder.php');
}else if ( (isset($_GET['name'])) && ($_GET['name'] == 'user/files')){
    include('www/php/private/user/init/index.php');
}else if ( (isset($_GET['name'])) && ($_GET['name'] == 'user/profile')){
    include('www/php/private/user/profile/profile.php');
}else if ( (isset($_GET['id_root'])) && isset($_GET['name'])){
    include('www/php/private/user/init/index.php');
    
}else{
	 $aDatosSesionUsuario=$oSesion->getSesion('datos_usuario');
    if( isset($aDatosSesionUsuario) ){
         include('www/php/private/user/init/index.php');
    }else{
        include('www/php/public/index/index.php');
    }
}
//include 'application/core/index.php';
?>

