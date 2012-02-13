<?php
/**
 * Clase Tools
 * @package Uptobox
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */

class Tools{

	/**
	 * loaderClass allows you to add class at any time.
	 *
	 * @param mixed $filename
	 * @param array $path
	 * @return true
	 */
	public static function loaderClass($filename, $path='')
	{
		if (is_array($path))
		{
			foreach ($path as $path_file)
				self::loaderClass($filename,$path_file);
			return true;
		}
		if ($path!='' && file_exists($path.$filename)  ){
			require_once $path. $filename;
		}else{
			require_once  'class/'. $filename;
		}

		return true;
	}


	/**
	 * addCSS allows you to add stylesheet at any time.
	 *
	 * @param mixed $css_uri
	 * @param string $type Global in Css's BootBox or local that mean into css folder of the project
	 * @param string $media is useful when you have different devices (projection, screen, print, aural)
	 * @param string $name_module if type = module then $name_module has to be the name of the module to get the path
	 * @return true
	 */
	public static function addCSS($css_uri, $type='global', $media = 'screen', $name_module='')
	{
		global $css_styles, $config_urls, $css_modules_styles;

		if (is_array($css_uri))
		{
			foreach ($css_uri as $file)
				self::addCSS($file);
			return true;
		}
		if ($type=='global'){
			$css_uri = array( html_entity_decode("<link rel='stylesheet'  type='text/css' href='".$config_urls['BASE_URL']."css/".$css_uri."' media='".$media."' />"));
		}else if ($type=='module'){
			$css_uri = array(html_entity_decode("<link rel='stylesheet' type='text/css' href='".$config_urls['BASE_URL']."modules/".$name_module."/css/".$css_uri."' media='".$media."'  />"));
		}

		// Add files to JS Arrays
		if ($name_module!=''){
			if (is_array($css_modules_styles))
				$css_modules_styles[$name_module] = array_merge($css_modules_styles[$name_module] , $css_uri);
			else
				$css_modules_styles[$name_module]  = $css_uri;
		}else{

			if (is_array($css_styles))
				$css_styles = array_merge($css_styles, $css_uri);
			else
				$css_styles = $css_uri;
		}



		return true;
	}

	/**
	 * addJS allows you to add script at any time.
	 *
	 * @param mixed $js_uri
	 * @param string $type Global in JS's BootBox or local that mean into js folder of the project
	 * @param string $name_module if type = module then $name_module has to be the name of the module to get the path
	 * @return true
	 */
	public static function addJS($js_uri, $type='global',$name_module='')
	{
		global $js_scripts, $config_urls, $js_modules_scripts;

		if (is_array($js_uri))
		{
			foreach ($js_uri as $file)
				self::addJS($file);
			return true;
		}
		if ($type=='global'){
			$js_uri = array($config_urls['BASE_URL']."javascripts/".$js_uri);
		}else if ($type=='module'){
			$js_uri = array($config_urls['BASE_URL']."modules/".$name_module."/js/".$js_uri);
		}
		// Add files to JS Arrays
		if ($name_module!=''){
			if (is_array($js_modules_scripts)){
				$js_modules_scripts[$name_module] = array_merge($js_modules_scripts , $js_uri);
			}else{
				$js_modules_scripts[$name_module]  = $js_uri;
			}
		}else{

			if (is_array($js_scripts))
				$js_scripts = array_merge($js_scripts, $js_uri);
			else
				$js_scripts = $js_uri;
		}

		return true;
	}

	/**
	* RedirectPage the user redirect to a new url
	*
	* @param string $file launch to a new URL
	*/
	public static function redirectPage($file){
		global $config_urls;
		$url = explode('.',$file);
		header('Location: '.$config_urls['BASE_URL'].$file);
		exit();
	}

	/**
	* getMetaDescription create a description of web page
	* delete all html tags
	*
	* @param string $text web page
	*/
    public static function getMetaDescription($text) {
        $text = strip_tags($text);
        $text = trim($text);
        $text = substr($text, 0, 247);
        return $text."...";
    }

	/**
	* getMetaKeywords return all meta keywords of a web page
	*
	* @param string $text web page
	*/
    public static function getMetaKeywords($text) {
        // Limpiamos el texto
        $text = strip_tags($text);
        $text = strtolower($text);
        $text = trim($text);
        $text = preg_replace('/[^a-zA-Z0-9 -]/', ' ', $text);
        // extraemos las palabras
        $match = explode(" ", $text);
        // contamos las palabras
        $count = array();
        if (is_array($match)) {
            foreach ($match as $key => $val) {
                if (strlen($val)> 3) {
                    if (isset($count[$val])) {
                        $count[$val]++;
                    } else {
                        $count[$val] = 1;
                    }
                }
            }
        }
        // Ordenamos los totales
        arsort($count);
        $count = array_slice($count, 0, 10);
        return implode(", ", array_keys($count));
    }
    
    
    /**
    * getImageFromFile return output image
    *
    * @param string $id_user id of propietary
    * @param string $path Absolute path of the image
    * @param string $filename name of file
    * @param string $ext file extension
    * @param string $type $type of file
    * @param string $width $width of image
    * @param string $height $width of image 
    */
    public static function getImageFromFile($id_user, $path, $filename, $ext, $type, $parent_folder, $width='',  $height='', $id_file='0'){
            $width_tmp='';
            $height_tmp='';
            if ($width==''){
                  if ($height!=''){
                    $height_tmp = 'height='.$height;
                }
            }else{
                $width_tmp='width='.$width;
                if ($height!=''){
                    $height_tmp = '&amp;height='.$height;
                }
            }
            
            
            
        
            if ( ($type=='image/png') || ($type=='image/jpeg') || ($type=='image/gif') || ($type=='image/bmp')   ){
                if ($parent_folder==0){
                    
                    echo '<div id="div_'.$id_file.'" class="img_show"><img style="vertical-align:bottom" src="'.$path.'libs/php/rescalado_imagen/image.php/'.$path.'datas/users/'.$id_user.'/files/'.$filename.'.'.$ext.'?'.$width_tmp.$height_tmp.'&amp;image='.$path.'datas/users/'.$id_user.'/files/'.$filename.'.'.$ext.'" /></div>';
                }else{
                    echo '<div id="div_'.$id_file.'" class="img_show"><img style="vertical-align:bottom" src="'.$path.'libs/php/rescalado_imagen/image.php/'.$path.'datas/users/'.$id_user.'/files/'.$parent_folder.'/'.$filename.'.'.$ext.'?'.$width_tmp.$height_tmp.'&amp;image='.$path.'datas/users/'.$id_user.'/files/'.$parent_folder.'/'.$filename.'.'.$ext.'" /></div>';
                }
            }else if (($type=='files/doc') || ($type=='files/docx')){
                echo '<img style="vertical-align:bottom" src="'.$path.'images/icons/icon_file_doc.png"/>';
            }else if (  ($type=='files/pdf') ){
                 echo '<img style="vertical-align:bottom" src="'.$path.'images/icons/icon_file_pdf.png"/>';
            }else if (  ($type=='files/xls') || ($type=='files/csv') ){
                 echo '<img style="vertical-align:bottom" src="'.$path.'images/icons/icon_file_excel.png"/>';
            }else if (  ($type=='files/ppt') || ($type=='files/pptx') ){
                 echo '<img style="vertical-align:bottom" src="'.$path.'images/icons/icon_file_ppt.png"/>';                 
            }else if ( ($type=='files/zip')  || ($type=='files/rar')  ){
                echo '<img style="vertical-align:bottom" src="'.$path.'images/icons/icon_file_dat.png"/>';
              }else if ( ($type=='files/flv') || ($type=='files/swf')  ){
                echo '<img style="vertical-align:bottom" src="'.$path.'images/icons/icon_file_flv.png"/>';
            }else{
                echo '<img style="vertical-align:bottom" src="'.$path.'images/icons/icon_file.png"/>';
            }


    }
}

?>