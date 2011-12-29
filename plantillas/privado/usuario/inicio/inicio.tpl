
<script type="text/javascript">
			
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
				
				
				// Enable cut/copy
				$("#enableItems").click( function() {
					$('#myMenu').enableContextMenuItems('#cut,#copy');
					$(this).attr('disabled', true);
					$("#disableItems").attr('disabled', false);
				});				
				
			});
			
		</script>
<div id="div_inicio" style="margin-top:120px;width:98%">
	<div class="alert-message block-message warning">
        <p><strong>A qué esperas para comenzar!</strong> Puedes crear carpetas o subir archivos. Además, puedes compartirlas con tus colaboradores o amigos.</p>
        <div class="alert-actions">
          <a href="#" class="btn small">
          <img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_button_folder.png"/>Nueva Carpeta</a> 
          <a href="#" class="btn small"><img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_button_upload.png"/>Subir Documentos</a>
        </div>
      </div>
      
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
		
		
</div>
