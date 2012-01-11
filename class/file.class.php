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
		private $sTablaArchivoVersion;
		
		function __construct(){				 
			$this->sTablaUsuario = TB_USUARIO;
			$this->sTablaUsuarioRol = TB_USUARIO_ROL;
			$this->sTablaArchivo = TB_ARCHIVO;
			$this->sTablaUsuarioArchivo = TB_USUARIO_ARCHIVO;	
			$this->sTablaArchivoVersion = TB_VERSION;	
		}
		
		// Método que nos devuelve los ficheros y carpetas del arbol raiz de un usuario
		// y -1 si no tiene resultado 
		public function getDocumentosPadreArbol($id_usuario, $id_padre){
			$result = "";
			$consulta_sql = "SELECT a.*, u.nombre as nombre_usuario, u.apellidos as apellidos_usuario, u.id_usuario FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuario." as u WHERE ";
			$consulta_sql .= "a.id_archivo_padre=".$id_padre." AND a.id_archivo IN (SELECT ua.id_archivo FROM ".$this->sTablaUsuarioArchivo." as ua WHERE ua.id_usuario='".$id_usuario."') ORDER BY a.fecha_update DESC;";
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result;
		}
		
		// Función que nos devuelve las 5 últimas actualizaciones de carpetas y ficheros
		public function getRecentUpdates($id_usuario){
			$result = "";
			$consulta_sql = "SELECT a.*, u.nombre as nombre_usuario, u.apellidos as apellidos_usuario, u.id_usuario FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuario." as u WHERE ";
			$consulta_sql .= " a.id_archivo IN (SELECT ua.id_archivo FROM ".$this->sTablaUsuarioArchivo." as ua WHERE ua.id_usuario='".$id_usuario."') ORDER BY a.fecha_update DESC LIMIT 0,5;";
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result;
		}
		
		
		// Función para obtener la configuración del usuario
		public function getActualSizeUser($id_usuario) {
				$result = 0;
			
				$consulta_sql = "SELECT SUM(size) as actual_size FROM ".$this->sTablaArchivoVersion." as v, ".$this->sTablaArchivo." as a , ".$this->sTablaUsuarioArchivo." as ua , ".$this->sTablaUsuario." as u WHERE v.id_archivo = a.id_archivo AND a.id_archivo = ua.id_archivo AND ua.id_usuario = u.id_usuario AND u.id_usuario=".$id_usuario.";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
				
				if ($rs->RecordCount() > 0){
					$result = $aResultado[0]['actual_size'];
				}
			
			return $result;
		}
		
		public function setFolderTree($id_usuario,$datos){
				global $config_urls;
				
				$result = false;
				//Primero comprobamos que no existe una carpeta con el mismo nombre en el raiz
				$consulta_sql = "SELECT a.nombre FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuarioArchivo." as ua WHERE a.tipo=0 AND a.id_archivo_padre='".$datos['id_padre']."' AND a.nombre = '".$datos['nombre']."' AND a.id_archivo = ua.id_archivo AND ua.id_archivo =".$datos['id_usuario'].";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
				if ($rs->RecordCount() == 0){
				
						$name_zone = Combos::getNameTimeZone(Settings::getSettingsVars('ID_ZONE'));
						$fecha = Combos::getDateTimeZone($name_zone);
						// Insertamos la información en la base de datos.
						$consulta_sql = "INSERT INTO ".$this->sTablaArchivo." (tipo,fecha, nombre, id_archivo_padre, privacidad, fecha_update) ";
						$consulta_sql .= " VALUES(0,'$fecha','".$datos['nombre']."', '".$datos['id_padre']."', 1 , '$fecha')";
						
						if (!$this->oBD->Execute($consulta_sql)){
							$result = false;
						}else{
							$id_file=$this->oBD->Insert_ID();
							
							if(!file_exists(BASE_PATH.'datas/users/'.$id_usuario.'/files')){
								mkdir(BASE_PATH.'datas/users/'.$id_usuario.'/files', 0777);
							}
							
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