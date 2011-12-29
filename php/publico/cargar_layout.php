<?php

	$oSmarty->template_dir = DIRECTORIO_PLANTILLAS."publico/layout";
	//Asignamos las plantillas que vamos a utilizar
	$oSmarty->assign('HEADER',$oSmarty->fetch('cabecera.tpl'));
	$oSmarty->assign('FOOTER',$oSmarty->fetch('pie.tpl'));
	
	//Mostramos la estructura principal
	$oSmarty->display('index.tpl');
?>