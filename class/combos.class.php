<?php
/**
 * Clase Combos
 * @package uptobox
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */
class Combos{

	
	public static function getPaises($idioma=7,$id_pais=0){
		
		global $oBD;
		
		//Obtenemos las categorías padre
		$sql="SELECT * FROM ".TB_PAISES." WHERE id_idioma=$idioma AND activo=1 ORDER BY nombre";
		if($id_pais!=0){
			$sql.=" AND id=$id_pais";
		}
		$rs=$oBD->Execute($sql);
		$paises=$rs->GetRows();
		
		return $paises;
	}
	
	public static function getTodosPaises($idioma=7,$id_pais=0){
		global $oBD;
		
		//Obtenemos las categorías padre
		$sql="SELECT * FROM ".TB_PAISES." WHERE id_idioma=$idioma ORDER BY nombre";
		if($id_pais!=0){
			$sql.=" AND id=$id_pais";
		}
		$rs=$oBD->Execute($sql);
		$paises=$rs->GetRows();
		
		return $paises;
	}
	
	public static function cambiarEstadoPais($id_pais, $activo){
		global $oBD;
		$sql = "UPDATE ".TB_PAISES." SET activo=$activo WHERE id=$id_pais";
		$rs=$oBD->Execute($sql);
	}
	
	public static function getPais($id_pais, $idioma=7) {
		global $oBD;
	
		//Obtenemos las categorías padre
		$sql="SELECT * FROM ".TB_PAISES." WHERE id_idioma=$idioma AND id=$id_pais";
		$rs=$oBD->Execute($sql);
		$paises=$rs->GetRows();
	
		return $paises[0];
	}	
	
	public static function getRegiones($idioma=7,$id_pais=0){
		global $oBD;
		
		//Obtenemos las categorías padre
		$sql="SELECT * FROM ".TB_REGIONES." WHERE id_idioma=$idioma";
		if($id_pais!=0){
			$sql.=" AND id_pais=$id_pais";
		}
		$rs=$oBD->Execute($sql);
		$regiones=$rs->GetRows();
		
		return $regiones;
	}
	
	public static function getRegion($id_region, $idioma=7) {
		global $oBD;
	
		//Obtenemos las categorías padre
		$sql="SELECT * FROM ".TB_REGIONES." WHERE id_idioma=$idioma AND id=$id_region";
		$rs=$oBD->Execute($sql);
		$regiones=$rs->GetRows();
	
		return $regiones[0];
	}	
	
	public static function getLocalidades($idioma=7,$id_region=0){
		global $oBD;
		
		//Obtenemos las categorías padre
		$sql="SELECT * FROM ".TB_LOCALIDADES." WHERE id_idioma=$idioma";
		if($id_region!=0){
			$sql.=" AND id_region=$id_region";
		}
		$rs=$oBD->Execute($sql);
		$localidades=$rs->GetRows();
		return $localidades;
	}
	
	public static function getLocalidad($id_localidad, $idioma=7) {
		global $oBD;
	
		//Obtenemos las categorías padre
		$sql="SELECT * FROM ".TB_LOCALIDADES." WHERE id_idioma=$idioma AND id=$id_localidad";
		$rs=$oBD->Execute($sql);
		$localidades=$rs->GetRows();
		
		return $localidades[0];
	}	
	
	public static function getAllLanguages(){
		
		global $oBD;
		
		//Obtenemos las categorías padre
		$sql="SELECT * FROM ".TB_IDIOMA;
		$rs=$oBD->Execute($sql);
		$languages=$rs->GetRows();
		
		return $languages;
	}
	
	PUBLIC static function getTimeZones(){
			
		global $oBD;
		
		//Obtenemos el tiempo horario de todas las zonas mundiales
		$sql = "SELECT z.zone_id,z.country_code, z.zone_name, tz.abbreviation, tz.gmt_offset, tz.dst
				FROM `timezone` tz JOIN `zone` z
				ON tz.zone_id=z.zone_id
				WHERE tz.time_start < UNIX_TIMESTAMP(UTC_TIMESTAMP())
				ORDER BY tz.time_start DESC;";
		$rs=$oBD->Execute($sql);
		$tz=$rs->GetRows();
		
		return $tz;
	}
	
	
	
}
?>