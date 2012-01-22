<?php
/**
 * Clase User
 * @package uptobox
 * @author José E. Villena
 * @copyright Alea Technology
 * @version 1.0
 */
class UserClass {
		private $oBD;
		private $sTablaUsuario;
		private $sTablaUsuarioRol;
		private $sTablaUsuarioConfiguracion;
		private $sTablaIdioma;
		
		function __construct(){				 
			$this->sTablaUsuario = TB_USUARIO;
			$this->sTablaUsuarioRol = TB_USUARIO_ROL;		
			$this->sTablaUsuarioConfiguracion = TB_CONFIGURACION_PARAMETROS;
			$this->sTablaIdioma = TB_IDIOMA;
			
		}
		 
		// Resultado = <id_usuario>, el usuario se ha registrado correctamente. Resultado = -1, error con la subida de la foto. Resultado = -2, error con la consulta SQL.
		public function registrarUsuario($aDatos) {
			$resultado = -1;	
			// Fecha actual.
			$fecha = date("Y-m-d H:i:s");			
			$error=array();
			if($aDatos['email']==""){
				$error[]="Debe introducir un email";
			}
			if($aDatos['password']==""){
				$error[]="Debe introducir una contraseña";
			}
			else{
				if($aDatos['password']!=$aDatos['password2']){
					$error[]="Las contraseñas deben coincidir";
				}
			}
			
			if($this->estaUsuarioRegistrado($aDatos['email'])){
				$error[]="Ya existe un usuario con ese email";
			}
			
			if(count($error)==0){
				
				//Generamos un código de activación único
				$existe_codigo=true;
				while($existe_codigo){
					$codigo_activacion="";
					for ($i=0; $i<40; $i++) {
					    $d=rand(1,30)%2;
					    $codigo_activacion.= $d ? chr(rand(65,90)) : chr(rand(48,57));
					}
					$sql="SELECT * FROM ".$this->sTablaUsuario." WHERE codigo_activacion='$codigo_activacion'";
					$rs=$this->oBD->Execute($sql);
					$codigos_similares=$rs->GetRows();
					if(count($codigos_similares)==0){
						$existe_codigo=false;
					} 
				}
				// Encriptamos la clave pasada como parámtro usando el "salt" generado aleatoriamente.
				$clave_encriptada = md5($aDatos['password']);
				// Insertamos la información en la base de datos.
				$consulta_sql = "INSERT INTO ".$this->sTablaUsuario." (codigo_activacion,permiso_acceso,id_rol, nombre, email, password, fecha_alta, privado,id_pais) ";
				$consulta_sql .= " VALUES('$codigo_activacion',0,".ID_ROL_USUARIO.", '".$aDatos['nombre'];
				$consulta_sql .= "', '".$aDatos['email']."', '".$clave_encriptada."','".$fecha."','0', '".$aDatos['select_pais']."')";
				
				if (!$this->oBD->Execute($consulta_sql)){
					$resultado = -2;
				}
				else{
					$resultado=$this->oBD->Insert_ID();
					//AQUI REGISTRAMOS UN PAGO FICTICIO PARA SIMULAR EL PAGO DE LA SUSCRIPCION DE 0 euros
					$fecha_actual = date("Y-m-d");
					$sql_pago="INSERT INTO ".TB_PAGO_USUARIO." (id_usuario, id_paypal,id_tipo_pack,fecha_inicio) VALUES ($resultado, 3, 3,'$fecha_actual')";
					$this->oBD->Execute($sql_pago);
				}	
			}
			else{
				$resultado=$error;
			}	

			
			return $resultado;	 
		}
		
		//Funcion que devuelve el id del usuario si no está registrado
		function getAccesoUsuario($email){
			
			$aResultado = false;
			
			$consulta_sql = "SELECT permiso_acceso FROM ".$this->sTablaUsuario." WHERE email='".$email."';";
			$rs = $this->oBD->Execute($consulta_sql);
			$aResultado = $rs->GetRows();
			$rs->Close();
			if ($aResultado[0]['permiso_acceso'] == 0){
				$aResultado = false;
			}else{
				$aResultado = true;
			}
				
				
			return $aResultado;
		}
		
		function getIdUsuarioFromEmail($email){
			$aResultado = -1;
			
			$consulta_sql = "SELECT id FROM ".$this->sTablaUsuario." WHERE email='".$email."';";
			$rs = $this->oBD->Execute($consulta_sql);
			$aResultado = $rs->GetRows();
			$rs->Close();
			
			if ($rs->RecordCount() == 1){
				$aResultado = $aResultado[0]['id'];
			}
				
				
			return $aResultado;
		}
		
		function asociar_foto_usuario($id_usuario,$fotos){

			if(isset($fotos['foto_usuario'])){
				$ext = explode('.',$fotos['foto_usuario']['name']);
				$nombre = "img".rand(0,999999999999999).".".$ext[count($ext)-1];
				$destino = BASE_PATH.'datas/users/'.$id_usuario.'/profile/'.$nombre ;
				if(!file_exists(BASE_PATH.'datas/users/'.$id_usuario)){
					mkdir(BASE_PATH.'datas/users/'.$id_usuario, 0777);
					mkdir(BASE_PATH.'datas/users/'.$id_usuario.'/profile', 0777);
				}
				if(move_uploaded_file ( $fotos [ 'foto_usuario'][ 'tmp_name' ], $destino)){
					
					//Miramos si existía ya una foto y la borramos del disco
					$consulta_sql = "SELECT ruta_foto FROM ".$this->sTablaUsuario." WHERE id_usuario=".$id_usuario;
					$rs = $this->oBD->Execute($consulta_sql);
					$fila = $rs->GetRows();
					$rs->Close();
					if ($rs->RecordCount()>0){
						$file_old = BASE_PATH.'datas/users/'.$id_usuario.'/profile/'.$fila[0]['ruta_foto'];
						unlink($file_old);
					}
					
					
					$sql = "UPDATE ".$this->sTablaUsuario." SET ruta_foto='".$nombre."' WHERE id_usuario=$id_usuario";
					$this->oBD->Execute($sql);
				}
			}
		}
		
		
		// Función para actualizar los datos de un usuario.
		// Resultado = 1, el usuario se ha actualizado correctamente, resultado = -1, error con la subida de la foto, resultado = -2, error con la consulta SQL.
		public function actualizarUsuario($aDatos) {
			$resultado = 1;	
			$nueva_clave = 0;
			// Comprobamos si la clave se ha modificado.
			$clave_antigua = $this->getClave($aDatos['usuario_id']);
			
			if ($clave_antigua == $aDatos['usuario_clave']) {
				$clave_encriptada = $aDatos['usuario_clave'];
			}
			else {
				$nueva_clave = 1;
				// Generamos un "salt" aleatoriamente.
				$salt = $this->generarSalt();
				// Encriptamos la clave pasada como parámtro usando el "salt" generado aleatoriamente.
				$clave_encriptada = md5(md5(sha1($aDatos['usuario_clave'])).$salt);
			}
			if ($nueva_clave == 1) {
				global $oSesion;
				$oSesion->inicioSesion();				
				// Actualizamos la variable de sesión.
				$_SESSION['clave_cambiada'] = 1;
				// Actualizamos la información en la base de datos.
				$consulta_sql = "UPDATE ".$this->sTablaUsuario." SET nombre = '".$aDatos['usuario_nombre']."', apellidos = '".$aDatos['usuario_apellidos'];
				$consulta_sql .= "', email= '".$aDatos['usuario_email']."', telefono= '".$aDatos['usuario_telefono']."', usuario='".$aDatos['usuario_usuario']."', password='".$clave_encriptada."', clave_cambiada=1";
				$consulta_sql .= ", salt='".$salt."' WHERE id_usuario=".$aDatos['usuario_id'].";";
			}
			else {
				// Actualizamos la información en la base de datos.
				$consulta_sql = "UPDATE ".$this->sTablaUsuario." SET nombre = '".$aDatos['usuario_nombre']."', apellidos = '".$aDatos['usuario_apellidos'];
				$consulta_sql .= "', email= '".$aDatos['usuario_email']."', telefono= '".$aDatos['usuario_telefono']."',privado=".$aDatos['privado'].", usuario='".$aDatos['usuario_usuario'];
				$consulta_sql .= "' WHERE id_usuario=".$aDatos['usuario_id'].";";		
			}
			// Si el resultado es 1 seguimos ejecutando la consulta SQL.
			if ($resultado == 1) {
				if (!$this->oBD->Execute($consulta_sql))
					$resultado = -2;
			}
			
			asociar_foto_usuario($aDatos['usuario_id'],$_FILE);
						
			return $resultado;	 
		}
		
		// Función para actualizar los datos del Administrador.
		// Resultado = 1, el usuario se ha actualizado correctamente, resultado = -1, error con la subida de la foto, resultado = -2, error con la consulta SQL.
		public function actualizarUsuarioAdmin($aDatos) {
			$resultado = 1;	
			$nueva_clave = 0;
			//Comprobamos si la clave se ha modificado
			$clave_antigua = $this->getClave($aDatos['usuario_id']);
			
			if ($clave_antigua == $aDatos['usuario_clave']) {
				$clave_encriptada = $aDatos['usuario_clave'];
			}
			else {
				$nueva_clave = 1;
				// Generamos un "salt" aleatoriamente.
				$salt = $this->generarSalt();
				// Encriptamos la clave pasada como parámtro usando el "salt" generado aleatoriamente.
				$clave_encriptada = md5(md5(sha1($aDatos['usuario_clave'])).$salt);
			}
			if ($nueva_clave == 1) {
				global $oSesion;
				$oSesion->inicioSesion();
				// Actualizamos la variable de sesión.
				$_SESSION['clave_cambiada'] = 1;
				// Actualizamos la información en la base de datos.
				$consulta_sql = "UPDATE ".$this->sTablaUsuario." SET id_usuario_rol='".$aDatos['usuario_tipo']."', nombre = '".$aDatos['usuario_nombre']."', apellidos = '".$aDatos['usuario_apellidos'];
				$consulta_sql .= "', email= '".$aDatos['usuario_email']."', telefono= '".$aDatos['usuario_telefono']."', usuario='".$aDatos['usuario_usuario']."', password= '".$clave_encriptada."', clave_cambiada=1";
				$consulta_sql .= ", salt='".$salt."' WHERE id_usuario=".$aDatos['usuario_id'].";";
			}
			else {
				// Actualizamos la información en la base de datos.
				$consulta_sql = "UPDATE ".$this->sTablaUsuario." SET id_usuario_rol='".$aDatos['usuario_tipo']."', nombre = '".$aDatos['usuario_nombre']."', apellidos = '".$aDatos['usuario_apellidos'];
				$consulta_sql .= "', email= '".$aDatos['usuario_email']."', telefono= '".$aDatos['usuario_telefono']."', usuario='".$aDatos['usuario_usuario'];
				$consulta_sql .= "' WHERE id_usuario=".$aDatos['usuario_id'].";";	
			}		
			// Si el resultado es 1 seguimos ejecutando la consulta SQL.
			if ($resultado == 1) {
				if (!$this->oBD->Execute($consulta_sql))
					$resultado = -2;
			}
						
			return $resultado;	 
		}
		
		public function actualizarClave($id_usuario) {
				$resultado = 1;	
				// Encriptamos la clave pasada como parámtro usando el "salt" generado aleatoriamente.
				$clave="";
					for ($i=0; $i<10; $i++) {
					    $d=rand(1,30)%2;
					    $clave.= $d ? chr(rand(65,90)) : chr(rand(48,57));
					}
				$clave_encriptada = md5($clave);
				
				// Actualizamos la información en la base de datos.
				$consulta_sql = "UPDATE ".$this->sTablaUsuario." SET password='".$clave_encriptada."'";
				$consulta_sql .= " WHERE id_usuario=".$id_usuario.";";
				
				if (!$this->oBD->Execute($consulta_sql)){
					$resultado = -2;
				}else{
					$resultado = $clave;
				}
			
						
			return $resultado;	 
		}
		
		// Función para borrar los usuarios. Hacemos un borrado logico del usuario y de todas las sesiones realizadas por él.
		public function deleteUsuario($id_user){
			// Fecha actual.
			$fecha = date("Y-m-d H:i:s");
						
			$consulta_sql = "UPDATE ".$this->sTablaSesion." SET eliminada=1 WHERE id_usuario=".$id_user;
			$rs = $this->oBD->Execute($consulta_sql);
			
			$consulta_sql = "UPDATE ".$this->sTablaUsuario." SET eliminado=1, fecha_baja='$fecha' WHERE id_usuario=".$id_user;
			$rs = $this->oBD->Execute($consulta_sql);			
		}
		
		public function desactivarUsuario($id_user){
			// Fecha actual.
			$fecha = date("Y-m-d H:i:s");
						
			$consulta_sql = "UPDATE ".$this->sTablaSesion." SET desactivada=1 WHERE id_usuario=".$id_user;
			$rs = $this->oBD->Execute($consulta_sql);
			
			$consulta_sql = "UPDATE ".$this->sTablaUsuario." SET desactivado=1, fecha_ultima_desactivacion='$fecha' WHERE id_usuario=".$id_user;
			$rs = $this->oBD->Execute($consulta_sql);			
		}	

		public function activarUsuario($id_user){
			$consulta_sql = "UPDATE ".$this->sTablaSesion." SET desactivada=0 WHERE id_usuario=".$id_user;
			$rs = $this->oBD->Execute($consulta_sql);
			
			$consulta_sql = "UPDATE ".$this->sTablaUsuario." SET desactivado=0 WHERE id_usuario=".$id_user;
			$rs = $this->oBD->Execute($consulta_sql);			
		}		
		
		
		public function activarUsuarioCodigo($codigo_activacion){
			
			$sql="SELECT * FROM ".$this->sTablaUsuario." WHERE permiso_acceso=0 AND codigo_activacion='$codigo_activacion' AND eliminado=0";
			$rs=$this->oBD->Execute($sql);
			$usuario=$rs->GetROws();
			
			$resultado=0;
			if(count($usuario)==1){
				
				$sql="UPDATE ".$this->sTablaUsuario." SET permiso_acceso=1,codigo_activacion='' WHERE id=".$usuario[0]['id'];
				$rs=$this->oBD->Execute($sql);
				$resultado=$usuario[0]['id'];
			}
			
			return $resultado;
			
		}

		// Función para obtener la configuración del usuario
		public function getSettingParams($id) {
				$result = -1;
			
				$consulta_sql = "SELECT * FROM ".$this->sTablaUsuarioConfiguracion." WHERE id_usuario=".$id.";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
				
				if ($rs->RecordCount() > 0){
					$result = $aResultado[0];
				}
			
			return $result;
		}
		
		

		public function getNombreUsuario($id_usuario) {
			$consulta_sql = "SELECT nombre, apellidos FROM ".$this->sTablaUsuario." WHERE id_usuario=".$id_usuario;
			$rs = $this->oBD->Execute($consulta_sql);
			$fila = $rs->GetRows();
			$rs->Close();
			
			return $fila[0]['nombre']." ".$fila[0]['apellidos'];
		}
		
		
		public function getDatosUsuarioActual() {
			$aResultado = NULL;
			
			if (isset($_SESSION['id_usuario'])) {
				$consulta_sql = "SELECT * FROM ".$this->sTablaUsuario." WHERE id_usuario=".$_SESSION['id_usuario'].";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
			}
			return $aResultado[0];
		}	

		// Función para obtener los datos del usuario con id.
		public function getDatosUsuario($id) {
			$aResultado = NULL;
			
			//if (isset($_SESSION['id_usuario'])) {
				$consulta_sql = "SELECT * FROM ".$this->sTablaUsuario." WHERE id_usuario=".$id.";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
			//}
			
			return $aResultado[0];
		}

		// Función para obtener los datos del usuario con id.
		public function getDatosUsuarioModificar($id) {
			$consulta_sql = "SELECT * FROM ".$this->sTablaUsuario." WHERE id_usuario=".$id.";";
			$rs = $this->oBD->Execute($consulta_sql);
			$aResultado = $rs->GetRows();
			$rs->Close();
			
			return $aResultado[0];
		}
		
		public function getPaisTieneUsuarios($id_pais){
			$consulta_sql = "SELECT * FROM ".$this->sTablaUsuario." WHERE id_pais=".$id_pais.";";
			$rs = $this->oBD->Execute($consulta_sql);
			return ($rs->RecordCount()>0);
			
		}
		
		

		private function crear_semilla() {
	    	list($usec, $sec) = explode(' ', microtime());
	    	
	    	return (float) $sec + ((float) $usec * 100000);
		}  		
		
		// Función interna que genera un "salt" aleateorio de 3 caracteres.
		private function generarSalt() { 
			$salt = '';
			srand($this->crear_semilla());
			for ($i = 0; $i < 3; $i++)
				$salt .= chr(rand(35, 126)); 
			
			return $salt;
		}
		
		public function estaUsuarioRegistrado($email) {
			$bResultado = false;
			$rs = $this->oBD->Execute("SELECT * FROM ".$this->sTablaUsuario." WHERE email='".strtolower($email)."';");
			$rs->Close();
			// Si existen resultados. 
			if ($rs->RecordCount() == 1)
				$bResultado = true;	
			
			return $bResultado;
		}
		
		 
		// Función que devuelve -1 si el usuario no está registrado, -2 si el usuario está registrado pero la clave no pertenece a dicho usuario,
		// -3 si el usario está registrado pero no ha activado su registro y ID_ROL_USUARIO si el usuario está registrado y la clave pasada como parámetro
		// pertenece a dicho usuario.
		public function loguearUsuario($usuario, $clave,$clave_codificada=0) {
			global $oSesion;
			// Variable resultado.
			$resultado = -1;
				// Codificamos la clave junto con el "salt" obtenido.
				$clave_codificada = $clave_codificada ? $clave : md5($clave);
				// Obtenemos el usuario que tiene por nombre de usuario el pasado como parámetro y como clave la pasada como parámetro.
				$consulta_sql = "SELECT * FROM ".$this->sTablaUsuario." as u, ".$this->sTablaIdioma." as l WHERE u.eliminado=0  AND u.usuario='$usuario' AND u.clave='$clave_codificada' AND u.id_idioma = l.id";
				$rs = $this->oBD->Execute($consulta_sql);
				
				$resultado_sql = $rs->GetRows();
				$rs->Close();
				// Si no existen resultados es porque la clave no es correcta para el usuario pasado como parámetro. 
				if ($rs->RecordCount() == 0)
					$resultado = -2;
				elseif ($rs->RecordCount() == 1) {
					$oSesion->aperturaSesion();
					
					// Encriptamos los datos para almacenarlos en la sesión.
					$id_rol = $resultado_sql[0]['id_rol'];
					$id_usuario = $resultado_sql[0]['id_usuario'];
					$id_idioma = $resultado_sql[0]['id_idioma'];
					$codigo_idioma = $resultado_sql[0]['codigo'];
					$id_zone = $resultado_sql[0]['id_zone'];
					// Establecemos los datos en la sesión.
					$_SESSION['datos_usuario']['id_rol'] = $id_rol;
					$_SESSION['datos_usuario']['id_usuario'] = $id_usuario;
					$_SESSION['datos_usuario']['id_idioma'] = $id_idioma;
					$_SESSION['datos_usuario']['codigo_idioma'] = $codigo_idioma;
					$_SESSION['datos_usuario']['id_zone'] = $id_zone;
					$_SESSION['datos_usuario']['id_root'] = 0;
					
					$resultado=1;
					
				}
			
			return $resultado;
		}
		
		public function loguearUsuarioID($id) {
			
			
			
			// Obtenemos el "salt" relacionado con el usuario a comprobar.
			$consulta_sql = "SELECT * FROM ".$this->sTablaUsuario." WHERE id_usuario=$id";
			
			$rs = $this->oBD->Execute($consulta_sql);	
			$resultado = $rs->GetRows();
			
			return $this->loguearUsuario($resultado[0]['email'], $resultado[0]['password'],1);
		
		}
		
		// Método encargado de devolver true o false dependiendo de si el usuario está o no logueado en el sistema.
		private function estaLogueado() {
			 // Comprobamos si el usuario encriptado es igual que el usuario sin encriptar.
			 if (isset($_SESSION['datos_usuario']['id_usuario']) && isset($_SESSION['datos_usuario']['id_rol']))
				  return true;
			 else
				  return false;
		}
 
		////////////////////////////////////////////////////////////////////////////////////////
		// FUNCIONES A MODIFICAR DEPENDIENDO DE LOS TIPOS DE USUARIOS NECESARIOS EN EL SITIO. //
		////////////////////////////////////////////////////////////////////////////////////////
		// Devuelve true o false dependiendo de si el usuario actual es Superadministrador o no.
		// Se asegura siempre que el usuario está logueado.
		public function superadministradorLogueado() {
			$resultado = false;
			if ($this->estaLogueado()) {
				$resultado = ID_ROL_SUPERADMINISTRADOR == $_SESSION['datos_usuario']['id_rol'];
			}
			
			return $resultado;
		}
		
		// Devuelve true o false dependiendo de si el usuario actual es Administrador o no.
		// Se asegura siempre que el usuario está logueado.
		public function administradorLogueado() {
			$resultado = false;
			if ($this->estaLogueado()) {
				$resultado = ID_ROL_ADMINISTRADOR == $_SESSION['datos_usuario']['id_rol'];
			}
			
			return $resultado;
		}
		
		public function setBD($oBD) {
			$this->oBD = $oBD;				  
		}
		
		
		
	private function base_buscador($tipo="buscar",$fecha_inicio=0,$fecha_fin=0,$primero=0,$caducidad=0,$id_pais=0,$busqueda_texto='',$campo_ordenacion='fecha_alta',$tipo_ordenacion='DESC'){
		global $oBD;
		global $oSuscripcion;
		//if($tipo=="buscar"){
			$sql="SELECT * FROM ".$this->sTablaUsuario;
		//}
		//else{
		//	$sql="SELECT count(*) numero_usuarios FROM ".TB_USUARIO;
		//}
		
		$wheres=array();
		
		if($id_pais!=0){
			$wheres[]=" id_pais=$id_pais ";
		}
		
		if($busqueda_texto!=""){
			$wheres[]=" (nombre like '%$busqueda_texto%' OR apellidos like '%$busqueda_texto%' OR email like '%$busqueda_texto%') ";
		}
		
		if(count($wheres)>0){
			$sql.=" WHERE ";
		}
		
		$sql.=implode(' AND ',$wheres);
		
		if($campo_ordenacion=="nombre"){
			$sql.=" ORDER BY $campo_ordenacion  ASC ";
		}else{
			$sql.=" ORDER BY $campo_ordenacion  $tipo_ordenacion ";
		}
		if($tipo=="buscar"){
			$sql.=" LIMIT $primero,".NUMERO_USUARIOS_BUSCADOR;
		}
		$rs=$oBD->Execute($sql);
		
		$filas = $rs->GetRows();
		$rs->close();
		//AQUI MODIFICAMOS LOS RESULTADOS DE LA BUSQUEDA PARA INCLUIR LAS RESTRICCIONES DE SUSCRIPCIONES
		$nuevo_listado = array();
		$ind=0;
		//Aqui miramos la restriccion de caducidad: SUMAMOS EL NUMERO DE DIAS A LA FECHA DE HOY Y SE LA ASIGNAMOS A FECHA_FIN
		//ASI TENEMOS LA CONSULTA DEL TIPO: SUSCRIPCIONES QUE CADUCARÁN DENTRO DE __ DÍAS
		if($caducidad>0){
			$hoy = date("Y-m-d");
			$hoy_desglosado = explode("-",$hoy);
			$segundos=mktime(0, 0, 0, $hoy_desglosado[1], $hoy_desglosado[2], $hoy_desglosado[0] ); 
			$suma=$segundos+($caducidad*86400); 
       		$fecha_fin=date("Y-m-d",$suma);
		}
		if($fecha_inicio!=0 || $fecha_fin!=0){
			for($i=0; $i<count($filas);$i++){
				$filas[$i]['suscripciones'] = $oSuscripcion->obtener_todas_suscripciones_fechas($filas[$i]['id'],$fecha_inicio,$fecha_fin);
				if($filas[$i]['suscripciones']!=0){
					$nuevo_listado[$ind] = $filas[$i];
					$ind++;
				}
			}
		}else if($fecha_inicio==0 && $fecha_fin==0){
			for($i=0; $i<count($filas);$i++){
				$filas[$i]['suscripciones'] = $oSuscripcion->obtener_todas_suscripciones($filas[$i]['id']);
				$nuevo_listado[$ind] = $filas[$i];
				$ind++;
			}
		}
		$filas = array();
		if($tipo!="buscar"){
			$filas[0]['numero_usuarios'] = $ind;
		}else{
			$filas = $nuevo_listado;
		}
		return $filas;
	}
	
	
	
	function buscar($fecha_inicio=0,$fecha_fin=0,$primero=0,$caducidad=0,$id_pais=0,$busqueda_texto='',$campo_ordenacion='fecha_alta',$tipo_ordenacion='DESC'){
		
		return $this->base_buscador("buscar",$fecha_inicio,$fecha_fin,$primero,$caducidad,$id_pais,$busqueda_texto,$campo_ordenacion,$tipo_ordenacion);
		
	}
	
	function num_usuarios($fecha_inicio=0,$fecha_fin=0,$primero=0,$caducidad=0,$id_pais=0,$busqueda_texto='',$campo_ordenacion='fecha_alta',$tipo_ordenacion='DESC'){
		return $this->base_buscador("contar",$fecha_inicio,$fecha_fin,$primero,$caducidad,$id_pais,$busqueda_texto,$campo_ordenacion,$tipo_ordenacion);
	}
	
	function paginacion($fecha_inicio=0,$fecha_fin=0,$primero=0,$caducidad=0,$id_pais=0,$busqueda_texto='',$campo_ordenacion='fecha_alta',$tipo_ordenacion='DESC'){
		
		global $oBD;
		
		$numero_objetos=$this->base_buscador("paginacion",$fecha_inicio,$fecha_fin,$primero,$caducidad,$id_pais,$busqueda_texto,$campo_ordenacion,$tipo_ordenacion);
		
		if(count($numero_objetos)>0){
			$datos['numero_usuarios']=$numero_objetos[0]['numero_usuarios'];
		}
		else{
			$datos['numero_usuarios']=0;
		}
		
		$datos['numero_paginas']=ceil($datos['numero_usuarios']/NUMERO_USUARIOS_BUSCADOR);
		
		$datos['pagina_actual']=($primero/NUMERO_USUARIOS_BUSCADOR)+1;
		
		
		
		return $datos;
		
	}
		
		
		

}
	
	
	
	
	
	
	$oUser = new UserClass();
	$oUser->setBD($oBD);
?>