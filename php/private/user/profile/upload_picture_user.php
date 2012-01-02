<?php
require('../../../../config/config.php');
require($config_urls['BASE_PATH'].'/php/private/user/security.php');
require($config_urls['BASE_PATH'].'/class/user.class.php');	

$id_usuario = $_POST['id_usuario'];
$oUser->asociar_foto_usuario($id_usuario, $_FILES);
header("Location:".$config_urls['BASE_URL']."user/profile");
exit();
?>