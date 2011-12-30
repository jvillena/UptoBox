<?php
	/**
	 * 
	 * Función que unifica el mostrado de datos (Array/String) 
	 * y formatea el array al mostrarlo por pantalla
	 * @param $var Array/String
	 */
	function echo2($var){

	
		if(is_string($var)){
			echo($var);
			echo("<br>");
			
		}
		else{
			echo "<pre>";	
			print_r($var);
			echo "</pre>";
		}
			
		
	}
	
	function mostrar_error($error){
		
		echo('<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>');
		echo2($error);
		
	}
	function urls_amigables($url) {

		// Tranformamos todo a minusculas
		
		//Rememplazamos caracteres especiales latinos
		
		/*$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		
		$url = str_replace ($find, $repl, $url);
		
		// Añaadimos los guiones
		
		$find = array(' ', '&', '\r\n', '\n', '+');
		$url = str_replace ($find, '-', $url);
		
		// Eliminamos y Reemplazamos demás caracteres especiales
		
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		
		$repl = array('', '-', '');
		
		$url = preg_replace ($find, $repl, $url);
		
		return $url;*/
		
		
		
		
		$str_noamigable = trim($url);
  		$str_noamigable = quitarAcentos($str_noamigable);		
  		$str_noamigable = mb_strtolower($str_noamigable, 'UTF-8');
  
  		$str_noamigable = str_replace("+", " ", $str_noamigable);
  		$str_noamigable = str_replace(":", " ", $str_noamigable);
  		$str_noamigable = str_replace("/", " ", $str_noamigable);
  		$str_noamigable = str_replace("-", " ", $str_noamigable);
  		$str_noamigable = str_replace(",", "", $str_noamigable);
  		$str_noamigable = str_replace(".", "", $str_noamigable);
  		$str_noamigable = str_replace(" de ", "-", $str_noamigable);
  		$str_noamigable = str_replace(" la ", "-", $str_noamigable);
  		$str_noamigable = str_replace(" el ", "-", $str_noamigable);
  		$str_noamigable = str_replace(" y ", "-", $str_noamigable);
  		$str_noamigable = str_replace("   ", " ", $str_noamigable);
  		$str_noamigable = str_replace("  ", " ", $str_noamigable);
  		$str_noamigable = str_replace(" ", "-", $str_noamigable);
  
  		return $str_noamigable;
	
	}
	
	function escape($cadena_entrada)
	{
		$cadena_salida="";
		$longitud=strlen($cadena_entrada);
		for($cuenta=0; $cuenta<$longitud; $cuenta++)
		{
		$cadena_salida.="%".dechex(ord(substr($cadena_entrada,$cuenta,1)));
		}
		return $cadena_salida;
	} 
	
	function caracteres_html($texto){
 	  $texto = htmlentities($texto, ENT_NOQUOTES, 'UTF-8'); // Convertir caracteres especiales a entidades
 	  $texto = htmlspecialchars_decode($texto, ENT_NOQUOTES); // Dejar <, & y > como estaban
 	  return $texto;
 	}
	
	function unescape($cadena_entrada)
	{
		$cadena_salida="";
		$longitud=strlen($cadena_entrada);
		if(($longitud%3)==0)
		{
			for($cuenta=0; $cuenta<$longitud; $cuenta+=3)
			{
				$cadena_salida.=chr(hexdec(substr($cadena_entrada,$cuenta+1,2)));
			}
			return $cadena_salida;
		}
		else{
		return "Cadena no valida";
		}
	
	}
	
	function limpiar_caracteres_especiales($s){
		$s = utf8_decode($s);
		$s = str_replace(array('á','à','â','ã','ª'),"a",$s);
		$s = str_replace(array('Á','À','Â','Ã'),"A",$s);
		$s = str_replace(array('Í','Ì','Î'),"I",$s);
		$s = str_replace(array('í','ì','î'),"i",$s);
		$s = str_replace(array('é','è','ê'),"e",$s);
		$s = str_replace(array('É','È','Ê'),"E",$s);
		$s = str_replace(array('ó','ò','ô','õ','º'),"o",$s);
		$s = str_replace(array('Ó','Ò','Ô','Õ'),"O",$s);
		$s = str_replace(array('ú','ù','û'),"u",$s);
		$s = str_replace(array('Ú','Ù','Û'),"U",$s);
		$s = str_replace("ç","c",$s);
		$s = str_replace("Ç","C",$s);
		$s = str_replace("[ñ]","n",$s);
		$s = str_replace("[Ñ]","N",$s);
		return $s;
	}
	
	function quitarAcentos($palabra) {
	  	$palabra = str_replace("á", "a", $palabra);	
	  	$palabra = str_replace("Á", "A", $palabra);	
	  	$palabra = str_replace("é", "e", $palabra);	
	 	$palabra = str_replace("É", "E", $palabra);	
	  	$palabra = str_replace("í", "i", $palabra);	
	  	$palabra = str_replace("Í", "I", $palabra);	
	  	$palabra = str_replace("ó", "o", $palabra);	
	  	$palabra = str_replace("Ó", "O", $palabra);	
	  	$palabra = str_replace("ú", "u", $palabra);	
	  	$palabra = str_replace("Ú", "U", $palabra);	
	  	$palabra = str_replace("ñ", "n", $palabra);	
	  	$palabra = str_replace("Ñ", "N", $palabra);	
	
	  	return $palabra;
	}
	
	function calculaMeses($fechaInicio, $fechaActual){
//		$fechaActualDesglosada = explode("-",$fechaActual);
//		$fechaInicioDesglosada = explode("-",$fechaInicio);
//		
//		$diaActual = $fechaActualDesglosada[2];//substr($fechaActual, 0, 2);  
//		$mesActual = $fechaActualDesglosada[1];//substr($fechaActual, 3, 5);  
//		$anioActual = $fechaActualDesglosada[0];//substr($fechaActual, 6, 10);  
//		$diaInicio = $fechaInicioDesglosada[2];//substr($fechaInicio, 0, 2);  
//		$mesInicio = $fechaInicioDesglosada[1];//substr($fechaInicio, 3, 5);  
//		$anioInicio = $fechaInicioDesglosada[0];//substr($fechaInicio, 6, 10);  
//		$b = 0;  
//		$mes = $mesInicio-1;  
//		if($mes==2){  
//			if(($anioActual%4==0 && $anioActual%100!=0) || $anioActual%400==0){  
//				$b = 29;  
//			}else{  
//				$b = 28;  
//			}  
//		} else if($mes<=7){  
//		if($mes==0){  
//		 $b = 31;  
//		} else if($mes%2==0){  
//		  $b = 30;  
//		  }  
//		  else{  
//		  $b = 31;  
//		  }  
//		  }  
//		  else if($mes>7){  
//		  if($mes%2==0){  
//		  $b = 31;  
//		  }  
//		  else{  
//		  $b = 30;  
//		  }  
//		  }  
//		   if(($anioInicio>$anioActual) || ($anioInicio==$anioActual && $mesInicio>$mesActual) || ($anioInicio==$anioActual && $mesInicio == $mesActual && $diaInicio>$diaActual)){  
//		  	echo "La fecha de inicio ha de ser anterior a la fecha Actual";  
//		  }else{  
//		  if($mesInicio <= $mesActual){  
//		  	  $anios = $anioActual - $anioInicio;  
//			  if($diaInicio <= $diaActual){  
//				  $meses = $mesActual - $mesInicio;  
//				  $dies = $diaActual - $diaInicio;  
//			  }else{  
//				  if($mesActual == $mesInicio){  
//				  	$anios = $anios - 1;  
//				  }  
//					  $meses = ($mesActual - $mesInicio - 1 + 12) % 12;  
//					  $dies = $b-($diaInicio-$diaActual);  
//			  }  
//		  }else{  
//		  	$anios = $anioActual - $anioInicio - 1;  
//			  if($diaInicio > $diaActual){  
//				  $meses = $mesActual - $mesInicio -1 +12;  
//				  $dies = $b - ($diaInicio-$diaActual);  
//			  }else{  
//				  $meses = $mesActual - $mesInicio + 12;  
//				  $dies = $diaActual - $diaInicio;  
//			  }  
//		  }  
//		  return $meses;  
	}
	
?>