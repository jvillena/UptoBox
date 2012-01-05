<?php /* Smarty version Smarty-3.0.8, created on 2012-01-05 23:46:56
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/profile/tabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4087333524f062860896e67-43404702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95cc548164ed63219a329014cc580d5a1612fdea' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/profile/tabs.tpl',
      1 => 1325801591,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4087333524f062860896e67-43404702',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div id="profile" class="row tab_content">
		<?php $_template = new Smarty_Internal_Template('profile/tab_profile.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
<div id="general" class="row tab_content" style="margin-top:30px;margin-bottom:30px">
		<?php $_template = new Smarty_Internal_Template('profile/tab_general.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
