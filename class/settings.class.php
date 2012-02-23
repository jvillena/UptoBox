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
	
	/**
	 * setSettingsVars allows you to get settings var configurations.
	 *
	 * @return Object
	 */
	public static function setSettingsVars($vars, $value)
	{
		global $config_urls;

		$config_urls[$vars] = $value;
		
	}
	
	
	/**
	 * ByteSize allows convert bytes in GB, MB & KB.
	 * @params $bytes 
	 * @return Object
	 */
	public static function getByteSize($bytes) {
    $size = $bytes / 1024;
    if($size < 1024){
        $size = number_format($size, 2);
        $size .= ' KB';
        }
    else
        {
        if($size / 1024 < 1024)
            {
            $size = number_format($size / 1024, 2);
            $size .= ' MB';
            }
        else if ($size / 1024 / 1024 < 1024)
            {
            $size = number_format($size / 1024 / 1024, 2);
            $size .= ' GB';
            }
        }
    return $size;
	}
	
	
}

?>