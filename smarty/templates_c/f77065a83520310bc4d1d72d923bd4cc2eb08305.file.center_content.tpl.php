<?php /* Smarty version Smarty-3.1.5, created on 2012-03-11 22:52:49
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/center_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10639293494f5d2cc10382b1-48314573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f77065a83520310bc4d1d72d923bd4cc2eb08305' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/center_content.tpl',
      1 => 1330893989,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10639293494f5d2cc10382b1-48314573',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contenido_central' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f5d2cc106f3a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f5d2cc106f3a')) {function content_4f5d2cc106f3a($_smarty_tpl) {?><div class="main-content col eight equal-height">
	<?php if ($_smarty_tpl->tpl_vars['contenido_central']->value=='inicio'){?>
		<?php echo $_smarty_tpl->getSubTemplate ("init/init.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }elseif($_smarty_tpl->tpl_vars['contenido_central']->value=='viewer'){?>
		<?php echo $_smarty_tpl->getSubTemplate ("viewer/viewer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }elseif($_smarty_tpl->tpl_vars['contenido_central']->value=='profile'){?>
		<?php echo $_smarty_tpl->getSubTemplate ("profile/tabs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
</div>
<?php }} ?>