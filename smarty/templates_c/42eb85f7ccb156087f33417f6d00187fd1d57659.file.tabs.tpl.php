<?php /* Smarty version Smarty-3.1.5, created on 2012-02-23 01:14:54
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/profile/tabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11207391364f45930e6476e9-37912458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42eb85f7ccb156087f33417f6d00187fd1d57659' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/profile/tabs.tpl',
      1 => 1329959396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11207391364f45930e6476e9-37912458',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f45930e65c1e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f45930e65c1e')) {function content_4f45930e65c1e($_smarty_tpl) {?>
<div id="profile" class="row tab_content">
		<?php echo $_smarty_tpl->getSubTemplate ('profile/tab_profile.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div id="general" class="row tab_content" style="margin-top:30px;margin-bottom:30px">
		<?php echo $_smarty_tpl->getSubTemplate ('profile/tab_general.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }} ?>