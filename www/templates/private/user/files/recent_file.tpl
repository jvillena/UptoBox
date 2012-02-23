<script>
		function changePath(id, nombre){
				{literal}
				var path = '/'+id+'/'+nombre; 
				var url_file = '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/path/' + id + '/' + nombre + "'";
				cambiarUrl(path);
				
				$.ajax({
			            type: 'POST',
			            url: url_file,
			            data: '',
			            success: function(data) {
				        	var result = jQuery.parseJSON(data);
								$("#loading").toggle();
								$('#loading').delay(2000).fadeOut(400);
								$('#row_file').html(result[0]);
								$('#id_padre').val(result[1]);
							
			            }
			        });
			     {/literal}
		}
	
</script>
<li>
	<img style="width:20px;vertical-align:bottom" src="{$BASE_THEMES_URL}images/icons/{if $item_recent.type_file==''}icon_folder.png{/if}"/>
    <a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="#" onclick="changePath('{$item_recent.id_archivo}','{$item_recent.nombre}');return false;">{$item_recent.nombre}</a>
</li>