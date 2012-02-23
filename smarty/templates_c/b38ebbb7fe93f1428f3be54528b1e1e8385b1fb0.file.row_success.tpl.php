<?php /* Smarty version Smarty-3.0.8, created on 2012-02-22 16:36:27
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/files/row_success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:308295984f45198bb7eed1-50333213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b38ebbb7fe93f1428f3be54528b1e1e8385b1fb0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/files/row_success.tpl',
      1 => 1328056906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '308295984f45198bb7eed1-50333213',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div  id="upload_success" data-alert="alert" class="alert-message block-message warning fade in" style="display:none">
            <a href="#" class="close">×</a>
            <div id="message_success" class="alert-actions">
        	</div>
</div>	

<div  id="upload_progress" data-alert="alert" class="fade in" style="display:none;float:left;border-bottom: 1px solid  #DDDDDD;width:100%">
         	<div style="clear:both;">
				<div id="sprite_file" style="float:left;width:42px;margin-bottom: 5px;margin-top: -8px;">
					 <img style="vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
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
