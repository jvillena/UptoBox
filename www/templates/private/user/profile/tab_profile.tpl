<script type="text/javascript">

{literal}

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
	            url: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/edit/profile',
	            data: $('#form_profile').serialize(),
	            // before: mostrarVentanaCargando(),
	            // complete: ocultarVentanaCargando(), 
	            success:function(data) {
		        	var result = jQuery.parseJSON(data);
		      	  	if (result[1]==1){
						$('#mensaje_error').css('display','block');
						$('#mensaje').css('display','none');
						$('#error').addClass('error');
						$('#error').removeClass('success');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#boton_modificar_perfil").removeClass("gris");
						$("#boton_modificar_perfil").addClass("azul");
						$("#boton_modificar_perfil").removeAttr("disabled");
						$("#id_cargando").hide("slow");
						
		      	  	}else if (result[1]==2){
						$('#mensaje').css('display','block');
						$('#mensaje_error').css('display','none');
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
{/literal}

</script>
<div class="alert-message block-message info" style="margin-top:120px;margin-left:5px;margin-right:5px;">
		        <p><strong>{translate}tx_profile_tittle{/translate}</strong> {translate}tx_profile_sub_tittle{/translate}</p>
		</div>
		<div id="mensaje" style="display:none">
			<div id="error" class="alert-message">
			    <p id="retorno_usuario">{translate}tx_success_profile{/translate}</p>
		    </div>
		</div>	
		<div id="mensaje_error" style="display:none">
			<div id="error" class="alert-message">
			    <p id="retorno_usuario">{translate}tx_error_profile{/translate}</p>
		    </div>
		</div>	
		<div class="row" style="margin-top:30px;margin-bottom:30px">
			 <div class="span3" style="margin-top:-15px;">
					<form id="form_upload_picture" name="form_upload_picture" method="post" action="{$RUTA_WEB_ABSOLUTA}user/profile/upload_picture"  enctype="multipart/form-data">
						
						
						{if $datos_perfil.0.ruta_foto!=""}
							<img style="border: 1px solid #CCC" src="{$RUTA_WEB_ABSOLUTA}libs/rescalado_imagen/image.php/{$RUTA_WEB_ABSOLUTA}datas/users/{$datos_perfil.0.id_usuario}/profile/{$datos_perfil.0.ruta_foto}?height=150&amp;image={$RUTA_WEB_ABSOLUTA}datas/users/{$datos_perfil.0.id_usuario}/profile/{$datos_perfil.0.ruta_foto}"  alt="avatar-grande" />
						{else}
							<img style="border: 1px solid #CCC" src="{$RUTA_WEB_ABSOLUTA}libs/rescalado_imagen/image.php/{$BASE_THEMES_URL}images/icons/icon_avatar_grande.png?height=150&amp;image={$BASE_THEMES_URL}images/icons/icon_avatar_grande.png"  alt="avatar-grande" />
						{/if}	
						<div id="div_input_foto" style="margin-top:2px">
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_picture{/translate}:</span>
							<input type="file" name="foto_usuario" id="foto_usuario" style="width:200px;"></br>
							<input type="hidden" id="id_usuario" name="id_usuario" value="{$datos_perfil.0.id_usuario}"/>
							<input type="submit" value="{translate}tx_button_upload_picture{/translate}" id="boton_modificar_perfil" class="btn info" style="margin-top:3px;">
						</div>
					</form>
			</div>
			<div class="span8 offset2">
					<form id="form_profile" name="form_profile" method="post" autocomplete="off">
					<table id="datos_perfil" cellspacing="10px;" width="100%" style="padding:20px;">
					<tr>
						<td style="border:0" colspan="3" id="retorno_perfil">
							
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_password{/translate}:</span>
						</td>
						<td>
							<input class="xlarge" type="password" name="password" value="" />
						</td>
					</tr>
					<tr>
						<td  width="30%">	
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_repassword{/translate}:</span>
						</td>
						<td >
							<input class="xlarge" type="password" name="password2" value=""/>
						</td>
					</tr>
					<tr>
						<td  width="30%">	
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_email{/translate}:</span>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="email" id="email" value="{$datos_perfil.0.email}"/>
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_phone{/translate}:</span>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="telefono" id="telefono" value="{$datos_perfil.0.telefono}"/>
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_username{/translate}:</span>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="nombre" id="nombre" value="{$datos_perfil.0.nombre}">
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_surname{/translate}:</span>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="apellidos" id="apellidos" value="{$datos_perfil.0.apellidos}">
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_company{/translate}:</span>
							<small class="gris">{translate}tx_form_name_optional{/translate}</small>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="empresa" id="empresa" value="{$datos_perfil.0.empresa}">
						</td>
					</tr>
					<tr>
						<td width="30%">	
							<span class="marron" style="font-weight: bold">{translate}tx_form_name_web{/translate}:</span>
							<small class="gris">{translate}tx_form_name_optional{/translate}</small>
						</td>
						<td align="left">
							<input class="xlarge required" type="text" name="web" id="web" value="{$datos_perfil.0.web}">
						</td>
					</tr>
					<tr>
						<td style="border:0;" colspan="2">
							<img id="id_cargando" style="display:none;float:left" src="{$IMAGES_URL}resources/loading.gif" />
							<input type="submit" value="{translate}tx_button_edit{/translate}" id="boton_modificar_perfil" class="btn info right" style="margin-right: 45px;margin-top:4px">
						</td>
					</tr>
					
					
				</table>
			</form>
		
				
			</div>
		</div>