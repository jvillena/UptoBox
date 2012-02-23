<?php
require('../../../../config/config.php');
require($config_urls['BASE_PATH'].'/class/file.class.php');
require($config_urls['BASE_PATH'].'/php/private/user/security.php');    


$id_user = $_GET['id_user'];
$datos_usuario=$oSesion->getSesion('datos_usuario');
$id_padre = $datos_usuario['id_root'];
//Path to insert and upload the file
if ($id_padre!=0){
    $path = BASE_PATH.'datas/users/'.$id_user.'/files/'.$id_padre.'/';
}else{
    $path = BASE_PATH.'datas/users/'.$id_user.'/files/';
}
    

// list of valid extensions, ex. array("jpeg", "xml", "bmp")
$allowedExtensions = array('docx','ppt','pptx','bmp','psd','dmg',"txt","csv","xml",'css','doc','xls','rtf','pdf','swf','flv','avi','wmv','mov','jpg','jpeg','gif','png', 'flv','zip','rar');
// max file size in bytes
$sizeLimit = 119430400;

$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
$uploader->setBD($oBD);
$result = $uploader->handleUpload($path,false,$id_user,$id_padre);    


    
//$result = $oFile->uploadFileFolder($path);

echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
?>