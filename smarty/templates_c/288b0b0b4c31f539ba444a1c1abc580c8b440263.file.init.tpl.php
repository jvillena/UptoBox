<?php /* Smarty version Smarty-3.0.8, created on 2012-01-21 20:37:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/init/init.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3175734914f1b21fdd281b2-04858860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '288b0b0b4c31f539ba444a1c1abc580c8b440263' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/init/init.tpl',
      1 => 1327177824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3175734914f1b21fdd281b2-04858860',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/uptobox/smarty/libs/plugins/modifier.date_format.php';
?>
<script type="text/javascript">
			var tx_titulo_display ='<?php echo $_smarty_tpl->getVariable('tx_titulo_display')->value;?>
';
			
			
			function setBlankHash2() {
			     	if (location.href.indexOf("#") > -1) {
					    location.assign(location.href.replace(/\/?#/, "/"));
					}

			}
			function cambiarUrl(url){
				parent.location.hash = url;
			}
			
			
			function createFolder(titulo){
				$('#titulo_archivo').html(titulo);

			 	$('#modal-from-dom').modal({
				   show : true,
				   keyboard : true,
				   backdrop : true
				});
			}
			function displaySettingsFolder(titulo, id, nombre, descripcion){
			 	$('#modal_edit_'+id).modal({
				   show: true, 
				   backdrop : true, 
				   keyboard: true
				});
				
				$('#titulo_archivo_'+id).html(titulo);
				$('#nombre_'+id).val(nombre);
				$('#descripcion_'+id).html(descripcion);
			}
			
			function cambiarBotonCrear(){
				$("#baceptar").removeClass("azul");
				$("#baceptar").addClass("gris");
				$("#baceptar").attr("value","loading...");
				$("#baceptar").attr('disabled', 'disabled');
				$("#id_cargando").toggle();
				$("#loading").toggle();
				$("#mensaje").css("display","none");
			}
			
			function cambiarBotonEditar(id){
				$("#bedit_"+id).removeClass("azul");
				$("#bedit_"+id).addClass("gris");
				$("#bedit_"+id).attr("value","loading...");
				$("#bedit_"+id).attr('disabled', 'disabled');
				$("#id_cargando").toggle();
				$("#loading").toggle();
				$("#mensaje").css("display","none");
			}
			
			$(document).ready( function() {
				setBlankHash2();
				// Show menu when #myDiv is clicked
				$("#myDiv").contextMenu({
					menu: 'myMenu'
				},
					function(action, el, pos) {
					/*alert(
						'Action: ' + action + '\n\n' +
						'Element ID: ' + $(el).attr('id') + '\n\n' + 
						'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
						'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
						);*/
				});
				
				// Show menu when a list item is clicked
				$("#myList TR TD").contextMenu({
					menu: 'myMenu'
				}, function(action, el, pos) {
				});
				
				
				
				$("#header").contextMenu({
					menu: 'myMenuOption'
				},
					function(action, el, pos) {
				});		
				
			});
			
			
			
			
$(document).ready(function() {
	$(function () {
		$("a[rel=twipsy]").twipsy({
			live: true
		})
	}); 
    // Validación del formulario.
    var_requerido_nombre = "<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_requerido_nombre_carpeta<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
";
    var validator = $("#form_crear_carpeta").validate({
        rules: {
    		nombre: {
				required: true,
				minlength: 4
			}
        },
        messages: {
        	nombre: {
				required: var_requerido_nombre ,
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
			cambiarBotonCrear();
			// Inicamos la petición.
	        $.ajax({
	            type: 'POST',
	            url: '<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/files/create',
	            data: $('#form_crear_carpeta').serialize(),
	            // before: mostrarVentanaCargando(),
	            // complete: ocultarVentanaCargando(), 
	            success: function(data) {
		        	var result = jQuery.parseJSON(data);
		      	  	if (result[1]==1){
			      	  	$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('error');
						$('#error').removeClass('success');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#nombre").val("");
						$("#baceptar").removeClass("gris");
						$("#baceptar").addClass("azul");
						$("#baceptar").removeAttr("disabled");
						$('#modal-from-dom').modal('hide');
						$("#id_cargando").hide("slow");
						$("#baceptar").attr("value","Aceptar");
						$("#loading").toggle();
						$('#loading').delay(2000).fadeOut(400);
						
		      	  }else if (result[1]==2){
			      		$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('success');
						$('#error').removeClass('error');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#nombre").val("");
						$("#baceptar").removeClass("gris");
						$("#baceptar").addClass("azul");
						$("#baceptar").removeAttr("disabled");
						$("#id_cargando").hide("slow");
						$('#modal-from-dom').modal('hide');
						$("#baceptar").attr("value","Aceptar");
						$("#loading").toggle();
						$('#loading').delay(2000).fadeOut(400);
						$('#row_file').html(result[2]);
			      	  }

					
	            }
	        });
        }
    });
    
    
	

    
   			   	

    
    
});	

$(document).ready(function() {
	$(".edit_folder").click(function() {
		var id = $(this).attr("id");
		var ids = id.split("_");
		cambiarBotonEditar(ids[1]);
		$.ajax({
		   type: "POST",
		    url: '<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/files/edit',
		    data: $('#form_edit_fold_'+ids[1]).serialize(),
		   cache: false,
		    success: function(data) {
	        	var result = jQuery.parseJSON(data);
	      	  	if (result[1]==1){
		      	  	$('#retorno_usuario').html(result[0]);
					$('#mensaje').css('display','block');
					$('#error').addClass('error');
					$('#error').removeClass('success');
					$('#nombre_'+ids[1]).val('');
					$('#mensaje').delay(4000).fadeOut(400);
					$("#bedit_"+result[3]).removeClass("gris");
					$("#bedit_"+result[3]).addClass("azul");
					$("#bedit_"+result[3]).removeAttr("disabled");
					$('#modal_edit_'+result[3]).modal('hide');
					$("#id_cargando").hide("slow");
					$("#bedit_"+result[3]).attr("value","Aceptar");
					$("#loading").toggle();
					$('#loading').delay(2000).fadeOut(400);
					$('#row_file').html(result[2]);
					
	      	  }else if (result[1]==2){
		      		$('#retorno_usuario').html(result[0]);
					$('#mensaje').css('display','block');
					$('#error').addClass('success');
					$('#error').removeClass('error');
					$('#nombre_'+ids[1]).val('');
					$('#mensaje').delay(4000).fadeOut(400);
					$("#bedit_"+result[3]).removeClass("gris");
					$("#bedit_"+result[3]).addClass("azul");
					$("#bedit_"+result[3]).removeAttr("disabled");
					$("#id_cargando").hide("slow");
					$('#modal_edit_'+result[3]).modal('hide');
					$("#bedit_"+result[3]).attr("value","Aceptar");
					$("#loading").toggle();
					$('#loading').delay(2000).fadeOut(400);
					$('#row_file').html(result[2]);
		      	  }

				
            }
		
		 });
		
		return false;
	});
});

</script>


<div id="div_inicio" style="margin-top:130px;width:98%;margin-bottom:50px;">
	<div id="mensaje" style="display:none">
		<div id="error" class="alert-message">
		    <p id="retorno_usuario"></p>
    	</div>
	</div>
	
	<?php if (isset($_smarty_tpl->getVariable('aFile',null,true,false)->value)&&$_smarty_tpl->getVariable('aFile')->value==''){?>
	<div class="alert-message block-message warning">
        <p><strong><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_init_message<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</strong> <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_init_message2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</p>
        <div class="alert-actions">
          <a id="bnew" onclick="createFolder('<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_create_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
');" href="#" class="btn small">
          	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
imagenes/iconos/icon_button_folder.png"/><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

          </a> 
          
          <a href="#" class="btn small">
          	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
imagenes/iconos/icon_button_upload.png"/><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_upload_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

          </a>
        </div>
      </div>
      <?php }else{ ?>
     
		
		<div id="myList">
			<table class="zebra-striped">
				<tbody id="row_file">	
						<?php $_template = new Smarty_Internal_Template('files/row_file.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
				</tbody>
			</table>
		</div>
		 <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('aFile')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		 		 <div id="modal_edit_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" name="modal_edit_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" class="modal hide fade" style="width:500px;">
						  	<form  method="post"  name="form_edit_fold_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" id="form_edit_fold_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" action="" class="form_edit_fold">
							    <div class="modal-header">
							    	<img style="vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_folder.png"/>
								    <span style="font-size:22px;color:#525252;font-weight: bold;" id="titulo_archivo_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
"></span>
								    <a href="#" class="close">&times;</a><br/>
							    </div>
							    <div class="modal-body">
								 	<fieldset>
								 	<div class="clearfix">
							 			<label for="tx_form_name"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
							    		<div class="input">
							    			<div class="inline-inputs">
												<input type="text" class="span6 required" style="padding-left:4px;" id="nombre_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" name="nombre_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_placeholder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['nombre'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
<?php }?>"/>
							      				<p id="textoobj"></p>
							      			</div>
							      		</div>
							      	</div>
							      	<div class="clearfix">
							      			<label for="tx_form_description"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
: <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_optional<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</label>
							    			<div class="input">
							    				<div class="inline-inputs">
													<textarea  rows="3" class="span6 required" id="descripcion_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" name="descripcion_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" style="width: 331px; height: 88px;padding-left:4px"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['descripcion'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>
<?php }?></textarea>
							      					<p id="textoobj"></p>
							      				</div>
							      			</div>
							      	</div>
							      	<div class="clearfix">
							      			<label for="tx_form_location"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_location<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
							    			<div class="input">
							    				<div class="inline-inputs">
													<label for="form_location" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->getVariable('name_parent_folder',null,true,false)->value)){?><?php echo $_smarty_tpl->getVariable('name_parent_folder')->value;?>
<?php }?></label>
							      					<p id="textoobj"></p>
							      				</div>
							      			</div>
							      	</div>
							      	<div class="clearfix">
							      			<label for="tx_form_owner"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_owner<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
							    			<div class="input">
							    				<div class="inline-inputs">
													<label for="form_owner" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['nombre_usuario'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre_usuario'];?>
<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['item']->value['apellidos_usuario'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['apellidos_usuario'];?>
<?php }?></label>
							      					<p id="textoobj"></p>
							      				</div>
							      			</div>
							      	</div>
							      	<div class="clearfix">
							      			<label for="tx_form_size"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_size<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
							    			<div class="input">
							    				<div class="inline-inputs">
													<label for="form_size" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['max_size'])){?><?php echo Settings::getByteSize($_smarty_tpl->tpl_vars['item']->value['max_size']);?>
<?php }?></label>
							      					<p id="textoobj"></p>
							      				</div>
							      			</div>
							      	</div>
							      	<div class="clearfix">
							      			<label for="tx_form_created"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_created<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
							    			<div class="input">
							    				<div class="inline-inputs">
													<label for="form_created" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['fecha'])){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['fecha']);?>
<?php }?></label>
							      					<p id="textoobj"></p>
							      				</div>
							      			</div>
							      	</div>
							      	<div class="clearfix">
							      			<label for="tx_form_update"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_update<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
							    			<div class="input">
							    				<div class="inline-inputs">
													<label for="form_update" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['fecha_update'])){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['fecha_update']);?>
<?php }?></label>
							      					<p id="textoobj"></p>
							      				</div>
							      			</div>
							      	</div>
							      </fieldset>
							    </div>
							    <div class="modal-footer" style="text-align:center;">
							    	<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
"/> 
							    	<input type="hidden" name="id_archivo" id="id_archivo" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
"/> 
							    	<input type="hidden" name="id_padre" id="id_padre" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo_padre'];?>
"/> 
									<a id="bedit_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
"  href="#" class="btn small bold azul edit_folder"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_accept<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
									<input type="button" href="#"  class="btn small close bold azul" style="margin-top: 0px;opacity: 1;float:none;" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_cancel<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" />
									
						  		</div>
					  		</form>
						  </div>
		 <?php }} ?>
		 
		 
		 
		<ul id="myMenu" class="contextMenu">
			<li class="new"><a href="#open"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_open<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
			<li class="open separator"><a href="#new_tab"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_new_tabs<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
			<li class="upload"><a href="#submit_file"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_upload_fold<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
			<li class="settings separator"><a href="#settings_folder"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_setting_fold<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
			<li class="delete"><a href="#submit_file"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_delete_fold<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
		</ul>
		
		<ul id="myMenuOption" class="contextMenu">
			<li class="folder"><a onclick="createFolder('<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_create_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
');" href="#"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
			<li class="upload"><a href="#file"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_upload_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
		</ul>
	
		<?php }?>
	<!-- The Modal Dialog  Para mostrar mensaje-->
	  <div id="modal-from-dom" class="modal hide fade" style="width:500px;">
	  	<form  method="post" id="form_crear_carpeta" name="form_crear_carpeta" class="form_mensaje">
		    <div class="modal-header">
		    	<img style="vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
imagenes/iconos/icon_folder.png"/>
			    <span style="font-size:22px;color:#525252;font-weight: bold;" id="titulo_archivo"></span>
			    <a href="#" class="close">&times;</a><br/>
		    </div>
		    <div class="modal-body">
		    	<div id="mensaje" style="display:none">
					<div id="error" class="alert-message">
					    <p id="retorno_usuario"></p>
				    </div>
			 	</div>
		    	<h4 style="color: #666666"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</h4>
				<input type="text" class="span8 required" id="nombre" name="nombre" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_placeholder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
		      <p id="textoobj"></p>
		    </div>
		    <div class="modal-footer" style="text-align:center;">
		    	<input type="hidden" name="id_padre" id="id_padre" value="<?php echo $_smarty_tpl->getVariable('id_padre')->value;?>
"/> 
		    	<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
"/> 
		    	
				<input type="submit" id="baceptar" name="baceptar" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_accept<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" class="btn small bold azul"/>
				<input type="button" href="#" class="btn small close bold azul" style="margin-top: 0px;opacity: 1;float:none" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_cancel<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" />
				
	  		</div>
  		</form>
	  </div>
	  
	
</div>
