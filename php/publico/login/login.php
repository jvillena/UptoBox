<?php
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../../configuracion/configuracion.php');
	require(BASE_PATH.'clases/usuario.class.php');
	require(BASE_PATH.'clases/notificacion.class.php');
	require(BASE_PATH.'clases/combos.class.php');
	
	
	//Comprobamos el login
	if($oSesion->comprobarSesion()){
		$oError->redirectUsuario();
	}
	
	$oSmarty->assign('error_registro','');
	$oSmarty->assign('registro_ok','');
	
	//Activacion de cuenta
	if(isset($_GET['codigo_activacion'])){
		
		$id_usuario=$oUsuario->activarUsuarioCodigo($_GET['codigo_activacion']);
		if($id_usuario>0){
			
			$oUsuario->loguearUsuarioId($id_usuario);
			
			$oError->redirectUsuario();
			exit();
		}
		else{
			
			$oSmarty->assign('error_registro','El código de activacion no es válido, regístrese o recupere su contraseña para acceder al sistema');
		}
	}
	
	
	
	//Login
	if(isset($_POST['logueo'])){
		
		if($oUsuario->loguearUsuario($_POST['login'], $_POST['password'])== 1){
			if($oUsuario->administradorLogueado()){
				$oError->redirectAdministrador();
			}else{
				$oError->redirectUsuario();
			}
		}else{
			$oSmarty->assign('error_login','El usuario o la contraseña son incorrectos.');
		}
	}
	//Registro
	if(isset($_POST['registro'])){
		
		$resultado_registro=$oUsuario->registrarUsuario($_POST);
		
		if(!is_array($resultado_registro) ){
			if($resultado_registro>0){
				
				
				$oNotificaciones->emailRegistro($resultado_registro);
				$oSmarty->assign('registro_ok',"Se le ha enviado un email para confirmar su cuenta");
				
			
			}
			else{
				$error="Se produjo un error durante le registro";
				$oSmarty->assign('error_registro',$error);
			}
		
		}else{
			
			$oSmarty->assign('error_registro',$oUsuario->registrarUsuario($_POST));
		}
	}
	
	$metatitle = "uptobox.com - Login";
	$metadescription = "uptobox.com - Login";
	$oSmarty->assign('metatitle',$metatitle);
	$oSmarty->assign('metadescription',$metadescription);
		
	$oSmarty->assign('menu_principal','');
	
	$paises = $oCombos->getPaises(7);
	$oSmarty->assign('paises',$paises);
	
	// Asignamos la varable estilo para la utilización en la plantilla.
				
	
	// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
	$oSmarty->template_dir = DIRECTORIO_PLANTILLAS."publico/login";	
	$oSmarty->assign('LATERAL_DERECHO', "");
	
	$oSmarty->assign('CONTENIDO_CENTRAL',$oSmarty->fetch('contenido_central.tpl'));

	require(BASE_PATH.'/php/publico/cargar_layout.php')
	
	
	
	
?>