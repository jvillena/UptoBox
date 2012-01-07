<?php /* Smarty version Smarty-3.0.8, created on 2012-01-07 12:31:10
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/profile/tab_general.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19557128204f082cfe3764c0-57666089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd82d862cec938edf21693bb9e7bf162aa73152e1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/profile/tab_general.tpl',
      1 => 1325935858,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19557128204f082cfe3764c0-57666089',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
		<div class="alert-message block-message info" style="margin-top:120px;margin-left:5px;margin-right:5px;">
		        <p><strong><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_general_tittle<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</strong> <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_general_sub_tittle<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</p>
		</div>
		<div id="mensaje" style="display:none">
			<div id="error" class="alert-message">
			    <p id="retorno_usuario"></p>
		    </div>
		</div>	
		
		<div class="row" style="margin-top:30px;margin-bottom:30px">
			 <div class="span3" style="margin-top:-15px;">
					
					<div class="span8 offset2">
								<form id="form_general" name="form_general" method="post">
										<table id="datos_general" cellspacing="10px;" width="100%" style="padding:20px;">
											<tr>
												<td style="border:0" colspan="3" id="retorno_perfil">
													
												</td>
											</tr>
											<tr>
												<td width="30%">	
													<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_time_zone<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
												</td>
												<td>
													<select id="timezone" name="timezone" class="xlarge">
													<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('aTimeZone')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['zone_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['zone_name'];?>
</option>
													<?php }} ?>
													</select>
												</td>
											</tr>
											<tr>
												<td  width="30%">	
													<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_language<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
												</td>
												<td align="left">
													<select id="language" name="language" class="xlarge">
													<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('aLanguages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['idioma'];?>
</option>
													<?php }} ?>
													</select>
												</td>
											</tr>
											<tr>
												<td style="border:0;" colspan="2">
													<img id="id_cargando" style="display:none;float:left" src="<?php echo $_smarty_tpl->getVariable('IMAGES_URL')->value;?>
resources/loading.gif" />
													<input type="submit" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_edit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" id="boton_modificar_perfil_general" class="btn info right" style="margin-right: 45px;margin-top:4px">
												</td>
											</tr>

										</table>
							</form>	
					</div>
			</div>	
		</div>	