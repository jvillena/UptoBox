{literal}
<script type="text/javascript">
//Función encargada de cambiar el estado del boton de login
function cambiarBotonLogin() {
	$("#blogin").removeClass("azul");
	$("#blogin").addClass("gris");
	$("#blogin").attr('disabled', 'disabled');
	$("#id_cargando").toggle();
	$("#mensaje").css("display","none");
}


var var_requerido_usuario =  {/literal}"{translate}tx_requerido_usuario{/translate}"{literal} ;
var var_requerido_password =  {/literal}"{translate}tx_requerido_password{/translate}"{literal} ;

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
			      	  	$('#retorno_usuario').html(result[0]);
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
		      	  		$('#retorno_usuario').html(result[0]);
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
			      		$('#retorno_usuario').html(result[0]);
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



 <div class="container" style="margin-top:-100px;">
    	   <div class="content">
				  
			   <div style="margin-top:50px;
			    border-bottom-left-radius: 3px;
			    border-bottom-right-radius: 3px;
			    color: #FFF;
			    padding: 20px 15px;margin-left:40px;">
					<h1>{translate}tx_login{/translate}</h1>
					<p>Join today and start to upload and share your online file storage.<strong>UptoBox</strong> is the best open sources online file storage
					</p>
					<div id="mensaje" style="display:none">
										<div id="error" class="alert-message">
										    <p id="retorno_usuario"></p>
									    </div>
									</div>	
				</div>
				
		        <!-- Main hero unit for a primary marketing message or call to action -->
		 
						<div class="row" style="margin-top:50px;;margin-left:20px;">
								
				      			<div class="span12" style="width:800px;border: none; padding: 0px;opacity:1" >
				      			 <!-- Modal -->
				      			 	
							        <form name="form_login" id="form_login" method="post">
							        
							        	<div style="width:90%;position: relative; top: auto; left: auto; margin:0 auto;margin-top:-41px;margin-left:100px; z-index: 1" class="modal">
							        	  <div class="modal-header">
							        	    <h3>{translate}tx_login{/translate}</h3>
							        	  </div>
							        	  <div class="modal-body">
										   	  		<h4>Username</h4>
										   	  		<input type="text" class="xlarge required" id="username" name="username" placeholder="Username">
										   	  		<br/><br/>
										   	  		<h4>Password</h4>
											  		<input type="password" class="xlarge required" id="password" name="password" placeholder="Password">
													<input type="hidden" value="1" name="action"/>	
										 			<br/><br/>
										 </div>
							        	  <div class="modal-footer">
							        	  	<img id="id_cargando" style="display:none" src="{$IMAGES_URL}/resources/loading.gif" />
							        	    <input type="submit" class="btn primary" style="float: right;" value="Login" name="logueo" id="blogin"/>	
							        	  </div>
							        	</div>
							        </form>
							      </div>
							    </div>
						        
						  </div>
			</div>
	</div>