
<script type="text/javascript">
			
			function createFolder(titulo){
				$('#titulo_archivo').html(titulo);

			 	$('#modal-from-dom').modal({
				   show : true,
				   keyboard : true,
				   backdrop : true
				});
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
			
</script>
<div id="div_inicio" style="margin-top:120px;width:98%">
	<div class="alert-message block-message warning">
        <p><strong>A qué esperas para comenzar!</strong> Puedes crear carpetas o subir archivos. Además, puedes compartirlas con tus colaboradores o amigos.</p>
        <div class="alert-actions">
          <a id="bnew" onclick="createFolder('Crear Nueva Carpeta');" href="#" class="btn small">
          	<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_button_folder.png"/>Nueva Carpeta
          </a> 
          
          <a href="#" class="btn small">
          	<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_button_upload.png"/>Subir Documentos
          </a>
        </div>
      </div>
      <!-- The Modal Dialog  Para mostrar mensaje-->
	  <div id="modal-from-dom" class="modal hide fade" style="width:500px;">
	    <div class="modal-header">
	    	<img style="vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}imagenes/iconos/icon_folder.png"/>
		    <span style="font-size:22px;color:#525252;font-weight: bold;" id="titulo_archivo"></span>
		    <a href="#" class="close">&times;</a><br/>
	    </div>
	    <div class="modal-body">
	    	<h4 style="color: #666666">Nombre:</h4>
			<input type="text" class="span8 required" id="nombre" name="nombre" placeholder="Escribe el nombre de la Carpeta">
	      <p id="textoobj"></p>
	    </div>
	    <div class="modal-footer" style="text-align:right;">
	    	 <input type="button" href="#" class="btn small close bold azul" style="margin-top: 0px;opacity: 1;" value="Cancelar" />
			<input type="submit" id="aceptar" name="aceptar" value="Aceptar" class="btn small bold azul"/>
			
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
		
	<!--	<ul id="myMenuOption" class="contextMenu">
			<li class="folder"><a href="#folder">Nueva Carpeta</a></li>
			<li class="file"><a href="#file">Nuevo Archivo</a></li>
		</ul>
	-->
		
		
</div>
