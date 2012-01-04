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
		public function getDocumentosPadreArbol($id_usuario, $id_padre){
			$result = "";
			$consulta_sql = "SELECT a.*, u.nombre as nombre_usuario, u.apellidos as apellidos_usuario, u.id_usuario FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuario." as u WHERE ";
			$consulta_sql .= "a.id_archivo_padre=".$id_padre." AND a.id_archivo IN (SELECT ua.id_archivo FROM ".$this->sTablaUsuarioArchivo." as ua WHERE ua.id_usuario='".$id_usuario."');";
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result;
		}
		
		public function setFolderTree($id_usuario,$datos){
				$result = false;
				//Primero comprobamos que no existe una carpeta con el mismo nombre en el raiz
				$consulta_sql = "SELECT a.nombre FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuarioArchivo." as ua WHERE a.tipo=0 AND a.id_archivo_padre='".$datos['id_padre']."' AND a.nombre = '".$datos['nombre']."' AND a.id_archivo = ua.id_archivo AND ua.id_archivo =".$datos['id_usuario'].";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
				if ($rs->RecordCount() == 0){
				
						$fecha = date("Y-m-d H:i:s");
						// Insertamos la información en la base de datos.
						$consulta_sql = "INSERT INTO ".$this->sTablaArchivo." (tipo,fecha, nombre, id_archivo_padre, privacidad) ";
						$consulta_sql .= " VALUES(0,'$fecha','".$datos['nombre']."', '".$aDatos['id_padre']."', 1 )";
						
						if (!$this->oBD->Execute($consulta_sql)){
							$result = false;
						}else{
							$id_file=$this->oBD->Insert_ID();
						
							if(!file_exists(BASE_PATH.'datas/users/'.$id_usuario.'/files/'.$id_file)){
								mkdir(BASE_PATH.'datas/users/'.$id_usuario.'/files/'.$id_file, 0777);
							}
							
							$consulta_sql = "INSERT INTO ".$this->sTablaUsuarioArchivo." (id_usuario, id_archivo, propietario) ";
							$consulta_sql .= " VALUES($id_usuario, $id_file, 1 )";
							
							if (!$this->oBD->Execute($consulta_sql)){
								$result = false;
							}else{
								$result = $id_file;
							}
						}
				}else{
					return $result;
				}
				
				return $result;
		}
		
		public function setBD($oBD) {
			$this->oBD = $oBD;				  
		}
		
		
		

		
		
		

	}
	
	
	
	
	
	
	$oFile = new FileClass();
	$oFile->setBD($oBD);
?>