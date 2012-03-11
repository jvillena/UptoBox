<?php
/**
 * Clase UserRol
 * @package uptosave
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */	
class UserRolClass {
		private $oBD;
		private $sTablaUsuarioRol;
		
		function __construct(){				 
			$this->sTablaUsuarioRol = TB_USUARIO_ROL;	
		}
	
		public function getRoles() {
			$aResultado = NULL;
			$consulta_sql = "SELECT * FROM ".$this->sTablaUsuarioRol.";";
			$rs = $this->oBD->Execute($consulta_sql);
			$aResultado = $rs->GetRows();
			$rs->Close();
			
			return $aResultado;
		}

		
		public function setBD($oBD) {
			$this->oBD = $oBD;				  
		}

	}
		
	$oUser_rol = new UserRolClass();
	$oUser_rol->setBD($oBD);
?>