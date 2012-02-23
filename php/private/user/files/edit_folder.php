<?php 
	// Codificación de la página.
	header ('Content-type: text/html; charset=utf-8');
	
	
	// Una vez realizado el siguiente require, podemos incluir sin tener que poner rutas relativas cualquier script que exista en el directorio 'configuracion' o en
	// el directorio 'php/funciones'.
	require('../../../../config/config.php');
	require($config_urls['BASE_PATH'].'/class/file.class.php');	
	require($config_urls['BASE_PATH'].'/php/private/user/security.php');	
	$datos_usuario=$oSesion->getSesion('datos_usuario');
	$resultado=array();
	if (isset($_POST) && (isset($_POST['id_archivo']) !="") && (isset($_POST['id_padre'])!="")){
	
				if($oFile->editFolderTree($datos_usuario['id_usuario'], $_POST['id_archivo'],$_POST)){
						$resultado[0]="Yuhuu! Se ha editado correctamente";
					 	$resultado[1]=2;
						
						
						
				}else{
						$resultado[0]="Ups! No se puede editar esta carpeta con ese nombre. Ya existe una igual!!";
					 	$resultado[1]=1;
						
				}
				//Cargamos los ficheros y resultados de carpetas del directorio
						//Nos traemos los ficheros y carpetas del directorio root
						//Comprobamos el directorio en el que estamos sino nos metemos en el directorio root
						if (isset($_POST['id_padre']) && $_POST['id_padre']!=0){
							$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], $_POST['id_padre']);
							
							$oSmarty->assign('aFile',$aFile);	
							$oSmarty->assign('id_usuario',$datos_usuario['id_usuario']);
							$oSmarty->assign('id_padre',$_POST['id_padre']);
							
							//Return name of parent folder
							$name_parent_folder = $oFile->getParentNameFolder($_POST['id_padre']);
							if ($name_parent_folder==""){
								$name_parent_folder = Localizer::getTranslate('tx_sub_file');
							}
							
						}else{
							//Nos traemos los ficheros y carpetas del directorio root
							$aFile = $oFile->getDocumentosPadreArbol($datos_usuario['id_usuario'], 0);
							
							$oSmarty->assign('aFile',$aFile);
							$oSmarty->assign('id_usuario',$datos_usuario['id_usuario']);
							$oSmarty->assign('id_padre',0);
							
							//Return name of parent folder
							$name_parent_folder = $oFile->getParentNameFolder($_POST['id_padre']);
							if ($name_parent_folder==""){
								$name_parent_folder = Localizer::getTranslate('tx_sub_file');
							}
						}
						
						//Asignamos el nombre de la carpeta padre
						$oSmarty->assign('name_parent_folder',$name_parent_folder);
						// Cambiamos el directorio de plantillas al que contiene la plantilla a llamar.
						$oSmarty->template_dir = $config_urls['APP_TEMPLATES_DIR']."private/user";
						$result = $oSmarty->fetch('files/row_file.tpl');
						$resultado[2] = $result;
						$resultado[3] = $_POST['id_archivo'];
		}else{
						$resultado[0]="Ups! No se puede editar esta carpeta!";
					 	$resultado[1]=1;	
		}
	
	echo json_encode($resultado);
?>
