<?php
	class BD_usuario_rol {
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
		
	$oBD_usuario_rol = new BD_usuario_rol();
	$oBD_usuario_rol->setBD($oBD);
?>