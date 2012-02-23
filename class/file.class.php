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
        
        private $allowedExtensions = array();
        private $sizeLimit = 419430400;
        private $file;
		
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
		
		// Método que nos devuelve un array con las carpetas del directorio que le hemos pasado por parámetro
		public function getFoldersTree($id_usuario, $id_padre){
			$result = "";
			$consulta_sql = "SELECT a.*, u.nombre as nombre_usuario, u.apellidos as apellidos_usuario, u.id_usuario FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuario." as u WHERE ";
			$consulta_sql .= "a.id_archivo_padre=".$id_padre." AND a.tipo=0 AND a.id_archivo IN (SELECT ua.id_archivo FROM ".$this->sTablaUsuarioArchivo." as ua WHERE ua.id_usuario='".$id_usuario."') ORDER BY a.fecha_update DESC;";
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result;
		}
		
		// Método que nos devuelve la ruta de los nombres de las carpetas padres del fichero
		public function getFilePath($id_file){
			$result = "";
			$consulta_sql = "SELECT a.nombre, a.id_archivo_padre, a.id_archivo FROM ".$this->sTablaArchivo." as a WHERE ";
			$consulta_sql .= "a.id_archivo=".$id_file." AND a.tipo=0 ";
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result[0];
		}
		
		//Nombre de la carpeta o fichero
		public function getNameFolder($id_archivo, $tipo){
			$result = "";
			$consulta_sql = "SELECT nombre FROM ".$this->sTablaArchivo." WHERE ";
			$consulta_sql .= " id_archivo = ".$id_archivo." AND tipo = ".$tipo;
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result[0][0];
		}
		
		public function getParentNameFolder($id_parent){
			$result = "";
			$consulta_sql = "SELECT nombre FROM ".$this->sTablaArchivo." WHERE ";
			$consulta_sql .= " tipo=0 AND id_archivo = ( SELECT id_archivo_padre FROM ".$this->sTablaArchivo." WHERE id_archivo =".$id_parent." )  ";
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result[0];
		}
		
		// Función que nos devuelve las 5 últimas actualizaciones de carpetas y ficheros
		public function getRecentUpdates($id_usuario){
			$result = "";
			$consulta_sql = "SELECT a.*, u.nombre as nombre_usuario, u.apellidos as apellidos_usuario, u.id_usuario FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuario." as u WHERE ";
			$consulta_sql .= " a.id_archivo IN (SELECT ua.id_archivo FROM ".$this->sTablaUsuarioArchivo." as ua WHERE ua.id_usuario='".$id_usuario."') AND a.tipo=0 ORDER BY a.fecha_update DESC LIMIT 0,5;";
			$rs = $this->oBD->Execute($consulta_sql);
			if ($rs->RecordCount()>0){
				$result = $rs->GetRows();
			}
			return $result;
		}
		
		
		// Función para obtener la configuración del usuario
		public function getActualSizeUser($id_usuario) {
				$result = 0;
			
				$consulta_sql = "SELECT SUM(v.size) as actual_size FROM ".$this->sTablaArchivoVersion." as v, ".$this->sTablaArchivo." as a , ".$this->sTablaUsuarioArchivo." as ua , ".$this->sTablaUsuario." as u WHERE v.id_archivo = a.id_archivo AND a.id_archivo = ua.id_archivo AND ua.id_usuario = u.id_usuario AND ua.propietario=1 AND u.id_usuario=".$id_usuario.";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
				
				if ($rs->RecordCount() > 0){
					$result = $aResultado[0]['actual_size'];
				}
			
			return $result;
		}
		
		 private function checkServerSettings(){        
            $postSize = $this->toBytes(ini_get('post_max_size'));
            $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
            
            if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
                $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
                die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
            }        
        }
    
        private function toBytes($str){
            $val = trim($str);
            $last = strtolower($str[strlen($str)-1]);
            switch($last) {
                case 'g': $val *= 1024;
                case 'm': $val *= 1024;
                case 'k': $val *= 1024;        
            }
            return $val;
        }
		
	   /**
        *  Returns array('success'=>true) or array('error'=>'error message')
        */
		public function uploadFileFolder($uploadDirectory, $replaceOldFile = FALSE){
		    global $oBD;
                 $allowedExtensions = array("jpg","jpeg","bmp","png","doc","docx","ppt","pptx");
                 $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
                 $this->allowedExtensions = $allowedExtensions;        
                 $this->sizeLimit = $sizeLimit;
                
                 $this->checkServerSettings();  
                 
                      
                if (isset($_GET['qqfile'])) {
                    $this->file = new qqUploadedFileXhr();
                } elseif (isset($_FILES['ifiles'])) {
                    $this->file = new qqUploadedFileForm();
                } else {
                    $this->file = false; 
                }
                
                 if (!is_writable($uploadDirectory)){
                    return array('error' => "Server error. Upload directory isn't writable.");
                 }
                 
                 if (!$this->file){
                    return array('error' => 'No files were uploaded.');
                 }
                
                $size = $this->file->getSize();
                
                if ($size == 0) {
                    return array('error' => 'File is empty');
                }
                
                if ($size > $this->sizeLimit) {
                    return array('error' => 'File is too large');
                }
                
                $pathinfo = pathinfo($this->file->getName());
                $filename = $pathinfo['filename'];
                //$filename = md5(uniqid());
                // $filename = "f".rand(0,999999999999999);
                $ext = $pathinfo['extension'];
                if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
                     $these = implode(', ', $this->allowedExtensions);
                     return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
                }
                
                if(!$replaceOldFile){
                    /// don't overwrite previous files that were uploaded
                    while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                        $filename .= rand(10, 99);
                    }
                }
                
                if ($this->file->save($uploadDirectory . $filename . '.' . $ext)){
                    return array('success'=>true);
                } else {
                    return array('error'=> 'Could not save uploaded file.' .
                        'The upload was cancelled, or server error encountered');
                }
                       
                        
                       
                        
		} 
		
		public function editFolderTree($id_usuario,$id_archivo, $datos){
			$result = 0;
			$nombre = $datos["nombre_".$id_archivo];
			$descripcion = $datos["descripcion_".$id_archivo];
				// 1. Recupero el nombre de la carpeta 
				// 2. Comprobamos que no el nombre de la carpeta es distinto del nombre de cualquier carpeta del mismo nivel
				// 3. Si existe en el mismo nivel una carpeta con el mismo nombre actualizo sólo la descripción 
				$consulta_sql = "SELECT a.id_archivo, a.nombre, a.descripcion FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuarioArchivo." as ua WHERE a.tipo=0 AND a.id_archivo_padre='".$datos['id_padre']."' AND a.nombre = '".$nombre."' AND a.id_archivo = ua.id_archivo AND ua.propietario=1 AND ua.id_usuario =".$datos['id_usuario'].";";
				
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
				if ($rs->RecordCount() == 0){
					
					$consulta_sql = "UPDATE ".$this->sTablaArchivo." as a INNER JOIN (".$this->sTablaUsuarioArchivo." as ua INNER JOIN ".$this->sTablaUsuario." as u ON ua.id_usuario = u.id_usuario AND u.id_usuario = ".$id_usuario.") ON  a.id_archivo = ua.id_archivo SET a.nombre='".$nombre."', a.descripcion='".$descripcion."' WHERE a.id_archivo = '".$datos['id_archivo']."' ;";
					if  ($this->oBD->Execute($consulta_sql)){
						$result = 1;						
					}
				}else{
 					// Caso: Yo tengo una carpeta en ese directorio con ese nombre. 
 					// 1. Compruebo si su id es el mismo actualizo descripción.
 					// 2. en otro caso: devolvemos 0 com error. No pueden haber dos carpetas en el mismo nivel con el mismo nombre.
					 		$id_archivo = $aResultado[0]['id_archivo'];
					 		if ($id_archivo == $datos['id_archivo']){
					 			$consulta_sql = "UPDATE ".$this->sTablaArchivo." as a INNER JOIN (".$this->sTablaUsuarioArchivo." as ua INNER JOIN ".$this->sTablaUsuario." as u ON ua.id_usuario = u.id_usuario AND u.id_usuario = ".$id_usuario.") ON  a.id_archivo = ua.id_archivo SET a.nombre='".$nombre."', a.descripcion='".$descripcion."' WHERE a.id_archivo = '".$datos['id_archivo']."' ;";
								if  ($this->oBD->Execute($consulta_sql)){
									$result = 1;	
								}else{
									$result = 0;
								}
					 		}else{
					 				$result = 0;
					 		}							
				}
				
					
			return $result;
		}
		
		public function setFolderTree($id_usuario,$id_padre,$datos){
				global $config_urls;
				
				$result = false;
				//Primero comprobamos que no existe una carpeta con el mismo nombre en el raiz
				$consulta_sql = "SELECT a.nombre FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuarioArchivo." as ua WHERE a.tipo=0 AND a.id_archivo_padre='".$id_padre."' AND a.nombre = '".$datos['nombre']."' AND a.id_archivo = ua.id_archivo AND ua.id_archivo =".$datos['id_usuario'].";";
				$rs = $this->oBD->Execute($consulta_sql);
				$aResultado = $rs->GetRows();
				$rs->Close();
				if ($rs->RecordCount() == 0){
				
						$name_zone = Combos::getNameTimeZone(Settings::getSettingsVars('ID_ZONE'));
						$fecha = Combos::getDateTimeZone($name_zone);
						// Insertamos la información en la base de datos.
						$consulta_sql = "INSERT INTO ".$this->sTablaArchivo." (tipo,fecha, nombre, id_archivo_padre, privacidad, fecha_update) ";
						$consulta_sql .= " VALUES(0,'$fecha','".$datos['nombre']."', '".$id_padre."', 1 , '$fecha')";
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
	
/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {  
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {
        if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)){
            return false;
        }
        return true;
    }
    function getName() {
        return $_FILES['qqfile']['name'];
    }
    function getSize() {
        return $_FILES['qqfile']['size'];
    }
    
    function getType(){
        return $_FILES['qqfile']['type'];
    }
}

/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {    
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
        
        $target = fopen($path, "w");        
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
        return true;
    }
    function getName() {
        return $_GET['qqfile'];
    }
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];            
        } else {
            throw new Exception('Getting content length is not supported.');
        }      
    }   
    
    function getType(){
        $imagetypes = array(
            '.png' => 'image/png',
            '.gif' => 'image/gif',
            '.jpg' => 'image/jpeg',
            '.bmp' => 'image/bmp',
            '.doc' => 'files/doc',
            '.ppt' => 'files/ppt',
            '.xls' => 'files/xls',
            '.rar' => 'files/rar',
            '.zip' => 'files/zip');
        $type = $imagetypes[substr($_GET['qqfile'],strripos($_GET['qqfile'], '.'))];
        
        
        return $type;
    }
}


class qqFileUploader {
        private $allowedExtensions = array();
        private $sizeLimit = 419430400;
        private $file;
    
        private $oBD;
        private $sTablaUsuario;
        private $sTablaUsuarioRol;
        private $sTablaArchivo;
        private $sTablaUsuarioArchivo;
        private $sTablaArchivoVersion;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 419430400){
            
            $this->sTablaUsuario = TB_USUARIO;
            $this->sTablaUsuarioRol = TB_USUARIO_ROL;
            $this->sTablaArchivo = TB_ARCHIVO;
            $this->sTablaUsuarioArchivo = TB_USUARIO_ARCHIVO;   
            $this->sTablaArchivoVersion = TB_VERSION;        
        
                
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
        $this->checkServerSettings();       

        if (isset($_GET['qqfile'])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false; 
        }
    }
    
    public function setBD($oBD) {
            $this->oBD = $oBD;                
    }
    
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
        }        
    }
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE,$id_user,$id_padre){
        if (!is_writable($uploadDirectory)){
            return array('error' => "Server error. Upload directory isn't writable.");
        }
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        if ($size > $this->sizeLimit) {
            return array('error' => 'File is too large');
        }
        $type_file = $this->file->getType();
        $pathinfo = pathinfo($this->file->getName());
        $filename = $pathinfo['filename'];
        //$filename = md5(uniqid());
        $ext = $pathinfo['extension'];

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }
        
                //Primero comprobamos que no existe un fichero con el mismo nombre en el nivel de carpeta en el que está
                $file_version = 0;
                $consulta_sql = "SELECT a.nombre, a.id_archivo FROM ".$this->sTablaArchivo." as a, ".$this->sTablaUsuarioArchivo." as ua WHERE a.tipo=1 AND a.id_archivo_padre='".$id_padre."' AND a.nombre = '".$filename."' AND a.ext = '".$ext."' AND a.type_file='".$type_file."' AND a.id_archivo = ua.id_archivo AND ua.id_usuario =".$id_user.";";
                $rs = $this->oBD->Execute($consulta_sql);
                $aResultado = $rs->GetRows();
                $rs->Close();
                if ($rs->RecordCount() > 0){
                //Si existe ya un fichero en el mismo nivel actualizamos la versión
                        $file_version = 1;
                        $id_archivo_version = $aResultado[0]['id_archivo'];
              
                }
                    
                 if(!$replaceOldFile){
                            //Generamos un número único para el fichero
                            $filename_new = md5(uniqid());
                            $filename_new = "f".$filename_new.rand(0,999999999999999);
                            while (file_exists($uploadDirectory . $filename_new)) {
                                $filename_new = "f".$filename_new.rand(0,999999999999999);
                            }
                  }  
            
        
       
        
            if ($this->file->save($uploadDirectory . $filename_new . '.' . $ext )){ //. '.' . $ext
                //Upload and insert file in DDBB
                 $result = false;
                
                    if ($file_version == 0){
                        $name_zone = Combos::getNameTimeZone(Settings::getSettingsVars('ID_ZONE'));
                        $fecha = Combos::getDateTimeZone($name_zone);
                        // Insertamos la información en la base de datos.
                        $consulta_sql = "INSERT INTO ".$this->sTablaArchivo." (tipo,fecha, nombre, id_archivo_padre, privacidad, fecha_update,name_file,type_file,type_size,max_size,ext) ";
                        $consulta_sql .= " VALUES(1,'$fecha','".$filename."', '".$id_padre."', 1 , '$fecha','".$filename_new."','".$type_file."','".$size."','".$size."', '".$ext."')";
                        if (!$this->oBD->Execute($consulta_sql)){
                           return array('error' => 'Error insert File in Data Base');
                        }else{
                            $id_file=$this->oBD->Insert_ID();
                            
                            $consulta_sql = "INSERT INTO ".$this->sTablaUsuarioArchivo." (id_usuario, id_archivo, propietario) ";
                            $consulta_sql .= " VALUES($id_user, $id_file, 1 )";
                            if (!$this->oBD->Execute($consulta_sql)){
                                return array('error' => 'Error insert File in Data Base');
                            }else{
                                           
                                //Comprobamos el último id       
                                $consulta_sql = "SELECT MAX(v.id_version) as version FROM ".$this->sTablaArchivoVersion." as v WHERE v.id_archivo='".$id_file."';";
                                $rs = $this->oBD->Execute($consulta_sql);
                                $aResultado = $rs->GetRows();
                                $rs->Close();
                                $version =1;    
                                if($aResultado[0]['version']!="" || $aResultado[0]['version']!=NULL){
                                    $version = $aResultado[0]['version'] + 1;    
                                }
                                    
                                $consulta_sql = "INSERT INTO ".$this->sTablaArchivoVersion." (id_version,id_archivo, fecha, nombre, size) ";
                                $consulta_sql .= " VALUES($version,$id_file,'$fecha','$filename','$size')";
                                
                                if (!$this->oBD->Execute($consulta_sql)){
                                    $consulta_sql = "UPDATE ".$this->sTablaArchivo." as a INNER JOIN (".$this->sTablaUsuarioArchivo." as ua INNER JOIN ".$this->sTablaUsuario." as u ON ua.id_usuario = u.id_usuario AND u.id_usuario = ".$id_user.") ON  a.id_archivo = ua.id_archivo SET a.max_size=a.max_size+$size WHERE a.tipo=0 AND a.id_archivo = '".$id_padre."' ;";
                        
                                    if (!$this->oBD->Execute($consulta_sql)){         
                                      return array('error' => 'Error insert File in Data Base');
                                    }else{   
                                      return array('success'=>true);
                                     }       
                                }else{   
                                  return array('success'=>true);
                                }
                                 
                            }
                        }
              
                    }else{ //if $file_version == 1 update version of file
                        $name_zone = Combos::getNameTimeZone(Settings::getSettingsVars('ID_ZONE'));
                        $fecha = Combos::getDateTimeZone($name_zone);
                        // Insertamos la información en la base de datos.
                        if ($id_padre!=0){
                            $consulta_sql = "UPDATE ".$this->sTablaArchivo." as a INNER JOIN (".$this->sTablaUsuarioArchivo." as ua INNER JOIN ".$this->sTablaUsuario." as u ON ua.id_usuario = u.id_usuario AND u.id_usuario = ".$id_user.") ON  a.id_archivo = ua.id_archivo SET a.max_size=a.max_size+$size WHERE a.tipo=0 AND a.id_archivo = '".$id_padre."' ;";
                             if (!$this->oBD->Execute($consulta_sql)){
                                 return array('error' => 'Error insert File in Data Base');
                              }
                        }
                       
                            
                                           
                                //Comprobamos el último id       
                                $consulta_sql = "SELECT MAX(v.id_version) as version FROM ".$this->sTablaArchivoVersion." as v WHERE v.id_archivo='".$id_archivo_version."';";
                                $rs = $this->oBD->Execute($consulta_sql);
                                $aResultado = $rs->GetRows();
                                $rs->Close();
                                $version =1;    
                                if($aResultado[0]['version']!="" || $aResultado[0]['version']!=NULL){
                                    $version = $aResultado[0]['version'] + 1;    
                                }
                                    
                                $consulta_sql = "INSERT INTO ".$this->sTablaArchivoVersion." (id_version,id_archivo, fecha, nombre, size) ";
                                $consulta_sql .= " VALUES($version,$id_archivo_version,'$fecha','$filename','$size')";
                                
                                if (!$this->oBD->Execute($consulta_sql)){        
                                  return array('error' => 'Error insert File in Data Base');
                                }else{   
                                  return array('success'=>true);
                                }
                                 
                    }
            
            
           
        } else {
            return array('error'=> 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
        
    }    
}	
	
	
	$oFile = new FileClass();
	$oFile->setBD($oBD);
?>