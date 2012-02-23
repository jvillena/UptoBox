		{foreach from=$aModuleStyles item=item}
			{$item}
		{/foreach}
		
			{foreach from=$aModuleScripts item=item}
				<script language="JavaScript" src='{$item}'></script>
			{/foreach}
			{literal}
			<script  language="JavaScript">
				
					var var_requerido_usuario =  "{/literal}{translate}tx_requerido_usuario{/translate}{literal}" ;
					var var_requerido_password =  "{/literal}{translate}tx_requerido_password{/translate}{literal}" ;
					
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
						            url: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}login/verificate',
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
											window.location.replace("{/literal}{$RUTA_WEB_ABSOLUTA}{literal}admin");
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
											window.location.replace("{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/files");
								      	  }
					
										
						            }
						        });
					        }
					    });
					});	


			</script>
			{/literal}
			
		

	     
					        	<!-- Modal -->
					              <form name="{$datas.name}" id="{$datas.id}" {if !$is_jquery} action="{$datas.action}" {/if} method="{$datas.method}">
					              			<div style="width:90%;position: relative; top: auto; left: auto; margin:0 auto;margin-top:-41px;margin-left:100px; z-index: 1" class="modal">
								        	  <div class="modal-header">
								            		<h3>{translate}name{/translate}</h3>
								              </div>
								        	  <div class="modal-body">
								        	  			{foreach from=$datas.fields key=key item=item}
										          	  		<h4>{translate}{$item}{/translate}</h4>
										          	  		<input type="{$datas.type.$item}" placeholder="{translate}{$item}{/translate}" name="{$item}" id="{$item}" class="xlarge required" />
										          	  		<br/><br/>
										          	  	{/foreach}
											 </div>
								        	  <div class="modal-footer">
								        	  	<input type="hidden" value="1" name="action"/>	
								        	  	<img id="id_cargando" style="display:none" src="{$PATH}img/loading.gif" />
								        	    <input tabindex="3" type="submit" class="btn primary" style="float: right;" value="{$datas.submit.value}" name="{$datas.submit.name}" id="{$datas.submit.id}"/>	
								        	  </div>
								        	</div>
						          	  
					        	  </form>
					    

