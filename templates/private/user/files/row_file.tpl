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
	<tr style="border-bottom: 1px solid  #DDDDDD;" id="more_options_row_{$item.id_archivo}">
		<td>
			<div id="sprite_file" style="float:left;width:42px;margin-bottom: 5px;margin-top: 5px;">
				 <img style="vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_folder.png"/>
		    </div>
		    <div id="data_file" style="margin-bottom: 5px;margin-top: 5px;">     
		         <h3><a style="font-size:13px;color:#000;" href="#" onclick="loadPath('{$item.id_archivo}','{$item.nombre}' ,'{$RUTA_WEB_ABSOLUTA}user/path/{$item.id_archivo}/{$item.nombre}');">{$item.nombre}</a></h3>
		         <span class="gris">{translate}tx_update_name_file{/translate} <span class="gris"> {$item.fecha_update|date_format} {translate}tx_update_name_file2{/translate}</span></span>
		         {if $item.id_usuario != $id_usuario}
		         	 <a class="azul" style=" clear:right;" href="#">{$item.nombre_usuario} {$item.apellidos_usuario}</a>
		        {else}
		         <a class="azul" style=" clear:right;" href="{$RUTA_WEB_ABSOLUTA}user/profile">{translate}tx_options_you{/translate}{/if}</a>
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
															$('#title_root').html(result[3]);
														
										            }
										        });
										
									}else if (action == 'settings_folder'){
										displaySettingsFolder(tx_titulo_display,{/literal}{$item.id_archivo}{literal});
									}else if (action == 'new_tab'){
										window.open('{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/files/{/literal}{$item.id_archivo}{literal}/{/literal}{$item.nombre}{literal}');
									}
									{/literal}
								});
								
								
								$("#more_options_row{$item.id_archivo}").contextMenu({
									menu: 'myMenu',
									leftButton: false
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
															$('#title_root').html(result[3]);
															
														
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
			  	<form  method="post" id="{$item.id_archivo}"  name="form-ver-carpeta_{$item.id_archivo}" class="edit_submit">
				    <div class="modal-header">
				    	<img style="vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_folder.png"/>
					    <span style="font-size:22px;color:#525252;font-weight: bold;" id="titulo_archivo"></span>
					    <a href="#" class="close">&times;</a><br/>
				    </div>
				    <div class="modal-body">
				    	<div id="mensaje_{$item.id_archivo}" style="display:none">
							<div id="error" class="alert-message">
							    <p id="retorno_usuario"></p>
						    </div>
					 	</div>
					 	<fieldset>
					 	<div class="clearfix">
				 			<label for="tx_form_name">{translate}tx_form_name{/translate}:</label>
				    		<div class="input">
				    			<div class="inline-inputs">
									<input type="text" class="span6 required" style="padding-left:4px;" id="nombre" name="nombre" placeholder="{translate}tx_form_name_placeholder{/translate}" value="{if isset({$item.nombre})}{$item.nombre}{/if}">
				      				<p id="textoobj"></p>
				      			</div>
				      		</div>
				      	</div>
				      	<div class="clearfix">
				      			<label for="tx_form_description">{translate}tx_form_description{/translate}: {translate}tx_form_name_optional{/translate}</label>
				    			<div class="input">
				    				<div class="inline-inputs">
										<textarea  rows="3" class="span6 required" id="descripcion" name="descripcion" style="width: 331px; height: 88px;padding-left:4px">{if isset({$item.descripcion})}{$item.descripcion}{/if}</textarea>
				      					<p id="textoobj"></p>
				      				</div>
				      			</div>
				      	</div>
				      	<div class="clearfix">
				      			<label for="tx_form_location">{translate}tx_form_location{/translate}:</label>
				    			<div class="input">
				    				<div class="inline-inputs">
										<label for="form_location" class="span6 font-weight-normal">{if isset($name_parent_folder)}{$name_parent_folder}{/if}</label>
				      					<p id="textoobj"></p>
				      				</div>
				      			</div>
				      	</div>
				      	<div class="clearfix">
				      			<label for="tx_form_owner">{translate}tx_form_owner{/translate}:</label>
				    			<div class="input">
				    				<div class="inline-inputs">
										<label for="form_owner" class="span6 font-weight-normal">{if isset($item.nombre_usuario)}{$item.nombre_usuario}{/if} {if isset($item.apellidos_usuario)}{$item.apellidos_usuario}{/if}</label>
				      					<p id="textoobj"></p>
				      				</div>
				      			</div>
				      	</div>
				      	<div class="clearfix">
				      			<label for="tx_form_size">{translate}tx_form_size{/translate}:</label>
				    			<div class="input">
				    				<div class="inline-inputs">
										<label for="form_size" class="span6 font-weight-normal">{if isset($item.max_size)}{Settings::getByteSize($item.max_size)}{/if}</label>
				      					<p id="textoobj"></p>
				      				</div>
				      			</div>
				      	</div>
				      	<div class="clearfix">
				      			<label for="tx_form_created">{translate}tx_form_created{/translate}:</label>
				    			<div class="input">
				    				<div class="inline-inputs">
										<label for="form_created" class="span6 font-weight-normal">{if isset($item.fecha)}{$item.fecha|date_format}{/if}</label>
				      					<p id="textoobj"></p>
				      				</div>
				      			</div>
				      	</div>
				      	<div class="clearfix">
				      			<label for="tx_form_update">{translate}tx_form_update{/translate}:</label>
				    			<div class="input">
				    				<div class="inline-inputs">
										<label for="form_update" class="span6 font-weight-normal">{if isset($item.fecha_update)}{$item.fecha_update|date_format}{/if}</label>
				      					<p id="textoobj"></p>
				      				</div>
				      			</div>
				      	</div>
				      </fieldset>
				    </div>
				    <div class="modal-footer" style="text-align:center;">
				    	<input type="hidden" name="id_usuario" id="id_usuario" value="{$id_usuario}"/> 
				    	<input type="hidden" name="id_archivo" id="id_archivo" value="{$item.id_archivo}"/> 
				    	<input type="hidden" name="id_padre" id="id_padre" value="{$id_padre}"/> 
						<input  type="submit"  id="baceptar_{$item.id_archivo}" name="baceptar" value="{translate}tx_button_accept{/translate}" class="btn small bold azul "/>
						<input type="button" href="#"  class="btn small close bold azul" style="margin-top: 0px;opacity: 1;float:none;" value="{translate}tx_button_cancel{/translate}" />
						
			  		</div>
		  		</form>
			  </div>
		</td>
	</tr>
	{/foreach}
{/if}
