<?php
require('../../../../../application/core/config/config.php');
require($config_urls['BASE_PATH'].'class/user.class.php'); 
require($config_urls['BASE_PATH'].'www/php/private/user/security.php');


$id_usuario = $_POST['id_usuario'];
$oUser->asociar_foto_usuario($id_usuario, $_FILES);
header("Location:".$config_urls['BASE_URL']."user/profile");
exit();
?>