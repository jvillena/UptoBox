// Devuelve el elemento con el id pasado como parámetro.
function obtenerElemento(id){
	return document.getElementById(id);	
}

// Función encargada de mostrar u ocultar el elemento con el id pasado como parámetro.
function mostrarOcultarElemento(id) {
	if(obtenerElemento(id)) {
		layer = obtenerElemento(id);
		if(layer.style.display == 'none') {
			layer.style.display = 'block';
		}
		else {
			layer.style.display = 'none';
		}
	}
}

// Desplegar contenido.
function mostrarElemento(oculta_puntos, oculta_boton, muestra_texto){
		document.getElementById(oculta_puntos).style.display="none";
		document.getElementById(oculta_boton).style.display="none";
		document.getElementById(muestra_texto).style.display="inline";
}

// Función encargada de marcar o desmarcar los input de tipo "checkbox", siempre y cuando no están desabilitados.
// Además de la marcación o desmarcación, también pinta o "despinta" la línea a la cual pertenece el input.
// Es importante que los input a chequear tenga en el campo type así: type="checkbox"
function formularioMarcarDesmarcarChecks(objeto_input_marcar_desmarcar_todos){
	checked = objeto_input_marcar_desmarcar_todos.checked;
	parentForm = objeto_input_marcar_desmarcar_todos.form;
	inputs = parentForm.getElementsByTagName('input');
	for(i = 0; i < inputs.length; i++) {
		if(inputs[i].type == 'checkbox' && !inputs[i].disabled) {
			inputs[i].checked = checked;
			pintarTd(inputs[i]);
		}
	}
}

// Función encargada para "pintar" las filas del input pasado como parámetro.
// Se da por hecho una estructura tr > td > input, si no, no funcionará.
// El estilo aplicado está definido en la hoja de estilos como 'linea_pintada'
function pintarTd(objeto_input){ 
	tdNode = objeto_input.parentNode;
	trNode = tdNode.parentNode;
	if(objeto_input.checked) {
		trNode.className = 'linea_pintada';
	}
	else {
		trNode.className = '';
	}	
}

// Array de errores utilizado para almacenar los mensajes de error.
var errmsgs = new Array();
// Función encargada de mostrar el bloque de error.
// Insertará el texto pasado como parámetro, además de los mensajes previamente almacenados con las llamadas al método almacenarMensajeError(msg)
// Una vez mostrados será reiniciado el array de errores.
function mostrarBloqueError(text) {
	obtenerElemento('bloque_error').style.display = 'block';
	obtenerElemento('ec_h2').innerHTML = text;
	var error_div = obtenerElemento('ec_p');
    var nmsgs = errmsgs.length;
	var new_error_div = error_div.cloneNode(false);
	error_div.parentNode.replaceChild(new_error_div, error_div);
	for(i = 0; i < nmsgs; i++) {
		var ul = document.createElement('ul');
		var li = document.createElement('li');
		var text2 = document.createTextNode(errmsgs[i]);
		ul.appendChild(li);
		li.appendChild(text2);
		new_error_div.appendChild(ul);
	}
	errmsgs = new Array();
	ocultarElementosInformativos('bloque_error');
}

// Función encargada de almacenar un mensaje de error pasado como parámetro.
// Si existe uno igual previamente almacenado, no lo almacenará.
function almacenarMensajeError(msg) {
	var nmsgs = errmsgs.length;
	var found = false;
	for(i = 0; i < nmsgs; i++) {
		if(errmsgs[i] == msg)
			found = true;
	}
	if(!found)
		errmsgs[nmsgs] = msg;
}

// Array de mensajes utilizado para almacenar los mensajes de éxito.
var okmsgs = new Array();
// Función encargada de mostrar el bloque de éxito.
// Insertará el texto pasado como parámetro, además de los mensajes previamente almacenados con las llamadas al método almacenarMensajeError(msg)
// Una vez mostrados será reiniciado el array de errores.
function mostrarBloqueExito(text) {
	obtenerElemento('bloque_exito').style.display = 'block';
	obtenerElemento('ece_h2').innerHTML = text;
	var exito_div = obtenerElemento('ece_p');
    var nmsgs = okmsgs.length;
	var new_exito_div = exito_div.cloneNode(false);
	exito_div.parentNode.replaceChild(new_exito_div, exito_div);
	for(i = 0; i < nmsgs; i++) {
		var ul = document.createElement('ul');
		var li = document.createElement('li');
		var text2 = document.createTextNode(okmsgs[i]);
		ul.appendChild(li);
		li.appendChild(text2);
		new_exito_div.appendChild(ul);
	}
	okmsgs = new Array();
	ocultarElementosInformativos('bloque_exito');
	$("#bloque_exito").delay(3500).fadeOut(2500);
}

// Función encargada de almacenar un mensaje de éxito pasado como parámetro.
// Si existe uno igual previamente almacenado, no lo almacenará.
function almacenarMensajeExito(msg) {
	var nmsgs = okmsgs.length;
	var found = false;
	for(i = 0; i < nmsgs; i++) {
		if(okmsgs[i] == msg)
			found = true;
	}
	if(!found)
		okmsgs[nmsgs] = msg;
}

// Función llamada para ocultar todos los bloques del arrray posLayers, exceptuando el pasado como parámetro.
function ocultarElementosInformativos(id) {
	posLayers = new Array('bloque_exito', 'bloque_error', 'bloque_basico_recordatorio');
	for(i = 0; i < posLayers.length; i++) {
		if(posLayers[i] != id && obtenerElemento(posLayers[i]))
			obtenerElemento(posLayers[i]).style.display = 'none';
	}
}

function mostrarVentanaCargando() {
	document.getElementById('light').style.display='block';
	document.getElementById('fade').style.display='block';
}

function ocultarVentanaCargando() {
	document.getElementById('light').style.display='none';
	document.getElementById('fade').style.display='none';
}

$(function(){
	$('input').customInput();
});

$(function () {
	$('.tabs').tabs();
});
