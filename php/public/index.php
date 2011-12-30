<?php
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require_once '../../config/config.php';
	require_once BASE_PATH.'class/combos.class.php';
		
	// Incluímos la clase smarty.php.
	// Al incluir esta clase siempre tendremos disponibles en todas las plantillas automáticamente dos variables:
	// 			DIRECTORIO_SITIO									directorio del sitio.
	// 			RUTA_RELATIVA_HACIA_DIRECTORIO_RAIZ_SITIO			ruta relativa del script actual hacia el directorio raíz del sitio.	
	$oSmarty->assign('menu_principal','inicio');
	
	// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
	$oSmarty->template_dir = DIRECTORIO_PLANTILLAS."public/index";	
	$oSmarty->assign('LATERAL_IZQUIERDO','');

	
	//Para el título y la descripción de la página
	$metatitle = "uptobox.net";
	$metadescription = "uptobox.net";
	$oSmarty->assign('metatitle',$metatitle);
	$oSmarty->assign('metadescription',$metadescription);
	
	$oSmarty->assign('LATERAL_DERECHO', "");
	$oSmarty->assign('CONTENIDO_CENTRAL', $oSmarty->fetch('center_content.tpl'));
	require(BASE_PATH.'/php/public/load_layout.php')
?>