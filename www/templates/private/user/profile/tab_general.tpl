<script type="text/javascript">

{literal}

function cambiarBotonGeneralEdit() {
	$("#boton_modificar_perfil_general").removeClass("azul");
	$("#boton_modificar_perfil_general").addClass("gris");
	$("#boton_modificar_perfil_general").attr('disabled', 'disabled');
	$("#id_cargando_general").css("display","block");
	$("#mensaje_general").css("display","none");
}

$(document).ready(function() {
    // Validación del formulario.
    $("#form_general").validate({
        rules: {						
			language: {
			      required: true
			    },
			time_zone: {
			      required: true
			    }	
			
		},
		errorPlacement: function(error, element) {
			// Concatenamos el siguiente hijo del padre del elemnto el array de errores.
			// En nuestro caso abajo en el formulario serÃ­an los <TD> vacÃ­os.
			error.appendTo(element.parent().next());
        },
        messages: {
        	language: "*",	
			time_zone: "*"
        },
        submitHandler: function() {
			// Codificamos la clave.
			cambiarBotonGeneralEdit();
			// Inicamos la petición.
	        $.ajax({
	            type: 'POST',
	            url: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/edit/general',
	            data: $('#form_general').serialize(),
	            // before: mostrarVentanaCargando(),
	            // complete: ocultarVentanaCargando(), 
	            success:function(data) {
		        	var result = jQuery.parseJSON(data);
		      	  	if (result[1]==1){
			      	  	$('#retorno_usuario_general').html(result[0]);
						$('#mensaje_general').css('display','block');
						$('#error_general').addClass('error');
						$('#error_general').removeClass('success');
						$('#mensaje_general').delay(4000).fadeOut(400);
						$("#boton_modificar_perfil_general").removeClass("gris");
						$("#boton_modificar_perfil_general").addClass("azul");
						$("#boton_modificar_perfil_general").removeAttr("disabled");
						$("#id_cargando_general").hide("slow");
						
		      	  	}else if (result[1]==2){
		      	  		$('#retorno_usuario_general').html(result[0]);
						$('#mensaje_general').css('display','block');
						$('#error_general').addClass('success');
						$('#error_general').removeClass('error');
						$('#mensaje_general').delay(4000).fadeOut(400);
						$("#boton_modificar_perfil_general").removeClass("gris");
						$("#boton_modificar_perfil_general").addClass("azul");
						$("#boton_modificar_perfil_general").removeAttr("disabled");
						$("#id_cargando_general").hide("slow");
		      	  }

					
	            }
	        });
        }
    });
	
});		
{/literal}
</script>
		<div class="alert-message block-message info" style="margin-top:120px;margin-left:5px;margin-right:5px;">
		        <p><strong>{translate}tx_general_tittle{/translate}</strong> {translate}tx_general_sub_tittle{/translate}</p>
		</div>
		<div id="mensaje_general" style="display:none">
			<div id="error_general" class="alert-message">
			    <p id="retorno_usuario_general"></p>
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
													<span class="marron" style="font-weight: bold">{translate}tx_form_name_time_zone{/translate}:</span>
												</td>
												<td>
													
													<select id="timezone" name="timezone" class="xlarge">
													{foreach name="timezone" from=$aTimeZone item=item key=key}
														<option {if $item.zone_id == $time_zone_user.0.zone_id}selected="selected"{/if} value="{$item.zone_id}">{$item.gmt} {$item.zone_name} {$item.abbreviation}</option>
													{/foreach}
													</select>
												</td>
											</tr>
											<tr>
												<td  width="30%">	
													<span class="marron" style="font-weight: bold">{translate}tx_form_name_language{/translate}:</span>
												</td>
												<td align="left">
													<select id="language" name="language" class="xlarge">
													{foreach name="Language" from=$aLanguages item=item key=key}
														<option {if $item.id == $language_user.id}selected="selected"{/if} value="{$item.id}">{$item.idioma}</option>
													{/foreach}
													</select>
												</td>
											</tr>
											<tr>
												<td style="border:0;" colspan="2">
													<img id="id_cargando_general" style="display:none;float:left" src="{$IMAGES_URL}resources/loading.gif" />
													<input type="submit" value="{translate}tx_button_edit{/translate}" id="boton_modificar_perfil_general" class="btn info right" style="margin-right: 45px;margin-top:4px">
												</td>
											</tr>

										</table>
							</form>	
					</div>
			</div>	
		</div>	