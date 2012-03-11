<?php /* Smarty version Smarty-3.1.5, created on 2012-03-11 22:53:00
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/files/row_success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2796866174f5d2ccc56e737-34172022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09b9bb8c3287e42801f7415b39c213c61b2498c2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/files/row_success.tpl',
      1 => 1329960375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2796866174f5d2ccc56e737-34172022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_THEMES_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f5d2ccc5ffc2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f5d2ccc5ffc2')) {function content_4f5d2ccc5ffc2($_smarty_tpl) {?><div  id="upload_success" data-alert="alert" class="alert-message block-message warning fade in" style="display:none">
            <a href="#" class="close">×</a>
            <div id="message_success" class="alert-actions">
        	</div>
</div>	

<div  id="upload_progress" data-alert="alert" class="fade in" style="display:none;float:left;border-bottom: 1px solid  #DDDDDD;width:100%">
         	<div style="clear:both;">
				<div id="sprite_file" style="float:left;width:42px;margin-bottom: 5px;margin-top: -8px;">
					 <img style="vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_file.png"/>
			    </div>
			    <div id="data_file" style="margin-bottom: 5px;margin-top: 5px;">
			    	<div style="margin-left:50px;width:430px;height:15px;">
		            	<div style="float:left;" id="message_progress" class="alert-actions"></div>
			    		<div style="float:left;height:10px;width:50%" id="progressbar"></div>
			    	</div>  
	        	</div>
        	</div>
</div>
<?php }} ?>