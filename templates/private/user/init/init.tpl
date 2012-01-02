{literal}
<script type="text/javascript">
			
			function createFolder(titulo){
				$('#titulo_archivo').html(titulo);

			 	$('#modal-from-dom').modal({
				   show : true,
				   keyboard : true,
				   backdrop : true
				});
			}
			
			function cambiarBotonCrear(){
				$("#baceptar").removeClass("azul");
				$("#baceptar").addClass("gris");
				$("#baceptar").attr('disabled', 'disabled');
				$("#id_cargando").toggle();
				$("#mensaje").css("display","none");
			}
			
			$(document).ready( function() {
				
				// Show menu when #myDiv is clicked
				$("#myDiv").contextMenu({
					menu: 'myMenu'
				},
					function(action, el, pos) {
					alert(
						'Action: ' + action + '\n\n' +
						'Element ID: ' + $(el).attr('id') + '\n\n' + 
						'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
						'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
						);
				});
				
				// Show menu when a list item is clicked
				$("#myList UL LI").contextMenu({
					menu: 'myMenu'
				}, function(action, el, pos) {
					alert(
						'Action: ' + action + '\n\n' +
						'Element text: ' + $(el).text() + '\n\n' + 
						'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
						'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
						);
				});
				
				/*$("#bnew").contextMenu({
					menu: 'myMenuOption',
					leftButton: true
				},
					function(action, el, pos) {
					alert(
						'Action: ' + action + '\n\n' +
						'Element ID: ' + $(el).attr('id') + '\n\n' + 
						'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
						'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
						);
				});*/		
				
			});
			
			
			
			
$(document).ready(function() {
    // Validación del formulario.
    var_requerido_nombre = {/literal}"{translate}tx_requerido_nombre_carpeta{/translate}"{literal};
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
	            url: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}files/create',
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
						$("#id_cargando").hide("slow");
						
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
			      	  }

					
	            }
	        });
        }
    });
});	

</script>
{/literal}

<div id="div_inicio" style="margin-top:120px;width:98%">
	<div id="mensaje" style="display:none">
		<div id="error" class="alert-message">
		    <p id="retorno_usuario"></p>
    	</div>
	</div>
	
	{if isset($aFile) && $aFile==""}
	<div class="alert-message block-message warning">
        <p><strong>{translate}tx_init_message{/translate}</strong> {translate}tx_init_message2{/translate}</p>
        <div class="alert-actions">
          <a id="bnew" onclick="createFolder('{translate}tx_options_create_new_folder{/translate}');" href="#" class="btn small">
          	<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_button_folder.png"/>{translate}tx_options_new_folder{/translate}
          </a> 
          
          <a href="#" class="btn small">
          	<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_button_upload.png"/>{translate}tx_options_upload_file{/translate}
          </a>
        </div>
      </div>
      {else}
     
      	<div id="myDiv">
			Right click to view the context menu
		</div>
		
		<div id="myList">
			<ul>
				<li>Item 1</li>
				<li>Item 2</li>
				<li>Item 3</li>
				<li>Item 4</li>
				<li>Item 5</li>
				<li>Item 6</li>
			</ul>
		</div>
		
		<ul id="myMenu" class="contextMenu">
			<li class="new"><a href="#edit">Abrir</a></li>
			<li class="open separator"><a href="#cut">Abrir en un nuevo Tab</a></li>
			<li class="upload"><a href="#copy">Subir fichero a la carpeta</a></li>
		</ul>
		
	<!--	<ul id="myMenuOption" class="contextMenu">
			<li class="folder"><a href="#folder">Nueva Carpeta</a></li>
			<li class="file"><a href="#file">Nuevo Archivo</a></li>
		</ul>
	-->
		{/if}
		 <!-- The Modal Dialog  Para mostrar mensaje-->
	  <div id="modal-from-dom" class="modal hide fade" style="width:500px;">
	  	<form action="#" method="post" id="form_crear_carpeta" name="form_crear_carpeta" class="form_mensaje">
		    <div class="modal-header">
		    	<img style="vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_folder.png"/>
			    <span style="font-size:22px;color:#525252;font-weight: bold;" id="titulo_archivo"></span>
			    <a href="#" class="close">&times;</a><br/>
		    </div>
		    <div class="modal-body">
		    	<div id="mensaje" style="display:none">
					<div id="error" class="alert-message">
					    <p id="retorno_usuario"></p>
				    </div>
			 	</div>
		    	<h4 style="color: #666666">{translate}tx_form_name{/translate}:</h4>
				<input type="text" class="span8 required" id="nombre" name="nombre" placeholder="{translate}tx_form_name_placeholder{/translate}">
		      <p id="textoobj"></p>
		    </div>
		    <div class="modal-footer" style="text-align:right;">
		    	<input type="hidden" name="id_padre" id="id_padre" value="{$id_padre}"/> 
		    	<input type="hidden" name="id_usuario" id="id_usuario" value="{$id_usuario}"/> 
		    	<input type="button" href="#" class="btn small close bold azul" style="margin-top: 0px;opacity: 1;" value="{translate}tx_button_cancel{/translate}" />
				<input type="submit" id="baceptar" name="baceptar" value="{translate}tx_button_accept{/translate}" class="btn small bold azul"/>
				
	  		</div>
  		</form>
	  </div>
</div>
