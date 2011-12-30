<?php

	$oSmarty->template_dir = DIRECTORIO_PLANTILLAS."public/layout";
	//Asignamos las plantillas que vamos a utilizar
	$oSmarty->assign('HEADER',$oSmarty->fetch('header.tpl'));
	$oSmarty->assign('FOOTER',$oSmarty->fetch('footer.tpl'));
	
	//Mostramos la estructura principal
	$oSmarty->display('index.tpl');
?>