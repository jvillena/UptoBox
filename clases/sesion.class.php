<?php
	/**
	 * Clase que implementa todo lo relacionado con la creación de sesiones seguras.
	 */
	class Sesion {
		// Variable que determina si se ha de incluir el nombre del explorador en la huella de seguridad de la sesión.
		var $incluir_nombre_explorador = true;
		// Bloques de la dirección IP incluídos en la huella de seguridad de la sesión.
		var $bloques_ip = 4;
		// Palabra segura.
		var $palabra_segura = 'ALEA_TECHNOLOGY';
		// Si se decide regener el identificador de sesión.
		var $regenerar_id = true;
	
		// Método para abrir la sesión.
		// Es conveniente utilizarlo sólo en los scripts de login, para inciar la sesión es mejor utilizar el método declarado abajo.
		function aperturaSesion() {
			@session_start();
			// Almacenamos la huella de la sesión.
			$_SESSION['sesion_huella'] = $this->_sesionHuella();
			// Regeneramos la id.
			$this->_regenerarId();
		}
		
		// Método para iniciar la sesión.
		function inicioSesion() {
			session_start();
		}
		
		// Método para cerrar la sesión actual.
		function cierreSesion() {
			session_unset ();
			session_destroy ();
	 	}
	
		// Método para comprobar la sesión.
		function comprobarSesion() {
						
			return (isset($_SESSION['sesion_huella']) && $_SESSION['sesion_huella'] == $this->_sesionHuella());
		}
		
		function obtenerRolUsuarioLogueado(){
			return ($_SESSION['datos_usuario']['id_rol']);
		}
	
		// Función interna. Devuelve la huella de la sesión codificada en MD5.
		function _sesionHuella() {
			$fingerprint = $this->palabra_segura;
			if ($this->incluir_nombre_explorador) {
				$fingerprint .= $_SERVER['HTTP_USER_AGENT'];
			}
			if ($this->bloques_ip) {
				$num_blocks = abs(intval($this->bloques_ip));
				// No podremos incluir más de 4 bloques.
				if ($num_blocks > 4) {
					$num_blocks = 4;
				}
				$blocks = explode('.', $_SERVER['REMOTE_ADDR']);
				for ($i = 0; $i < $num_blocks; $i++) {
					$fingerprint .= @$blocks[$i].'.';
				}
			}
			return md5($fingerprint);
		}
	
		// Función interna. Regenera la id de la sesión si es posible.
		function _regenerarId() {
			if ($this->regenerar_id && function_exists('session_regenerate_id')) {
				// Distinguimos versiones de php para las llamadas al método de session_regenerar_id.
				if (version_compare('5.1.0', phpversion(), '>=')) {
					//session_regenerate_id(true);
				} 
				else {
					//session_regenerate_id();
				}
			}
		}
		
       	// Devuelve un array con los objetos de la sesión actual o null en caso de no existir.
	   	public static function getSesion($xVar) {
		   	if(isset($_SESSION)) {
		       	if (!array_key_exists ($xVar, $_SESSION)) {
		       		$resultado = null;
		       	}
		       	else {
		            $resultado = $_SESSION[$xVar];
		       	}
		   	}
		   	else {
		   		$resultado = null;	
		   	}
		   	
	       	return $resultado;
       }
	}
	
	$oSesion = new Sesion();
?>