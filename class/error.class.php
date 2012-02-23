<?php

/**
 * Clase Error
 * @package AleaClass
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */

class Error{
	
	
	private static $sUrl404;
	
	private static $sUrlIndex;
	
	private static $sUrlAccesoRestringido;
	
	private static $sUrlUsuarioNoRegistrado;
	
	public function __construct(){
		
		$sUrl404 = "";
		
		$sUrlIndex = APP_PATH;
		
		$sUrlAccesoRestringido = ERROR_ACCESS;	
		
		$sUrlUsuarioNoRegistrado = ERROR_ACCESS;
		
		
	}
	
	public static function redirect404(){
		global $sUrl404;
		header("Location:". $sUrl404);
	}
	
	public static function redirectIndex(){
		global $sUrlIndex;
		Tools::redirectPage($sUrlIndex);
	}
	
	
    public static function redirectAccesoRestringido(){
        global $sUrlAccesoRestringido;
        header("Location:". $sUrlAccesoRestringido);
    }

    public static function redirectUsuarioNoRegistrado(){

        Tools::redirectPage('login');

    }

    public static function redirectMessageError(){

        echo 'Error. Página no existe';

    }
	
	
}


?>