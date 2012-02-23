<?php /* Smarty version Smarty-3.1.5, created on 2012-02-23 01:15:47
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/layout/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9001297254f459343a32ca1-89955894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa81319e487f16bea88d6d0fdffbffe099d887f7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/layout/index.tpl',
      1 => 1329959396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9001297254f459343a32ca1-89955894',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'metadescription' => 0,
    'aStyles' => 0,
    'item' => 0,
    'aScripts' => 0,
    'metatitle' => 0,
    'HEADER' => 0,
    'CONTENIDO_CENTRAL' => 0,
    'LATERAL_DERECHO' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f459343ac0c8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f459343ac0c8')) {function content_4f459343ac0c8($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['metadescription']->value;?>
"/>
    	<meta name="author" content="José E. Villena">
		<link rel="icon" href="favicon.png" type="image/png" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />  
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    	<!--[if lt IE 9]>
    	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    	<![endif]-->
    	
    	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aStyles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<?php echo $_smarty_tpl->tpl_vars['item']->value;?>

		<?php } ?>

		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aScripts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<script language="JavaScript" src='<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
'></script>
		<?php } ?>
		<title><?php echo $_smarty_tpl->tpl_vars['metatitle']->value;?>
</title>
		<!-- Añade esta etiqueta en la cabecera o delante de la etiqueta body. -->
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
		  {lang: 'es'}
		</script>		

    </head>
    <body>
    	<div id="header">
			<?php echo $_smarty_tpl->tpl_vars['HEADER']->value;?>

		</div>
		<div id="wrapper">
			<div  class="wrapper-all">
				<?php echo $_smarty_tpl->tpl_vars['CONTENIDO_CENTRAL']->value;?>

				<?php echo $_smarty_tpl->tpl_vars['LATERAL_DERECHO']->value;?>

			</div>
			
		</div>
		<div id="footer">
			<?php echo $_smarty_tpl->tpl_vars['FOOTER']->value;?>

		</div>
    </body>
</html><?php }} ?>