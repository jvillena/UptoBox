<?php 
/**
 * Clase Notification
 * @package uptobox
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */
require(BASE_PATH.'libs/phpmailer/class.phpmailer.php');
class NotificationClass{
	
	private $mail=null;
	
	function Notificacion(){
			
		
		$this->mail=new PHPMailer();
		
				
		$this->mail->AddReplyTo("info@uptosave.com","uptosave.com");
		
		$this->mail->SetFrom("info@uptosave.com","uptosave.com");
		
		$this->mail->AddReplyTo("info@uptosave.com","uptosave.com");
		
		$this->mail->AltBody = "Para ver este mensaje, por favor use un visor de HTML compatible.";
		
		
		
	}
	
	function emailRegistro($id_usuario){
		
		global $oBD,$oSmarty;
		
		$oSmarty->template_dir=DIRECTORIO_PLANTILLAS.'emails';
		
		$sql="SELECT * FROM ".TB_USUARIO." WHERE id=$id_usuario";
		
		$rs=$oBD->Execute($sql);
		
		$datos=$rs->GetRows();
		
		
		$oSmarty->assign('codigo_activacion',$datos[0]['codigo_activacion']);
		
		$email_registro=$oSmarty->fetch('email_registro.tpl');
		
		$this->mail->AddAddress($datos[0]['email'], utf8_decode($datos[0]['nombre']));
		
		
		$this->mail->Subject    = "Activacion de usuario de uptosave.com";
		
		$this->mail->MsgHTML($email_registro);
		
		$this->mail->Send();
		
		
	}
	
	function emailNuevaClave($id_usuario,$clave){
		
		global $oBD,$oSmarty, $oUsuario;
		
		$oSmarty->template_dir=DIRECTORIO_PLANTILLAS.'emails';
		
		$sql="SELECT * FROM ".TB_USUARIO." WHERE id=$id_usuario";
		
		$rs=$oBD->Execute($sql);
		
		$datos=$rs->GetRows();
		
		
		$oSmarty->assign('clave',$clave);
		
		$email_registro=$oSmarty->fetch('email_clave_nueva.tpl');
		
		$this->mail->AddAddress($datos[0]['email'], utf8_decode($datos[0]['nombre']));
		
		$this->mail->Subject    = "Recuperacion de su nueva clave en uptosave.com";
		
		$this->mail->MsgHTML($email_registro);
		
		$this->mail->Send();
		
		
	}
	
	function emailMensajeEnviadoUsuario($id_usuario, $id_objeto){
		
		global $oBD,$oSmarty;
		
		$oSmarty->template_dir=DIRECTORIO_PLANTILLAS.'emails';
		
		$sql="SELECT * FROM ".TB_USUARIO." WHERE id=$id_usuario";
		$rs=$oBD->Execute($sql);
		$datos=$rs->GetRows();
		
		$sqlObjeto="SELECT titulo FROM ".TB_OBJETO." WHERE id=$id_objeto";
		$rsObjeto=$oBD->Execute($sqlObjeto);
		$datosObjeto=$rsObjeto->GetRows();
		
		$oSmarty->assign('nombre_usuario',utf8_decode($datos[0]['nombre']));
		$oSmarty->assign('titulo_objeto',utf8_decode($datosObjeto[0]['titulo']));
		
		$email_registro=$oSmarty->fetch('email_envio_mensaje.tpl');
		
		$this->mail->AddAddress($datos[0]['email'], $datos[0]['nombre']);
		
		$this->mail->Subject    = "Confirmacion de envio de mensaje en uptosave.com";
		
		$this->mail->MsgHTML($email_registro);
		
		$this->mail->Send();
		
		
	}
	
	
	function emailMensajeRecibidoUsuario($id_usuario, $id_objeto){
		
		global $oBD,$oSmarty;
		
		$oSmarty->template_dir=DIRECTORIO_PLANTILLAS.'emails';
		
		$sql="SELECT * FROM ".TB_USUARIO." WHERE id=$id_usuario";
		$rs=$oBD->Execute($sql);
		$datos=$rs->GetRows();
		
		$sqlObjeto="SELECT titulo FROM ".TB_OBJETO." WHERE id=$id_objeto";
		$rsObjeto=$oBD->Execute($sqlObjeto);
		$datosObjeto=$rsObjeto->GetRows();
		
		$oSmarty->assign('nombre',utf8_decode($datos[0]['nombre']));
		$oSmarty->assign('titulo_objeto',utf8_decode($datosObjeto[0]['titulo']));
		
		$email_registro=$oSmarty->fetch('email_notificacion_mensaje.tpl');
		
		$this->mail->AddAddress($datos[0]['email'], utf8_decode($datos[0]['nombre']));
		
		$this->mail->Subject    = "Has recibido un nuevo mensaje en uptosave.com";
		
		$this->mail->MsgHTML($email_registro);
		
		$this->mail->Send();
		
		
	}
	
	function emailSuscripcionCercaCaducidad($id_usuario,$fecha_fin){
		
		global $oBD,$oSmarty;
		
		$oSmarty->template_dir=DIRECTORIO_PLANTILLAS.'emails';
		
		$sql="SELECT * FROM ".TB_USUARIO." WHERE id=$id_usuario";
		$rs=$oBD->Execute($sql);
		$datos=$rs->GetRows();
		
		$oSmarty->assign('nombre',utf8_decode($datos[0]['nombre']));
		$oSmarty->assign('fecha_fin',$fecha_fin);
		
		$email_registro=$oSmarty->fetch('email_notificacion_cerca_caducidad.tpl');
		
		$this->mail->AddAddress($datos[0]['email'], utf8_decode($datos[0]['nombre']));
		
		$this->mail->Subject    = "uptosave.com - Suscripcion cerca de vencimiento.";
		
		$this->mail->MsgHTML($email_registro);
		
		$this->mail->Send();
		
		
	}
	
	function emailSuscripcionCaducadas($id_usuario,$fecha_fin){
		
		global $oBD,$oSmarty;
		
		$oSmarty->template_dir=DIRECTORIO_PLANTILLAS.'emails';
		
		$sql="SELECT * FROM ".TB_USUARIO." WHERE id=$id_usuario";
		$rs=$oBD->Execute($sql);
		$datos=$rs->GetRows();
		
		$oSmarty->assign('nombre',utf8_decode($datos[0]['nombre']));
		$oSmarty->assign('fecha_fin',$fecha_fin);
		
		$email_registro=$oSmarty->fetch('email_notificacion_caducada.tpl');
		
		$this->mail->AddAddress($datos[0]['email'], utf8_decode($datos[0]['nombre']));
		
		$this->mail->Subject    = "uptosave.com - Suscripcion expirada.";
		
		$this->mail->MsgHTML($email_registro);
		
		$this->mail->Send();
		
		
	}
	
	function emailMensajeEnviadoNOUsuario($id_objeto, $datos){
		
		global $oBD,$oSmarty;
		
		$oSmarty->template_dir=DIRECTORIO_PLANTILLAS.'emails';
		
		$oSmarty->assign('mensaje',utf8_decode($datos['texto']));
		$oSmarty->assign('asunto',utf8_decode($datosObjeto['asunto']));
		
		$email_registro=$oSmarty->fetch('email_notificacion_mensaje_nousuario.tpl');
		
		$this->mail->AddAddress($datos['email'], "Usuario de uptosave.com");
		
		$this->mail->Subject    = "Has recibido un nuevo mensaje de un usuario de uptosave.com";
		
		$this->mail->MsgHTML($email_registro);
		
		$this->mail->Send();
		
		
	}
	
	
	
	function emailMensajeContacto($nombre, $email, $telefono, $consulta) {
		global $oSmarty;
		
		$oSmarty->template_dir = DIRECTORIO_PLANTILLAS.'emails';
		$oSmarty->assign('nombre', $nombre);
		$oSmarty->assign('email', $email);
		$oSmarty->assign('telefono', $telefono);
		$oSmarty->assign('consulta', $consulta);
		
		$email_contacto = $oSmarty->fetch('email_contacto.tpl');
		$this->mail->AddAddress(EMAIL_ENVIO_PETICIONES_CONTACTO);
		$this->mail->Subject = "Petición de contacto uptosave.com";
		$this->mail->MsgHTML($email_contacto);
		
		return $this->mail->Send();
	}	
	
	function emailMensajeTrabaja($nombre, $email, $telefono, $consulta, $archivo=0) {
		global $oSmarty;
		
		$oSmarty->template_dir = DIRECTORIO_PLANTILLAS.'emails';
		$oSmarty->assign('nombre', $nombre);
		$oSmarty->assign('email', $email);
		$oSmarty->assign('telefono', $telefono);
		$oSmarty->assign('consulta', $consulta);
		// Si existe fichero lo incorporamos al email.
		if ($archivo != 0) {
			$this->mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
			$oSmarty->assign('archivo', '1');
		}
		$email_trabaja = $oSmarty->fetch('email_trabaja_nosotros.tpl');
		$this->mail->AddAddress(EMAIL_ENVIO_PETICIONES_TRABAJO);
		$this->mail->Subject = "Peticion de trabajo en uptosave.com";
		$this->mail->MsgHTML($email_trabaja);
		
		return $this->mail->Send();
	}	
	
	
}

$oNotification=new NotificationClass();

?>