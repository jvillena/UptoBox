<?php
/**
 * Clase Combos
 * @package uptosave
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
		$sql="SELECT * FROM ".TB_IDIOMA." WHERE activo=1";
		$rs=$oBD->Execute($sql);
		$languages=$rs->GetRows();
		
		return $languages;
	}
	
	public static function getTimeZones(){
			
		global $oBD;
		
		//Obtenemos el tiempo horario de todas las zonas mundiales
		$sql = "SELECT DISTINCT(z.zone_id),z.country_code, z.zone_name, tz.abbreviation, tz.gmt_offset, tz.dst
				FROM `timezone` tz JOIN `zone` z
				ON tz.zone_id=z.zone_id
				WHERE tz.time_start < UNIX_TIMESTAMP(UTC_TIMESTAMP())
				ORDER BY (tz.gmt_offset/3600) DESC;";
		$rs=$oBD->Execute($sql);
		$tz=$rs->GetRows();
		for ($i=0; $i<count($tz); $i++){
				
			if ( $tz[$i]['gmt_offset'] >= 0){
				$result = round($tz[$i]['gmt_offset']/3600);
				$tz[$i]['gmt'] = "GMT+".$result.":00";
			}else{
				$result = round($tz[$i]['gmt_offset']/3600);
				$tz[$i]['gmt'] = "GMT".$result.":00";
			} 
				
		}
		
		return $tz;
	}
	
	public static function getNameTimeZone($id_zone){
			
		global $oBD;
		
		$result = "";
		//Obtenemos el tiempo horario de todas las zonas mundiales
		$sql = "SELECT z.zone_name
				FROM `zone` z
				WHERE z.zone_id = $id_zone;";
		$rs=$oBD->Execute($sql);
		$result=$rs->GetRows();
		if ($rs->RecordCount()>0){
			$result = $result[0]['zone_name'];
		}
		return $result;	
	}
	
	public static function getTimeZonesUser($id_zone){
		global $oBD;
		//Obtenemos el tiempo horario de una zona en particular
		$sql = "SELECT z.zone_id,z.country_code, z.zone_name, tz.abbreviation, tz.gmt_offset, tz.dst
		FROM `timezone` tz JOIN `zone` z
		ON tz.zone_id=z.zone_id
		WHERE tz.time_start < UNIX_TIMESTAMP(UTC_TIMESTAMP()) AND z.zone_id=$id_zone
		ORDER BY tz.time_start DESC LIMIT 1;";
		$rs=$oBD->Execute($sql);
		$tz=$rs->GetRows();
		
		return $tz;
	}
	
	public static function getDateTimeZone($name_zone){
		global $oBD;
		date_default_timezone_set($name_zone);
		date_default_timezone_get();
		$abbr = date('T');
		//Obtenemos la hora y fecha de una zona horaria
		$sql = "SELECT FROM_UNIXTIME(UNIX_TIMESTAMP(UTC_TIMESTAMP()) + tz.gmt_offset, '%Y-%m-%d %H:%i:%s') AS local_time
				FROM `timezone` tz JOIN `zone` z
				ON tz.zone_id=z.zone_id
				WHERE tz.time_start < UNIX_TIMESTAMP(UTC_TIMESTAMP()) AND z.zone_name='$name_zone' AND tz.abbreviation='$abbr'
				ORDER BY tz.time_start DESC LIMIT 1;";
		$rs=$oBD->Execute($sql);
		$tz=$rs->GetRows();
		
		return $tz[0]['local_time'];
	}


	public static function getIdioma($id_idioma){
		global $oBD;
		//Obtenemos el tiempo horario de una zona en particular
		$sql = "SELECT * FROM ".TB_IDIOMA." WHERE id=$id_idioma and activo=1;";
		$rs=$oBD->Execute($sql);
		$language=$rs->GetRows();
		
		return $language[0];
	}
	
	
	
	
}
?>