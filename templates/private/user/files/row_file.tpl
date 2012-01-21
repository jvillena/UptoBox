
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
					         <h3><a style="font-size:13px;color:#000;" href="#" onclick="loadPath('{$item.id_archivo}','{$item.nombre}' ,'{$RUTA_WEB_ABSOLUTA}user/path/{$item.id_archivo}/{$item.nombre}');return false;">{$item.nombre}</a></h3>
					         <span class="gris">{translate}tx_update_name_file{/translate} <span class="gris"> {$item.fecha_update|date_format} {translate}tx_update_name_file2{/translate}</span></span>
					         {if $item.id_usuario != $id_usuario}
					         	 <a class="azul" style=" clear:right;" href="#">{$item.nombre_usuario} {$item.apellidos_usuario}</a>
					        {else}
					         <a class="azul" style=" clear:right;" href="{$RUTA_WEB_ABSOLUTA}user/profile">{translate}tx_options_you{/translate}</a>
					         {/if}
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
													displaySettingsFolder(tx_titulo_display,{/literal}{$item.id_archivo}{literal},'{/literal}{$item.nombre}{literal}','{/literal}{$item.descripcion}{literal}');
												}else if (action == 'new_tab'){
													window.open('{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/files/{/literal}{$item.id_archivo}{literal}/{/literal}{$item.nombre}{literal}');
												}
												{/literal}
											});
											
											
											$("#more_options_row_{$item.id_archivo}").contextMenu({
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
													displaySettingsFolder(tx_titulo_display,{/literal}{$item.id_archivo}{literal},'{/literal}{$item.nombre}{literal}','{/literal}{$item.descripcion}{literal}');
													
												}else if (action == 'new_tab'){
													window.open('{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/files/{/literal}{$item.id_archivo}{literal}/{/literal}{$item.nombre}{literal}');
												}
												{/literal}
											});
								 		
								 	</script>
								</li>
							</ul>
						</div>
						
				
						
					</td>
				</tr>
				
				
	{/foreach}
{/if}
