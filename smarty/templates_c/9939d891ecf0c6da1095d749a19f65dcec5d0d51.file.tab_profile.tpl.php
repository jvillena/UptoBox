<?php /* Smarty version Smarty-3.0.8, created on 2012-01-15 23:36:20
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/profile/tab_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9491485194f1362f48120f9-65973552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9939d891ecf0c6da1095d749a19f65dcec5d0d51' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/profile/tab_profile.tpl',
      1 => 1326155437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9491485194f1362f48120f9-65973552',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">



function cambiarBotonEdit() {
	$("#boton_modificar_perfil").removeClass("azul");
	$("#boton_modificar_perfil").addClass("gris");
	$("#boton_modificar_perfil").attr('disabled', 'disabled');
	$("#id_cargando").css("display","block");
	$("#mensaje").css("display","none");
}

$(document).ready(function() {
    // Validación del formulario.
    $("#form_profile").validate({
        rules: {						
			telefono: {
			      required: true,
			      minlength: 9
			    },
			nombre: "required",
			apellidos: "required",
			email: {
			      required: true,
			      email: true
			    }	
			
		},
		errorPlacement: function(error, element) {
			// Concatenamos el siguiente hijo del padre del elemnto el array de errores.
			// En nuestro caso abajo en el formulario serÃ­an los <TD> vacÃ­os.
			error.appendTo(element.parent().next());
        },
        messages: {
        	telefono: "Introduzca un número de teléfono.",	
			nombre: "Introduzca su nombre.",
			apellidos: "Introduzca sus apellidos.",
			email: "Introduzca un email válido."
        },
        submitHandler: function() {
			// Codificamos la clave.
			cambiarBotonEdit();
			// Inicamos la petición.
	        $.ajax({
	            type: 'POST',
	            url: '<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/edit/profile',
	            data: $('#form_profile').serialize(),
	            // before: mostrarVentanaCargando(),
	            // complete: ocultarVentanaCargando(), 
	            success:function(data) {
		        	var result = jQuery.parseJSON(data);
		      	  	if (result[1]==1){
			      	  	$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('error');
						$('#error').removeClass('success');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#boton_modificar_perfil").removeClass("gris");
						$("#boton_modificar_perfil").addClass("azul");
						$("#boton_modificar_perfil").removeAttr("disabled");
						$("#id_cargando").hide("slow");
						
		      	  	}else if (result[1]==2){
		      	  		$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('success');
						$('#error').removeClass('error');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#boton_modificar_perfil").removeClass("gris");
						$("#boton_modificar_perfil").addClass("azul");
						$("#boton_modificar_perfil").removeAttr("disabled");
						$("#id_cargando").hide("slow");
		      	  }

					
	            }
	        });
        }
    });
	
});		


</script>
<div class="alert-message block-message info" style="margin-top:120px;margin-left:5px;margin-right:5px;">
		        <p><strong><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_profile_tittle<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</strong> <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_profile_sub_tittle<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</p>
		</div>
		<div id="mensaje" style="display:none">
			<div id="error" class="alert-message">
			    <p id="retorno_usuario"></p>
		    </div>
		</div>	
		<div class="row" style="margin-top:30px;margin-bottom:30px">
			 <div class="span3" style="margin-top:-15px;">
					<form id="form_upload_picture" name="form_upload_picture" method="post" action="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile/upload_picture"  enctype="multipart/form-data">
						
						
						<?php if ($_smarty_tpl->getVariable('datos_perfil')->value[0]['ruta_foto']!=''){?>
							<img style="border: 1px solid #CCC" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['id_usuario'];?>
/profile/<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['ruta_foto'];?>
?height=150&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['id_usuario'];?>
/profile/<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['ruta_foto'];?>
"  alt="avatar-grande" />
						<?php }else{ ?>
							<img style="border: 1px solid #CCC" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_avatar_grande.png?height=150&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/icon_avatar_grande.png"  alt="avatar-grande" />
						<?php }?>	
						<div id="div_input_foto" style="margin-top:2px">
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_picture<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
							<input type="file" name="foto_usuario" id="foto_usuario" style="width:200px;"></br>
							<input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['id_usuario'];?>
"/>
							<input type="submit" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_upload_picture<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" id="boton_modificar_perfil" class="btn info" style="margin-top:3px;">
						</div>
					</form>
			</div>
			<div class="span8 offset2">
					<form id="form_profile" name="form_profile" method="post">
					<table id="datos_perfil" cellspacing="10px;" width="100%" style="padding:20px;">
					<tr>
						<td style="border:0" colspan="3" id="retorno_perfil">
							
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_password<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
						</td>
						<td>
							<input class="xlarge" type="password" name="password" >
						</td>
					</tr>
					<tr>
						<td  width="30%">	
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_repassword<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
						</td>
						<td >
							<input class="xlarge" type="password" name="password2">
						</td>
					</tr>
					<tr>
						<td  width="30%">	
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_email<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="email" id="email" value="<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['email'];?>
"/>
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_phone<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="telefono" id="telefono" value="<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['telefono'];?>
"/>
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_username<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="nombre" id="nombre" value="<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['nombre'];?>
">
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_surname<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="apellidos" id="apellidos" value="<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['apellidos'];?>
">
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_company<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
							<small class="gris"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_optional<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</small>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="empresa" id="empresa" value="<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['empresa'];?>
">
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_web<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</span>
							<small class="gris"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_optional<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</small>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="web" id="web" value="<?php echo $_smarty_tpl->getVariable('datos_perfil')->value[0]['web'];?>
">
						</td>
					</tr>
					<tr>
						<td style="border:0;" colspan="2">
							<img id="id_cargando" style="display:none;float:left" src="<?php echo $_smarty_tpl->getVariable('IMAGES_URL')->value;?>
resources/loading.gif" />
							<input type="submit" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_edit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" id="boton_modificar_perfil" class="btn info right" style="margin-right: 45px;margin-top:4px">
						</td>
					</tr>
					
					
				</table>
			</form>
		
				
			</div>
		</div>