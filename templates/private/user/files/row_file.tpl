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
	{foreach name="files_tree" from=$aFile item=item key=key}
	<tr style="border-bottom: 1px solid  #DDDDDD;" id="more_options_{$item.id_archivo}">
		<td>
			<div id="sprite_file" style="float:left;width:42px;margin-bottom: 5px;margin-top: 5px;">
				 <img style="vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_folder.png"/>
		    </div>
		    <div id="data_file" style="margin-bottom: 5px;margin-top: 5px;">     
		         <h3>{$item.nombre}</h3>
		         <span class="gris">{translate}tx_update_name_file{/translate} <span class="gris"> {$item.fecha|date_format:"%d/%m/%Y"} {translate}tx_update_name_file2{/translate}</span></span>
		         <a class="azul" style=" clear:right;" href="#"> {if $item.id_usuario != $id_usuario}{$item.nombre_usuario} {$item.apellidos_usuario}{else}{translate}tx_options_you{/translate}{/if}</a>
				<ul class="options_list right">
					<li class="op_more">
					 	<a id="more_options_{$item.id_archivo}" data-placement="above" rel='twipsy'  href="#" data-original-title='More Options'></a>
					 	<script>
					 		$("#more_options_{$item.id_archivo}").contextMenu({
									menu: 'myMenu',
									leftButton: true
								}, function(action, el, pos) {
									{literal}
									if (action == 'open'){
											
											cambiarUrl('/{/literal}{$item.id_archivo}{literal}/{/literal}{$item.nombre}{literal}');
											
											$.ajax({
										            type: 'POST',
										            url: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/path/{/literal}{$item.id_archivo}{literal}/{/literal}{$item.nombre}{literal}',
										            data: '',
										            // before: mostrarVentanaCargando(),
										            // complete: ocultarVentanaCargando(), 
										            success: function(data) {
											        	var result = jQuery.parseJSON(data);
															$("#loading").toggle();
															$('#loading').delay(2000).fadeOut(400);
															$('#row_file').html(result[0]);
															$('#id_padre').val(result[1]);
														
										            }
										        });
										
									}else if (action == 'settings_folder'){
										displaySettingsFolder(tx_titulo_display,{/literal}{$item.id_archivo}{literal});
									}else if (action == 'new_tab'){
										window.open('{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/files/{/literal}{$item.id_archivo}{literal}/{/literal}{$item.nombre}{literal}');
									}
									{/literal}
								});
					 		
					 	</script>
					</li>
				</ul>
			</div>
			  <!-- The Modal Dialog Folder Property-->
			  <div id="modal-folder-property_{$item.id_archivo}" class="modal hide fade" style="width:500px;">
			  	<form  method="post" id="form_ver_carpeta_{$item.id_archivo}" name="form_ver_carpeta_{$item.id_archivo}" class="form_mensaje">
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
				    	<input type="hidden" name="id_usuario" id="id_usuario" value="{$id_usuario}"/> 
				    	<input type="button" href="#" class="btn small close bold azul" style="margin-top: 0px;opacity: 1;" value="{translate}tx_button_cancel{/translate}" />
						<input type="submit" id="baceptar" name="baceptar" value="{translate}tx_button_accept{/translate}" class="btn small bold azul"/>
						
			  		</div>
		  		</form>
			  </div>
		</td>
	</tr>
	{/foreach}
{/if}
