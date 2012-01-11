<?php /* Smarty version Smarty-3.0.8, created on 2012-01-11 01:36:29
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/files/recent_file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5805151724f0ce79d438dc4-56500661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c7b691a4705ba42258b7b626dfa06ac637d10fe' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/files/recent_file.tpl',
      1 => 1326155437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5805151724f0ce79d438dc4-56500661',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<li>
	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/<?php if ($_smarty_tpl->getVariable('item_recent')->value['type_file']==''){?>icon_folder.png<?php }?>"/>
    <a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
files/<?php echo $_smarty_tpl->getVariable('item_recent')->value['id_archivo'];?>
"><?php echo $_smarty_tpl->getVariable('item_recent')->value['nombre'];?>
</a>
</li>