<?php /* Smarty version Smarty-3.1.5, created on 2012-02-23 01:05:50
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/right_side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3148555674f4590eeb01d35-70742007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf7760d1af0346aa2206f3d197bad9eddee8d00b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/right_side.tpl',
      1 => 1329781106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3148555674f4590eeb01d35-70742007',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_THEMES_URL' => 0,
    'RUTA_WEB_ABSOLUTA' => 0,
    'actual_size' => 0,
    'max_size' => 0,
    'aRecentFile' => 0,
    'item_recent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f4590eec8e6b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4590eec8e6b')) {function content_4f4590eec8e6b($_smarty_tpl) {?><div class="left-nav col two" style="margin-top:110px">
	<div class="equal-height">
		<ul class="lat_menu_navigation">
			<li class="perfil" style="border-top:0px;">
				<div class="header image-block">
				
      			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_title<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul> 
        				 <li>
        					 <img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_folder.png"/>
        					 <a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" onclick="createFolder('<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_create_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
');" href="#"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        				 </li>
        				 <li>
        				     <img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_upload_file.png"/>
        					 <a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
upload"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_upload_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
       				     </li>
       				    </ul> 
        			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_mi_cuenta<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul> 
        				 	<li>
        				 	 	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_perfil.png"/>
        				 		<a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/profile"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_personal_account<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        				 	</li>
        				 	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_almacenamiento.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
almacenamiento"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_storages<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
: <?php echo $_smarty_tpl->tpl_vars['actual_size']->value;?>
 <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_from<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php echo $_smarty_tpl->tpl_vars['max_size']->value;?>
</a>
       				     	</li>
       				     </ul>
       				     
        			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;margin-bottom:20px;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_activity<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul>
        					<?php if ($_smarty_tpl->tpl_vars['aRecentFile']->value!=''){?> 
        					<?php  $_smarty_tpl->tpl_vars['item_recent'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item_recent']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aRecentFile']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item_recent']->key => $_smarty_tpl->tpl_vars['item_recent']->value){
$_smarty_tpl->tpl_vars['item_recent']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item_recent']->key;
?>
        						<?php if ($_smarty_tpl->tpl_vars['item_recent']->value['tipo']==0){?>
									<?php echo $_smarty_tpl->getSubTemplate ('files/recent_file.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

								<?php }?>
							<?php } ?>
							<?php }else{ ?>
								<span class="azul"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_no_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
							<?php }?>
        				 	<!-- <li>
        				 	 	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_folder.png"/>
        				 		<a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
perfil">Proyecto Uptobox</a>
        				 	</li>
        				 	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_folder.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
almacenamiento">Documentos de RRHH</a>
       				     	</li>
       				     	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_word.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
almacenamiento">Manual PHP</a>
       				     	</li>
       				     	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_pdf.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
almacenamiento">Tutorial Cocoa</a>
       				     	</li>
       				     -->
       				     </ul>
       				     
        			</div>
			</li>
		</ul>
	</div>
</div>
<?php }} ?>