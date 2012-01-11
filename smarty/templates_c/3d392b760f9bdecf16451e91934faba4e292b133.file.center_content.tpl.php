<?php /* Smarty version Smarty-3.0.8, created on 2012-01-10 22:29:20
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/public/login/center_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20294893794f0cbbc03efdf5-27115602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d392b760f9bdecf16451e91934faba4e292b133' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/public/login/center_content.tpl',
      1 => 1326155436,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20294893794f0cbbc03efdf5-27115602',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/javascript">
//Función encargada de cambiar el estado del boton de login
function cambiarBotonLogin() {
	$("#blogin").removeClass("azul");
	$("#blogin").addClass("gris");
	$("#blogin").attr('disabled', 'disabled');
	$("#id_cargando").toggle();
	$("#mensaje").css("display","none");
}


var var_requerido_usuario =  "<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_requerido_usuario<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" ;
var var_requerido_password =  "<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_requerido_password<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" ;

$(document).ready(function() {
    // Validación del formulario.
    var validator = $("#form_login").validate({
        rules: {
    		username: {
				required: true,
				minlength: 4
			},
			password: {
				required: true
			}
        },
        messages: {
        	username: {
				required: var_requerido_usuario ,
				minlength: ""
			},
			password: {
				required: var_requerido_password,
				minlength: ""
			}
        },
//        // Función aplicada cuando se produce un error de validación en el elemento pasado como parámetro.
//		// Se pasa también como como parámetro un array con un objeto html error, error[0].
//        errorPlacement: function(error, element) {
//			// Concatenamos el siguiente hijo del padre del elemnto el array de errores.
//			// En nuestro caso abajo en el formulario serían los <div> vacíos.
//			error.appendTo(element.parent().next());
//        },
        // Especifimos que hará el submir cuando el formulario sea válido, está función anulará el action definido en el formulario.
        submitHandler: function() {
			// Codificamos la clave.
			cambiarBotonLogin();
			// Inicamos la petición.
	        $.ajax({
	            type: 'POST',
	            url: '<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
login/verificate',
	            data: $('#form_login').serialize(),
	            // before: mostrarVentanaCargando(),
	            // complete: ocultarVentanaCargando(), 
	            success: function(data) {
		        	var result = jQuery.parseJSON(data);
		      	  	if (result[1]==1){
			      	  	$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('error');
						$('#error').removeClass('success');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#password").val("");
						$("#blogin").removeClass("gris");
						$("#blogin").addClass("azul");
						$("#blogin").removeAttr("disabled");
						$("#id_cargando").hide("slow");
						
		      	  	}else if (result[1]==2){
		      	  		$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('success');
						$('#error').removeClass('error');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#password").val("");
						$("#blogin").removeClass("gris");
						$("#blogin").addClass("azul");
						$("#blogin").removeAttr("disabled");
						$("#id_cargando").hide("slow");
						window.location.replace("<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
admin");
		      	  }else if (result[1]==3){
			      		$('#retorno_usuario').html(result[0]);
						$('#mensaje').css('display','block');
						$('#error').addClass('success');
						$('#error').removeClass('error');
						$('#mensaje').delay(4000).fadeOut(400);
						$("#password").val("");
						$("#blogin").removeClass("gris");
						$("#blogin").addClass("azul");
						$("#blogin").removeAttr("disabled");
						$("#id_cargando").hide("slow");
						window.location.replace("<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/files");
			      	  }

					
	            }
	        });
        }
    });
});	

</script>




 <div class="container">
    	   <div class="content">
				  
			   <div style="margin-top:50px; background-color: #E7EEF1;
			    border-bottom-left-radius: 3px;
			    border-bottom-right-radius: 3px;
			    color: #23566D;
			    padding: 20px 15px;
			    text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.7);">
					<h1><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_login<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h1>
					<p>Join today and start to upload and share your online file storage.<strong>UptoBox</strong> is the best open sources online file storage
					</p>
					<div id="mensaje" style="display:none">
										<div id="error" class="alert-message">
										    <p id="retorno_usuario"></p>
									    </div>
									</div>	
				</div>
				
		        <!-- Main hero unit for a primary marketing message or call to action -->
		 
						<div class="row" style="margin-top:30px;">
								<div class="span8">
									<img style="opacity:0.8;margin-top:-10px" src="<?php echo $_smarty_tpl->getVariable('IMAGES_URL')->value;?>
/login/cloud.jpg" width="985px" />         
			      				</div>
				      			<div class="span12" style="width:400px;border: none; padding: 40px;opacity:0.8" >
				      			 <!-- Modal -->
				      			 	
							        <form name="form_login" id="form_login" method="post">
							        
							        	<div style="width:90%;position: relative; top: auto; left: auto; margin:0 auto;margin-top:-41px;margin-left:100px; z-index: 1" class="modal">
							        	  <div class="modal-header">
							        	    <h3><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_login<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h3>
							        	  </div>
							        	  <div class="modal-body">
										   	  		<h4>Username</h4>
										   	  		<input type="text" class="xlarge required" id="username" name="username" placeholder="Username">
										   	  		<br/><br/>
										   	  		<h4>Password</h4>
											  		<input type="password" class="xlarge required" id="password" name="password" placeholder="Password">
													<input type="hidden" value="1" name="action"/>	
										 			<br/><br/>
										 </div>
							        	  <div class="modal-footer">
							        	  	<img id="id_cargando" style="display:none" src="<?php echo $_smarty_tpl->getVariable('IMAGES_URL')->value;?>
/resources/loading.gif" />
							        	    <input type="submit" class="btn primary" style="float: right;" value="Login" name="logueo" id="blogin"/>	
							        	  </div>
							        	</div>
							        </form>
							      </div>
							    </div>
						        <!-- Example row of columns -->
						        <div class="row" style="margin-left:10px;">
						          <div class="span6">
						            <h2>Heading</h2>
						            <p>Etiam porta sem malesuada magna mollis euismod. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
						            <p><a class="btn" href="#">View details &raquo;</a></p>
						          </div>
						          <div class="span5">
						            <h2>Heading</h2>
						             <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						            <p><a class="btn" href="#">View details &raquo;</a></p>
						         </div>
						         <div class="span5">
						            <h2>Heading</h2>
						             <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
						            <p><a class="btn" href="#">View details &raquo;</a></p>
						         </div>
						        </div>
				         		<hr>
						  </div>
			</div>
	</div>