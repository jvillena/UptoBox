<?php /* Smarty version Smarty-3.0.8, created on 2012-02-06 00:27:28
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/right_side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20773470494f2f1e705589e9-92407506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffdffc4008a905cd39deceb9abe0df7957f4ec34' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/right_side.tpl',
      1 => 1327270084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20773470494f2f1e705589e9-92407506',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="left-nav col two" style="margin-top:110px">
	<div class="equal-height">
		<ul class="lat_menu_navigation">
			<li class="perfil" style="border-top:0px;">
				<div class="header image-block">
				
      			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_title<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul> 
        				 <li>
        					 <img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_folder.png"/>
        					 <a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" onclick="createFolder('<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_create_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
');" href="#"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        				 </li>
        				 <li>
        				     <img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_upload_file.png"/>
        					 <a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
upload"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_upload_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
       				     </li>
       				    </ul> 
        			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_mi_cuenta<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul> 
        				 	<li>
        				 	 	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_perfil.png"/>
        				 		<a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_personal_account<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
        				 	</li>
        				 	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_almacenamiento.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
almacenamiento"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_storages<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
: <?php echo $_smarty_tpl->getVariable('actual_size')->value;?>
 <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_from<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php echo $_smarty_tpl->getVariable('max_size')->value;?>
</a>
       				     	</li>
       				     </ul>
       				     
        			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;margin-bottom:20px;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_activity<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul> 
        					<?php  $_smarty_tpl->tpl_vars['item_recent'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('aRecentFile')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item_recent']->key => $_smarty_tpl->tpl_vars['item_recent']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item_recent']->key;
?>
								<?php $_template = new Smarty_Internal_Template('files/recent_file.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
							<?php }} ?>
        				 	<!-- <li>
        				 	 	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_folder.png"/>
        				 		<a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
perfil">Proyecto Uptobox</a>
        				 	</li>
        				 	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_folder.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
almacenamiento">Documentos de RRHH</a>
       				     	</li>
       				     	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_word.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
almacenamiento">Manual PHP</a>
       				     	</li>
       				     	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_pdf.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
almacenamiento">Tutorial Cocoa</a>
       				     	</li>
       				     -->
       				     </ul>
       				     
        			</div>
			</li>
		</ul>
	</div>
</div>
