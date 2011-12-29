<?php 
	class WebServices {
			
		/**
		 * Returns a JSON string object to the browser when hitting the root of the domain.
		 *
		 * @url GET /webservices/test
		 */
		public function test() {
			return "Texto de prueba.";
		}
		
		/**
		 * Login de usuario.
		 *
		 * @url POST /webservices/login
		 */
		public function login() {
			global $oBD_usuario;
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$licencia = $_POST['codigo_licencia'];
			
			if ($oBD_usuario->existLicencia($licencia) == 1) {
				// Comprobamos el login si es correcto.
				$resultado = $oBD_usuario->logearUsuarioEscritorio($username, $password, $licencia);
			}
			else {
				$resultado = -1; //no tiene asociada una licencia
			}

			return  array('solucion' => $resultado);
		}




	}
?>