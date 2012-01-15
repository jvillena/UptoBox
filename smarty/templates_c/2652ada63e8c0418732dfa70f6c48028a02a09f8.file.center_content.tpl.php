<?php /* Smarty version Smarty-3.0.8, created on 2012-01-15 23:41:25
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/center_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15172499014f13642540b0f5-80581292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2652ada63e8c0418732dfa70f6c48028a02a09f8' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/center_content.tpl',
      1 => 1326155436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15172499014f13642540b0f5-80581292',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="main-content col eight equal-height">
	<?php if ($_smarty_tpl->getVariable('contenido_central')->value=='inicio'){?>
		<?php $_template = new Smarty_Internal_Template("init/init.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	<?php }elseif($_smarty_tpl->getVariable('contenido_central')->value=='profile'){?>
		<?php $_template = new Smarty_Internal_Template("profile/tabs.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	<?php }?>
</div>
