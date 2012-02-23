//Función encargada de cambiar el estado del boton de login
function cambiarBotonLogin() {
	$("#blogin").removeClass("azul");
	$("#blogin").addClass("gris");
	$("#blogin").attr('disabled', 'disabled');
	$("#id_cargando").toggle();
	$("#mensaje").css("display","none");
}

