<?php /* Smarty version Smarty-3.0.8, created on 2012-01-15 23:25:26
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/public/layout/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20615583494f136066ea90c8-42709093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d054d45e7b1452ea1f8479bd52af947393f5541' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/public/layout/index.tpl',
      1 => 1326413989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20615583494f136066ea90c8-42709093',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo $_smarty_tpl->getVariable('metadescription')->value;?>
"/>
		<link rel="icon" href="favicon.png" type="image/png" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />         
		<link rel='stylesheet' type='text/css' href='<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
css/login.css' />
		<link rel='stylesheet' type='text/css' href='<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
css/bootstrap.css' />
		<link rel='stylesheet' type='text/css' href='<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
css/base.css' />
		<link rel='stylesheet' type='text/css' href='<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/jquery_ui/css/ui-lightness/jquery-ui-1.8.12.custom.css' />
		<link rel='stylesheet' type='text/css' href='<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/contextmenu/jquery.contextMenu.css' />
		<title><?php echo $_smarty_tpl->getVariable('metatitle')->value;?>
</title>

        <!-- Javascripts necesarios para la validación de formularios. -->
        <script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/jquery.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/validate/validate.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/jquery-ui/jquery-ui.custom.js" type="text/javascript"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/jquery.cookie.js" type="text/javascript"></script>
		
	

		<!-- Javascripts necesarios para estilos en radio y checkbox. -->
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/checkbox/customInput.jquery.js" type="text/javascript"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/comunes.js" type="text/javascript"></script>

		<!-- Javascripts necesarios para usar efectos de bootstrap en css. -->
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/bootstrap/bootstrap-dropdown.js" type="text/javascript"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/bootstrap/bootstrap-tabs.js" type="text/javascript"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/bootstrap/bootstrap-modal.js" type="text/javascript"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/bootstrap/bootstrap-twipsy.js" type="text/javascript"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/bootstrap/bootstrap-tabs.js" type="text/javascript"></script>
		<!-- Javascripts necesarios para usar el context Menu. -->
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/contextmenu/jquery.contextMenu.js" type="text/javascript"></script>
		
		<!-- Javascripts necesarios para treeview. -->
		<link href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/dynatree/skin-vista/ui.dynatree.css" rel="stylesheet" type="text/css">
		<script src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/javascript/jquery/dynatree/jquery.dynatree.js" type="text/javascript"></script>
		
		<!-- Añade esta etiqueta en la cabecera o delante de la etiqueta body. -->
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
		  {lang: 'es'}
		</script>		

    </head>
    <body>
    	<div id="header">
			<?php echo $_smarty_tpl->getVariable('HEADER')->value;?>

		</div>
		<div id="wrapper">
			<div  class="wrapper-all">
				<?php echo $_smarty_tpl->getVariable('CONTENIDO_CENTRAL')->value;?>

				<?php echo $_smarty_tpl->getVariable('LATERAL_DERECHO')->value;?>

			</div>
			
		</div>
		<div id="footer">
			<?php echo $_smarty_tpl->getVariable('FOOTER')->value;?>

		</div>
    </body>
</html>