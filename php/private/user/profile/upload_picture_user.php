<?php
require('../../../../config/config.php');
require(BASE_PATH.'/php/private/user/security.php');
require(BASE_PATH.'/class/user.class.php');	

$id_usuario = $_POST['id_usuario'];
$oUser->asociar_foto_usuario($id_usuario, $_FILES);
header("Location:".BASE_URL."user/profile");
exit();
?>