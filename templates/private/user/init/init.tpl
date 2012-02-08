{literal}
 <script>        
        function createUploader(){            
            var uploader = new qq.FileUploaderBasic({
            	element: document.getElementById('file-upload'),
                button:document.getElementById('file-upload'),
                name: 'ifiles',
                params: {
        			id_user: '{/literal}{$id_usuario}{literal}'
    			},
    			multiple: true,
                allowedExtensions: ['docx','ppt','pptx','bmp','psd','dmg',"txt","csv","xml",'css','doc','xls','rtf','pdf','swf','flv','avi','wmv','mov','jpg','jpeg','gif','png'],
                sizeLimit: 419430400, // max size   
				minSizeLimit: 0, // min size
 				onProgress: function(id, filename, loaded, total) {
 					 $('.qq-upload-list').hide();
 					$("#progressbar").css('display','block'); 
                    console.log('Progress for file: %s, ID: %s, loaded: %s, total: %s => %s', id, filename, loaded, total, "divID");
                    var percent = Math.round((loaded / total) * 100);
                     $("#progressbar").progressbar({ value: percent });
                    $('#message_progress').html('Uploading: ' + filename + ', ' + percent + '%' + ' (' + loaded + '/' + total + ')');
                    $('#upload_progress').show('slow');
                    
                },
                onComplete: function(id, filename, responseJSON) {
                    console.log('File upload for file %s, id %s done with status %s => %s', filename, id, responseJSON, "divID");
                    $('#upload_success').toggle();
                    //$('#upload_progress').hide();
                    $('#message_success').html( 'Finished: ' + filename);
                    $("#progressbar").css('display','none');
                },
                onSubmit: function(id, fileName){
                	 $(".qq-upload-list").empty();
                	 $("#progressbar").css('display','block');
                	  $("#progressbar").progressbar({ value: 0 });
	             	 //$('#file-upload').addClass("loading");
	             },
                action: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/upload/files',
                debug: true
            });           
        }
        
        // in your app create uploader as soon as the DOM is ready
        // don't wait for the window to load  
        window.onload = createUploader;     
    </script>   
<script type="text/javascript">
			var tx_titulo_display ='{/literal}{$tx_titulo_display}{literal}';
			
			
			function setBlankHash2() {
			     	if (location.href.indexOf("#") > -1) {
			     		location.hash ='' + location.hash ;
					    location.assign(location.href.replace(/\/?#/, "/"));
					}

			}
			function cambiarUrl(url){
				location.hash = url;
				//parent.location.hash =   url_parent+url;
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
	            url: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/files/create',
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


</script>

{/literal}



<div id="div_inicio" style="margin-top:130px;width:98%;margin-bottom:50px;">
	<div id="mensaje" style="display:none">
		<div id="error" class="alert-message">
		    <p id="retorno_usuario"></p>
    	</div>
	</div>
	<div id="file-uploader">       
   	 <noscript>          
   	     <p>Please enable JavaScript to use file uploader.</p>
   	     <!-- or put a simple form for upload here -->
   	 </noscript>         
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
     
		
		<div id="myList" class="drop_zone">
			<table style="float:left;" class="zebra-striped">
				<tbody >	
						{include file='files/row_success.tpl'}
						<div id="row_file">
							{include file='files/row_file.tpl'}
						</div>
				</tbody>
			</table>
		</div>
		 
		 
		 
		<ul id="myMenu" class="contextMenu">
			<li class="new"><a href="#open">{translate}tx_options_open{/translate}</a></li>
			<li class="open separator"><a href="#new_tab">{translate}tx_options_new_tabs{/translate}</a></li>
			<li class="upload"><a href="#submit_file">{translate}tx_options_upload_fold{/translate}</a></li>
			<li class="settings separator"><a href="#settings_folder">{translate}tx_options_setting_fold{/translate}</a></li>
			<li class="delete"><a href="#submit_file">{translate}tx_options_delete_fold{/translate}</a></li>
		</ul>
		
		<ul id="myMenuOption" class="contextMenu">
			<li class="folder"><a onclick="createFolder('{translate}tx_options_create_new_folder{/translate}');" href="#">{translate}tx_options_new_folder{/translate}</a></li>
			<li class="upload"><a href="#file">{translate}tx_options_upload_file{/translate}</a></li>
		</ul>
	
		{/if}
	<!-- The Modal Dialog  Para mostrar mensaje-->
	  <div id="modal-from-dom" class="modal hide fade" style="width:500px;">
	  	<form  method="post" id="form_crear_carpeta" name="form_crear_carpeta" class="form_mensaje">
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
		    <div class="modal-footer" style="text-align:center;">
		    	<input type="hidden" name="id_usuario" id="id_usuario" value="{$id_usuario}"/> 
		    	
				<input type="submit" id="baceptar" name="baceptar" value="{translate}tx_button_accept{/translate}" class="btn small bold azul"/>
				<input type="button" href="#" class="btn small close bold azul" style="margin-top: 0px;opacity: 1;float:none" value="{translate}tx_button_cancel{/translate}" />
				
	  		</div>
  		</form>
	  </div>
	  
	
</div>
