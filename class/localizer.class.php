<?php
/**
 * Clase Localizer
 * @package AleaClass
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */


class Localizer {

    private static $translations = array();

    /**
	 * Procedimiento para inicializar los idiomas
	 *
	 * @param $language idioma por defecto
	 */
     public static function init($language,$module='') {
            
        global $config_urls;
        if ($module==''){
            $temp_content = simplexml_load_file($config_urls['LOCALE']. $language . '/content.xml');
        }else{
            $temp_content = simplexml_load_file($config_urls['MODULE_URL'].$module.'/locale/'. $language . '/content.xml');
        }
        foreach ($temp_content as $key => $value){
            self::$translations[(string)$value['id']] = (string)$value;
        }

    }
    
    public static function init_ajax($language) {
            
        global $config_urls;
        
        $temp_content = simplexml_load_file($config_urls['LOCALE']. $language . '/content.xml');
        foreach ($temp_content as $key => $value){
            self::$translations[(string)$value['id']] = (string)$value;
        }

    }
    
     public static function getTranslate($tag){
        return self::$translations[$tag];
    }
    

     /**
	 * Procedimiento sustituir las cadenas del xml en su idioma.
	 *
	 * @param $params parámetros
	 * @param $name le pasamos por código una variable $smarty->assign('username', 'josemi'); y automáticamente dónde ponga en el xml ##username## sustituye por josemi
	 * @return $string devuelve una cadena de texto traducida
	 */
    public static function translate($params, $name, $smarty) {

         $translation = '';
         if( ! is_null($name) && array_key_exists($name, self::$translations)) {

            // get variables in translation text
            $translation = self::$translations[$name];
            preg_match_all('/##([^#]+)##/i', $translation, $vars, PREG_SET_ORDER);

            // replace with assigned smarty values
            foreach($vars as $var) {
                $translation = str_replace($var[0], $smarty->getTemplateVars($var[1]), $translation);
            }

        }

        return $translation;

    }

}
?>