<?php /* Smarty version Smarty-3.0.8, created on 2012-01-05 18:41:13
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/files/row_file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16111967774f05e0b9b34765-70284319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '766304a1e2f26933b230a9a354a2ff5fc00b0270' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/files/row_file.tpl',
      1 => 1325781150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16111967774f05e0b9b34765-70284319',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/uptobox/smarty/libs/plugins/modifier.date_format.php';
?><tr style="border-bottom: 1px solid  #DDDDDD;">
	<td>
		<div id="sprite_file" style="float:left;width:42px;margin-bottom: 5px;margin-top: 5px;">
			 <img style="vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_folder.png"/>
	    </div>
	    <div id="data_file" style="margin-bottom: 5px;margin-top: 5px;">     
	         <h3><?php echo $_smarty_tpl->getVariable('item')->value['nombre'];?>
</h3>
	         <span class="gris"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_update_name_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <span class="gris"> <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('item')->value['fecha'],"%d/%m/%Y");?>
 <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_update_name_file2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></span>
	         <a class="azul" style=" clear:right;" href="#"> <?php echo $_smarty_tpl->getVariable('item')->value['nombre_usuario'];?>
 <?php echo $_smarty_tpl->getVariable('item')->value['apellidos_usuario'];?>
</a>
			<ul class="options_list right">
				<li class="op_more">
				 	<a id="more_options_<?php echo $_smarty_tpl->getVariable('item')->value['id_archivo'];?>
" data-placement="above" rel='twipsy'  href="#" data-original-title='More Options'></a>
				 	<script>
				 		$("#more_options_<?php echo $_smarty_tpl->getVariable('item')->value['id_archivo'];?>
").contextMenu({
								menu: 'myMenu',
								leftButton: true
							}, function(action, el, pos) {
								alert(
									'Action: ' + action + '\n\n' +
									'Element text: ' + $(el).text() + '\n\n' + 
									'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
									'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
									);
							});
				 		
				 	</script>
				</li>
			</ul>
		</div>
	</td>
</tr>