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
		
		public function setBD($oBD) {
			$this->oBD = $oBD;				  
		}
		
		
		

		
		
		

	}
	
	
	
	
	
	
	$oFile = new FileClass();
	$oFile->setBD($oBD);
?>