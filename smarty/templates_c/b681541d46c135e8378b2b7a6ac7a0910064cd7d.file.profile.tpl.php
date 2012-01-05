<?php /* Smarty version Smarty-3.0.8, created on 2012-01-05 22:35:27
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/profile/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4256608684f06179f2b36f5-40765760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b681541d46c135e8378b2b7a6ac7a0910064cd7d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/profile/profile.tpl',
      1 => 1325799325,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4256608684f06179f2b36f5-40765760',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script type="text/javascript">



function cambiarBotonEdit() {
	$("#boton_modificar_perfil").removeClass("azul");
	$("#boton_modificar_perfil").addClass("gris");
	$("#boton_modificar_perfil").attr('disabled', 'disabled');
	$("#id_cargando").css("display","block");
	$("#mensaje").css("display","none");
}

$(document).ready(function() {
    // Validación del formulario.
    $("#form_profile").validate({
        rules: {						
			telefono: {
			      required: true,
			      minlength: 9
			    },
			nombre: "required",
			apellidos: "required",
			email: {
			      required: true,
			      email: true
			    }	
			
		},
		errorPlacement: function(error, element) {
			// Concatenamos el siguiente hijo del padre del elemnto el array de errores.
			// En nuestro caso abajo en el formulario serÃ­an los <TD> vacÃ­os.
			error.appendTo(element.parent().next());
        },
        messages: {
        	telefono: "Introduzca un número de teléfono.",	
			nombre: "Introduzca su nombre.",
			apellidos: "Introduzca sus apellidos.",
			email: "Introduzca un email válido."
        },
        submitHandler: function() {
			// Codificamos la clave.
			cambiarBotonEdit();
			// Inicamos la petición.
	        $.ajax({
	            type: 'POST',
	            url: '<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile/edit',
	            data: $('#form_profile').serialize(),
	            // before: mostrarVentanaCargando(),
	            // complete: ocultarVentanaCargando(), 
	            success:function(data) {
		        	var result = jQuery.parseJSON(data);
		      	  	if (result[1]==1){
			      	  	$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('error');
						$('#error').removeClass('success');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#boton_modificar_perfil").removeClass("gris");
						$("#boton_modificar_perfil").addClass("azul");
						$("#boton_modificar_perfil").removeAttr("disabled");
						$("#id_cargando").hide("slow");
						
		      	  	}else if (result[1]==2){
		      	  		$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('success');
						$('#error').removeClass('error');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#boton_modificar_perfil").removeClass("gris");
						$("#boton_modificar_perfil").addClass("azul");
						$("#boton_modificar_perfil").removeAttr("disabled");
						$("#id_cargando").hide("slow");
		      	  }

					
	            }
	        });
        }
    });
	
});		


</script>



<div id="profile" class="row tab_content">
		<?php $_template = new Smarty_Internal_Template('profile/tab_profile.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
</div>
<div id="general" class="row tab_content" style="margin-top:30px;margin-bottom:30px">
	asdfasdfasdf
</div>
