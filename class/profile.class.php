<?php 
/**
 * Clase Profile
 * @package uptobox
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */
class ProfileClass{
	
	function editProfile($id_usuario,$datos){
		
		global $oBD;
		
		$error=array();
		if($datos['nombre']==""){
			$error[]="Debe insertar un nombre";
		}
		if($datos['email']==""){
			$error[]="Debe insertar un email válido";
		}
		if($datos['password']!=""){
			if($datos['password2']!=$datos['password'] ){
				$error[]="Debe introducir la misma contraseña en los dos campos";
			}
		}
		
		if(count($error)==0){
			
			$contrasena="";
			if($datos['password2']!=""){
				$contrasena=md5($datos['password2']);
			}
			$sql="UPDATE ".TB_USUARIO." SET nombre='".$datos['nombre']."',apellidos='".$datos['apellidos']."',telefono='".$datos['telefono']."'";
											 
			
			if($contrasena!=""){
				$sql.=",clave='$contrasena' ";
			}
			
			$sql.=" WHERE id_usuario=$id_usuario";
			$oBD->Execute($sql);
			
			$error='ok';
			//if($datos['email']!=""){
				
			//	$sql="SELECT email FROM ".TB_USUARIO." WHERE id=$id_usuario";
				
			//	$rs=$oBD->Execute($sql);
			//	$datos_perfil_actual=$rs->GetRows();
				
			//	$email_anterior=$datos_perfil_actual[0]['email'];
				
				//if($email_anterior!=$datos['email']){
						
				//	$sql="DELETE FROM ".TB_CAMBIO_EMAIL." WHERE id_usuario=$id_usuario";
					
				//	$oBD->Execute($sql);
				//	$codigo="";
				//	for ($i=0; $i<40; $i++) {
				//	    $d=rand(1,30)%2;
				//	    $codigo.=$d ? chr(rand(65,90)) : chr(rand(48,57));
				//	} 
					
				//	$sql="INSERT INTO ".TB_CAMBIO_EMAIL." (id_usuario,email,codigo,fecha) 
				//				VALUES ($id_usuario,'".$datos['email']."','$codigo','".date('Y-m-d')."')";
					
				//	$oBD->Execute($sql);
					
					//$this->enviar_confirmacion_cambio_email($id_usuario);
					
				//	$error='email';
				//}
			//}
		}
		
		return $error;
		
	}
	
	function asociar_foto_usuario($id_usuario,$fotos){
			global $oBD;
			if(isset($fotos['foto_usuario'])){
				$ext = explode('.',$foto['foto_usuario']['name']);
				$nombre = "img".rand(0,999999999999999).".".$ext[count($ext)-1];
				$destino = BASE_PATH.'datas/users/'.$id_usuario.'/profile/'.$nombre ;
				if(!file_exists(BASE_PATH.'datas/users/'.$id_usuario)){
					mkdir(BASE_PATH.'datos/usuarios/'.$id_usuario, 0777);
					mkdir(BASE_PATH.'datos/usuarios/'.$id_usuario.'/profile', 0777);
				}
				if(move_uploaded_file ( $fotos['foto_usuario']['tmp_name'], $destino)){
					$sql = "UPDATE ".TB_USUARIO." SET ruta_foto='".$nombre."' WHERE id_usuario=$id_usuario";
					$oBD->Execute($sql);
				}
			}
		}
	
	function get($id_usuario){
		
		global $oBD;
		
		$sql="SELECT * FROM ".TB_USUARIO." WHERE id_usuario=$id_usuario";
		
		$rs=$oBD->Execute($sql);
		
		return $rs->GetRows();
	}
	
	
}

$oProfile=new ProfileClass();
?>