<?php
/**
 * Clase File
 * @package uptobox
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */
class FileClass {
		private $oBD;
		private $sTablaUsuario;
		private $sTablaUsuarioRol;
		private $sTablaArchivo;
		private $sTablaUsuarioArchivo;
		
		function __construct(){				 
			$this->sTablaUsuario = TB_USUARIO;
			$this->sTablaUsuarioRol = TB_USUARIO_ROL;
			$this->sTablaArchivo = TB_ARCHIVO;
			$this->sTablaUsuarioArchivo = TB_USUARIO_ARCHIVO;		
		}
		
		// Método que nos devuelve los ficheros y carpetas del arbol raiz de un usuario
		// y -1 si no tiene resultado 
		public function getDocumentosPadreArbol($id_usuario){
			$result = "";
			$consulta_sql = "SELECT * FROM ".$this->sTablaArchivo." as a WHERE ";
			$consulta_sql .= "a.id_archivo_padre=-1 AND a.id_archivo = (SELECT ua.id_archivo FROM ".$this->sTablaUsuarioArchivo." as ua WHERE ua.id_usuario='".$id_usuario."');";
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result;
		}
		
		public function setFolderTree($id_usuario,$datos){
				$result = false;
				//Primero comprobamos que no existe una carpeta con el mismo nombre en el raiz
				$consulta_sql = "SELECT a.nombre FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuarioArchivo." as ua WHERE a.tipo=0 AND a.id_archivo_padre='".$datos['id_padre']."' AND a.nombre='".$datos['nombre']."' AND a.id_archivo = ua.id_archivo AND ua.id_archivo =".$datos['id_usuario'].";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
				
				if ($rs->RecordCount() > 0){
				
					
				
						// Insertamos la información en la base de datos.
						$consulta_sql = "INSERT INTO ".$this->sTablaUsuario." (codigo_activacion,permiso_acceso,id_rol, nombre, email, password, fecha_alta, privado,id_pais) ";
						$consulta_sql .= " VALUES('$codigo_activacion',0,".ID_ROL_USUARIO.", '".$aDatos['nombre'];
						$consulta_sql .= "', '".$aDatos['email']."', '".$clave_encriptada."','".$fecha."','0', '".$aDatos['select_pais']."')";
						
						if (!$this->oBD->Execute($consulta_sql)){
							$resultado = -2;
						}
						
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
				}else{
					return $result;
				}
		}
		
		public function setBD($oBD) {
			$this->oBD = $oBD;				  
		}
		
		
		

		
		
		

	}
	
	
	
	
	
	
	$oFile = new FileClass();
	$oFile->setBD($oBD);
?>