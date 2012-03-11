<?php /* Smarty version Smarty-3.1.5, created on 2012-03-11 22:53:00
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/files/row_file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12631205924f5d2ccc607876-75445249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '189a04f2d462ab05ecf9b1d3fcd71b899083669f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/files/row_file.tpl',
      1 => 1330904206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12631205924f5d2ccc607876-75445249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RUTA_WEB_ABSOLUTA' => 0,
    'aFile' => 0,
    'BASE_THEMES_URL' => 0,
    'item' => 0,
    'id_usuario' => 0,
    'name_parent_folder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f5d2ccce2129',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f5d2ccce2129')) {function content_4f5d2ccce2129($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/Applications/XAMPP/xamppfiles/htdocs/uptosave/smarty/libs/plugins/modifier.date_format.php';
?>
<script>
$(document).ready(function() {
	
	//create bubble popups for each element with class "button"
	
	var positions = {
							'top-left'     : {position: 'top',    align: 'left'   },
							'top-center'   : {position: 'top',    align: 'center' },
							'top-right'    : {position: 'top',    align: 'right'  },
							'left-middle'  : {position: 'left',   align: 'middle' },
							'right-middle' : {position: 'right',  align: 'middle' },	
							'bottom-left'  : {position: 'bottom', align: 'left'   },
							'bottom-center': {position: 'bottom', align: 'center' },
							'bottom-right' : {position: 'bottom', align: 'right'  }
						};
			
			
		
  	
	$(".row_f:odd").css("background-color", "#F4F4F8");
    $(".row_f:even").css("background-color", "#FFFFFF");
    $(".row_f:odd").hover(function(){
    	$(this).css("background-color","#f5f5f5");
    	},
    	function(){
	        $(this).css('background-color', '#F4F4F8');
	    });
	 $(".row_f:even").hover(function(){
    	$(this).css("background-color","#f5f5f5");
    	},
    	function(){
	        $(this).css('background-color', '#FFF');
	    });

	
	$(".edit_folder").click(function() {
		var id = $(this).attr("id");
		var ids = id.split("_");
		cambiarBotonEditar(ids[1]);
		$.ajax({
		   type: "POST",
		    url: '<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/files/edit',
		    data: $('#form_edit_fold_'+ids[1]).serialize(),
		   cache: false,
		    success: function(data) {
	        	var result = jQuery.parseJSON(data);
	      	  	if (result[1]==1){
		      	  	$('#retorno_usuario').html(result[0]);
					$('#mensaje').css('display','block');
					$('#error').addClass('error');
					$('#error').removeClass('success');
					$('#nombre_'+ids[1]).val('');
					$('#mensaje').delay(4000).fadeOut(400);
					$("#bedit_"+result[3]).removeClass("gris");
					$("#bedit_"+result[3]).addClass("azul");
					$("#bedit_"+result[3]).removeAttr("disabled");
					$('#modal_edit_'+result[3]).modal('hide');
					$("#id_cargando").hide("slow");
					$("#bedit_"+result[3]).attr("value","Aceptar");
					$("#loading").toggle();
					$('#loading').delay(2000).fadeOut(400);
					$('#row_file').html(result[2]);
					
	      	  }else if (result[1]==2){
		      		$('#retorno_usuario').html(result[0]);
					$('#mensaje').css('display','block');
					$('#error').addClass('success');
					$('#error').removeClass('error');
					$('#nombre_'+ids[1]).val('');
					$('#mensaje').delay(4000).fadeOut(400);
					$("#bedit_"+result[3]).removeClass("gris");
					$("#bedit_"+result[3]).addClass("azul");
					$("#bedit_"+result[3]).removeAttr("disabled");
					$("#id_cargando").hide("slow");
					$('#modal_edit_'+result[3]).modal('hide');
					$("#bedit_"+result[3]).attr("value","Aceptar");
					$("#loading").toggle();
					$('#loading').delay(2000).fadeOut(400);
					$('#row_file').html(result[2]);
		      	  }

				
            }
		
		 });
		
		return false;
	});
});
	
</script>

<?php if (isset($_smarty_tpl->tpl_vars['aFile']->value)&&$_smarty_tpl->tpl_vars['aFile']->value==''){?>
	<div class="alert-message block-message warning">
        <p><strong><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_init_message<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</strong> <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_init_message2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</p>
        <div class="alert-actions">
          <a id="bnew" onclick="createFolder('<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_create_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
');" href="#" class="btn small">
          	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_button_folder.png"/><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_new_folder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

          </a> 
          
          <a href="#" class="btn small">
          	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_button_upload.png"/><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_upload_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

          </a>
        </div>
      </div>
 <?php }else{ ?>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['aFile']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<div style="border-bottom: 1px solid  #DDDDDD;" id="more_options_row_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" class="row_f">
						<div style="clear:both;">
							  <div id="sprite_file" style="float:left;width:42px;margin-bottom: 5px;margin-top: 5px;">
								<?php if ($_smarty_tpl->tpl_vars['item']->value['tipo']==0){?>
									 <img style="vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_folder.png"/>
								 <?php }else{ ?>
								 		<?php if ($_smarty_tpl->tpl_vars['item']->value['id_archivo_padre']==0){?>
								 			<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['name_file'];?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['ext'];?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['type_file'];?>
<?php $_tmp6=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
<?php $_tmp7=ob_get_clean();?><?php echo Tools::getImageFromFile($_tmp1,$_tmp2,$_tmp3,$_tmp4,$_tmp5,$_tmp6,0,35,'',$_tmp7);?>

								 			<script>
								 				
								 				$(document).ready(function() {
									 					$('#div_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
').CreateBubblePopup();
									 					$('#div_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
').SetBubblePopupOptions({
				
				
														position : 'left',
														align	 :'middle',
														tail	 : {align: 'middle'},
														
														innerHtml: '<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
<?php $_tmp9=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['name_file'];?>
<?php $_tmp11=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['ext'];?>
<?php $_tmp12=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['type_file'];?>
<?php $_tmp13=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
<?php $_tmp14=ob_get_clean();?><?php echo Tools::getImageFromFile($_tmp8,$_tmp9,$_tmp10,$_tmp11,$_tmp12,$_tmp13,0,80,$_tmp14);?>
',
					
														innerHtmlStyle: {
																			color:'#FFFFFF', 
																			'text-align':'center',
																			'padding':'6px'
																		},
														
														themeName: 	'azure',
														themePath: 	'<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
libs/jquery/bubblePopup/Examples/images/jquerybubblepopup-theme',
														
														closingDelay: 200
													 
													});
												}); 
								 				
								 			</script>
								 		<?php }else{ ?>
								 			<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
<?php $_tmp15=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
<?php $_tmp16=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
<?php $_tmp17=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['name_file'];?>
<?php $_tmp18=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['ext'];?>
<?php $_tmp19=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['type_file'];?>
<?php $_tmp20=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo_padre'];?>
<?php $_tmp21=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
<?php $_tmp22=ob_get_clean();?><?php echo Tools::getImageFromFile($_tmp15,$_tmp16,$_tmp17,$_tmp18,$_tmp19,$_tmp20,$_tmp21,30,'',$_tmp22);?>

								 			<script>
								 				
								 				$(document).ready(function() {
									 					$('#div_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
').CreateBubblePopup();
									 					$('#div_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
').SetBubblePopupOptions({
				
				
														position : 'left',
														align	 :'middle',
														tail	 : {align: 'middle'},
														
														innerHtml: '<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
<?php $_tmp23=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
<?php $_tmp24=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
<?php $_tmp25=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['name_file'];?>
<?php $_tmp26=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['ext'];?>
<?php $_tmp27=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['type_file'];?>
<?php $_tmp28=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo_padre'];?>
<?php $_tmp29=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
<?php $_tmp30=ob_get_clean();?><?php echo Tools::getImageFromFile($_tmp23,$_tmp24,$_tmp25,$_tmp26,$_tmp27,$_tmp28,$_tmp29,80,'',$_tmp30);?>
',
					
														innerHtmlStyle: {
																			color:'#FFFFFF', 
																			'text-align':'center',
																			'padding':'6px'
																		},
														
														themeName: 	'azure',
														themePath: 	'<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
libs/jquery/bubblePopup/Examples/images/jquerybubblepopup-theme',
														
														closingDelay: 200
													 
													});
												}); 
								 				
								 			</script>
								 		<?php }?>
								 <?php }?>
						  	  </div>
					 		   <div id="data_file" style="margin-bottom: 5px;margin-top: 5px;">     
					        		 <h3>
					        		 	<a style="font-size:13px;color:#000;" href="#" onclick="loadPath('<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
' ,'<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/path/<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</a>
					        		 </h3>
					         		<span class="gris"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_update_name_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <span class="gris"> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['fecha_update']);?>
 <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_update_name_file2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></span>
					         		<?php if ($_smarty_tpl->tpl_vars['item']->value['id_usuario']!=$_smarty_tpl->tpl_vars['id_usuario']->value){?>
					         			 <a class="azul" style=" clear:right;" href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre_usuario'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['apellidos_usuario'];?>
</a>
					        		<?php }else{ ?>
					         			<a class="azul" style=" clear:right;" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/profile"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_options_you<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
					         		<?php }?>
									<ul class="options_list right">
											<li class="op_more">
											 	<a id="more_options_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" data-placement="above" rel='twipsy'  href="#" data-original-title='More Options'></a>
											 	<?php if ($_smarty_tpl->tpl_vars['item']->value['tipo']==0){?> <!-- Folder Options -->
											 	<script>
											 		$("#more_options_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
").contextMenu({
															menu: 'myMenu',
															leftButton: true
														}, function(action, el, pos) {
															
															if (action == 'open'){
																	cambiarUrl('/<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo_padre'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
');
																	
																	$.ajax({
																            type: 'POST',
																            url: '<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/path/<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
',
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
																					$('#id_archivo').html(<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
);
																				
																            }
																        });
																
															}else if (action == 'settings_folder'){
																displaySettingsFolder(tx_titulo_display,<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
,'<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>
');
															}else if (action == 'new_tab'){
																window.open('<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/files/<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
');
															}
															
														});
														
														
														$("#more_options_row_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
").contextMenu({
															menu: 'myMenu',
															leftButton: false
														}, function(action, el, pos) {
															
															if (action == 'open'){
																	
																	cambiarUrl('/<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
');
																	
																	$.ajax({
																            type: 'POST',
																            url: '<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/path/<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
',
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
																displaySettingsFolder(tx_titulo_display,<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
,'<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
','<?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>
');
																
															}else if (action == 'new_tab'){
																window.open('<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/files/<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
');
															}
															
														});
											 		
											 	</script>
											 	<?php }else{ ?> <!-- Files Options -->
											 		 	<script>
											 		$("#more_options_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
").contextMenu({
															menu: 'myMenuFile',
															leftButton: true
														}, function(action, el, pos) {
															
															if (action == 'preview'){
																
																(function($) {
																    $.extend({
																        doGet: function(url, params) {
																            document.location = url + '?' + $.param(params);
																        },
																        doPost: function(url, params) {
																            var $form = $("<form method='POST'>").attr("action", url);
																            $.each(params, function(name, value) {
																                $("<input type='hidden'>")
																                    .attr("name", name)
																                    .attr("value", value)
																                    .appendTo($form);
																            });
																            $form.appendTo("body");
																            $form.submit();
																        }
																    });
																})(jQuery);

																$.doPost("<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
viewer", {
																    id: "<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
",
																    name: "<?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
"
																});
																	
															}else if (action == 'download'){
															}else if (action == 'upload'){
															}else if (action == 'share'){
															}else if (action == 'tags'){
															}else if (action == 'properties'){
															}else if (action == 'move_copy'){
															}else if (action == 'delete_file'){	
															}
															
														});
														
														
														$("#more_options_row_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
").contextMenu({
															menu: 'myMenuFile',
															leftButton: false
														}, function(action, el, pos) {
															
															if (action == 'preview'){
																
															}else if (action == 'download'){
															}else if (action == 'upload'){
															}else if (action == 'share'){
															}else if (action == 'tags'){
															}else if (action == 'properties'){
															}else if (action == 'move_copy'){
															}else if (action == 'delete_file'){	
															}
															
														});
											 		
											 	</script>
											 	<?php }?>
											</li>
									</ul>
								</div>
						
					 			<div id="modal_edit_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" name="modal_edit_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" class="modal hide fade" style="width:500px;">
								  	<form  method="post"  name="form_edit_fold_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" id="form_edit_fold_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" action="" class="form_edit_fold">
									    <div class="modal-header">
									    	<img style="vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_folder.png"/>
										    <span style="font-size:22px;color:#525252;font-weight: bold;" id="titulo_archivo_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
"></span>
										    <a href="#" class="close">&times;</a><br/>
									    </div>
									    <div class="modal-body">
										 	<fieldset>
										 	<div class="clearfix">
									 			<label for="tx_form_name"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
									    		<div class="input">
									    			<div class="inline-inputs">
														<input type="text" class="span6 required" style="padding-left:4px;" id="nombre_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" name="nombre_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_placeholder<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['item']->value['nombre'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
<?php }?>"/>
									      				<p id="textoobj"></p>
									      			</div>
									      		</div>
									      	</div>
									      	<div class="clearfix">
									      			<label for="tx_form_description"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_description<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
: <?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_name_optional<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</label>
									    			<div class="input">
									    				<div class="inline-inputs">
															<textarea  rows="3" class="span6 required" id="descripcion_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" name="descripcion_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
" style="width: 331px; height: 88px;padding-left:4px"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['descripcion'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['descripcion'];?>
<?php }?></textarea>
									      					<p id="textoobj"></p>
									      				</div>
									      			</div>
									      	</div>
									      	<div class="clearfix">
									      			<label for="tx_form_location"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_location<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
									    			<div class="input">
									    				<div class="inline-inputs">
															<label for="form_location" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['name_parent_folder']->value)){?><?php echo $_smarty_tpl->tpl_vars['name_parent_folder']->value;?>
<?php }?></label>
									      					<p id="textoobj"></p>
									      				</div>
									      			</div>
									      	</div>
									      	<div class="clearfix">
									      			<label for="tx_form_owner"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_owner<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
									    			<div class="input">
									    				<div class="inline-inputs">
															<label for="form_owner" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['nombre_usuario'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre_usuario'];?>
<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['item']->value['apellidos_usuario'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['apellidos_usuario'];?>
<?php }?></label>
									      					<p id="textoobj"></p>
									      				</div>
									      			</div>
									      	</div>
									      	<div class="clearfix">
									      			<label for="tx_form_size"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_size<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
									    			<div class="input">
									    				<div class="inline-inputs">
															<label for="form_size" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['max_size'])){?><?php echo Settings::getByteSize($_smarty_tpl->tpl_vars['item']->value['max_size']);?>
<?php }?></label>
									      					<p id="textoobj"></p>
									      				</div>
									      			</div>
									      	</div>
									      	<div class="clearfix">
									      			<label for="tx_form_created"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_created<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
									    			<div class="input">
									    				<div class="inline-inputs">
															<label for="form_created" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['fecha'])){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['fecha']);?>
<?php }?></label>
									      					<p id="textoobj"></p>
									      				</div>
									      			</div>
									      	</div>
									      	<div class="clearfix">
									      			<label for="tx_form_update"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_form_update<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label>
									    			<div class="input">
									    				<div class="inline-inputs">
															<label for="form_update" class="span6 font-weight-normal"><?php if (isset($_smarty_tpl->tpl_vars['item']->value['fecha_update'])){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['fecha_update']);?>
<?php }?></label>
									      					<p id="textoobj"></p>
									      				</div>
									      			</div>
									      	</div>
									      </fieldset>
									    </div>
									    <div class="modal-footer" style="text-align:center;">
									    	<input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
"/> 
									    	<input type="hidden" name="id_archivo" id="id_archivo" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
"/> 
									    	<input type="hidden" name="id_padre" id="id_padre" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo_padre'];?>
"/> 
											<a id="bedit_<?php echo $_smarty_tpl->tpl_vars['item']->value['id_archivo'];?>
"  href="#" class="btn small bold azul edit_folder"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_accept<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
											<input type="button" href="#"  class="btn small close bold azul" style="margin-top: 0px;opacity: 1;float:none;" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_button_cancel<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" />
											
								  		</div>
							  		</form>
							  	</div>
						</div>
				</div>
	<?php } ?>
<?php }?>
<?php }} ?>