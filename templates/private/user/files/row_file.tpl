<tr style="border-bottom: 1px solid  #DDDDDD;">
	<td>
		<div id="sprite_file" style="float:left;width:42px;margin-bottom: 5px;margin-top: 5px;">
			 <img style="vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_folder.png"/>
	    </div>
	    <div id="data_file" style="margin-bottom: 5px;margin-top: 5px;">     
	         <h3>{$item.nombre}</h3>
	         <span class="gris">{translate}tx_update_name_file{/translate} <span class="gris"> {$item.fecha} {translate}tx_update_name_file2{/translate}</span></span>
	         <a class="azul" style=" clear:right;" href="#"> {$item.nombre_usuario} {$item.apellidos_usuario}</a>
			<ul class="options_list right">
				<li class="op_more">
				 	<a id="more_options_{$item.id_archivo}" data-placement="above" rel='twipsy'  href="#" data-original-title='More Options'></a>
				 	<script>
				 		$("#more_options_{$item.id_archivo}").contextMenu({
								menu: 'myMenu',
								leftButton: true
							}, function(action, el, pos) {
								alert(
									'Action: ' + action + '\n\n' +
									'Element text: ' + $(el).text() + '\n\n' + 
									'X: ' + pos.x + '  Y: ' + pos.y + ' (relative to element)\n\n' + 
									'X: ' + pos.docX + '  Y: ' + pos.docY+ ' (relative to document)'
									);
							});
				 		
				 	</script>
				</li>
			</ul>
		</div>
	</td>
</tr>