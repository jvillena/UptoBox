<?php /* Smarty version Smarty-3.1.5, created on 2012-02-23 01:14:29
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave//modules/loginForm/templates/loginForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1475956224f4592f503cae9-33749592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e06e733e2e2c58fe5cf3be9844eaa8cd44237b0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave//modules/loginForm/templates/loginForm.tpl',
      1 => 1329959395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1475956224f4592f503cae9-33749592',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aModuleStyles' => 0,
    'item' => 0,
    'aModuleScripts' => 0,
    'RUTA_WEB_ABSOLUTA' => 0,
    'datas' => 0,
    'is_jquery' => 0,
    'PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f4592f5253d0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4592f5253d0')) {function content_4f4592f5253d0($_smarty_tpl) {?>		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aModuleStyles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<?php echo $_smarty_tpl->tpl_vars['item']->value;?>

		<?php } ?>
		
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aModuleScripts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<script language="JavaScript" src='<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
'></script>
			<?php } ?>
			
			<script  language="JavaScript">
				
					var var_requerido_usuario =  "<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_requerido_usuario<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" ;
					var var_requerido_password =  "<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_requerido_password<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" ;
					
					$(document).ready(function() {
					    // Validación del formulario.
					    var validator = $("#form_login").validate({
					        rules: {
					    		username: {
									required: true,
									minlength: 4
								},
								password: {
									required: true
								}
					        },
					        messages: {
					        	username: {
									required: var_requerido_usuario ,
									minlength: ""
								},
								password: {
									required: var_requerido_password,
									minlength: ""
								}
					        },
					//        // Función aplicada cuando se produce un error de validación en el elemento pasado como parámetro.
					//		// Se pasa también como como parámetro un array con un objeto html error, error[0].
					//        errorPlacement: function(error, element) {
					//			// Concatenamos el siguiente hijo del padre del elemnto el array de errores.
					//			// En nuestro caso abajo en el formulario serían los <div> vacíos.
					//			error.appendTo(element.parent().next());
					//        },
					        // Especifimos que hará el submir cuando el formulario sea válido, está función anulará el action definido en el formulario.
					        submitHandler: function() {
								// Codificamos la clave.
								cambiarBotonLogin();
								// Inicamos la petición.
						        $.ajax({
						            type: 'POST',
						            url: '<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
login/verificate',
						            data: $('#form_login').serialize(),
						            // before: mostrarVentanaCargando(),
						            // complete: ocultarVentanaCargando(), 
						            success: function(data) {
							        	var result = jQuery.parseJSON(data);
							      	  	if (result[1]==1){
								      	  	$('#retorno_usuario_error').css('display','block');
								      	  	$('#retorno_usuario').css('display','none');
											$('#mensaje').css('display','block');
											$('#error').addClass('error');
											$('#error').removeClass('success');
											$('#mensaje').delay(4000).fadeOut(400);
											$("#password").val("");
											$("#blogin").removeClass("gris");
											$("#blogin").addClass("azul");
											$("#blogin").removeAttr("disabled");
											$("#id_cargando").hide("slow");
											
							      	  	}else if (result[1]==2){
							      	  		$('#retorno_usuario').css('display','block');
							      	  		$('#retorno_usuario_error').css('display','none');
											$('#mensaje').css('display','block');
											$('#error').addClass('success');
											$('#error').removeClass('error');
											$('#mensaje').delay(4000).fadeOut(400);
											$("#password").val("");
											$("#blogin").removeClass("gris");
											$("#blogin").addClass("azul");
											$("#blogin").removeAttr("disabled");
											$("#id_cargando").hide("slow");
											window.location.replace("<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
admin");
							      	  }else if (result[1]==3){
								      		$('#retorno_usuario').css('display','block');
								      		$('#retorno_usuario_error').css('display','none');
											$('#mensaje').css('display','block');
											$('#error').addClass('success');
											$('#error').removeClass('error');
											$('#mensaje').delay(4000).fadeOut(400);
											$("#password").val("");
											$("#blogin").removeClass("gris");
											$("#blogin").addClass("azul");
											$("#blogin").removeAttr("disabled");
											$("#id_cargando").hide("slow");
											window.location.replace("<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/files");
								      	  }
					
										
						            }
						        });
					        }
					    });
					});	


			</script>
			
			
		

	     
					        	<!-- Modal -->
					              <form name="<?php echo $_smarty_tpl->tpl_vars['datas']->value['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['datas']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['is_jquery']->value){?> action="<?php echo $_smarty_tpl->tpl_vars['datas']->value['action'];?>
" <?php }?> method="<?php echo $_smarty_tpl->tpl_vars['datas']->value['method'];?>
">
					              			<div style="width:90%;position: relative; top: auto; left: auto; margin:0 auto;margin-top:-41px;margin-left:100px; z-index: 1" class="modal">
								        	  <div class="modal-header">
								            		<h3><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
name<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h3>
								              </div>
								        	  <div class="modal-body">
								        	  			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['datas']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
										          	  		<h4><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h4>
										          	  		<input type="<?php echo $_smarty_tpl->tpl_vars['datas']->value['type'][$_smarty_tpl->tpl_vars['item']->value];?>
" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" name="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" class="xlarge required" />
										          	  		<br/><br/>
										          	  	<?php } ?>
											 </div>
								        	  <div class="modal-footer">
								        	  	<input type="hidden" value="1" name="action"/>	
								        	  	<img id="id_cargando" style="display:none" src="<?php echo $_smarty_tpl->tpl_vars['PATH']->value;?>
img/loading.gif" />
								        	    <input tabindex="3" type="submit" class="btn primary" style="float: right;" value="<?php echo $_smarty_tpl->tpl_vars['datas']->value['submit']['value'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['datas']->value['submit']['name'];?>
" id="<?php echo $_smarty_tpl->tpl_vars['datas']->value['submit']['id'];?>
"/>	
								        	  </div>
								        	</div>
						          	  
					        	  </form>
					    

<?php }} ?>