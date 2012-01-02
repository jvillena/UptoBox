<?php 
/**
 * Clase Settings
 * @package UptoBox
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */

class Settings{
	
	
	/**
	 * getSettings allows you to get all settings var.
	 *
	 * @return Array
	 */
	public static function getSettings($vars='')
	{
		global $config_urls;
		if ($vars!='')
			return $config_urls[$vars];
			
		return $config_urls;
	}
	
	/**
	 * getSettingsVars allows you to get settings var configurations.
	 *
	 * @return Object
	 */
	public static function getSettingsVars($vars)
	{
		global $config_urls;

		return $config_urls[$vars];
	}
	
	
}

?>