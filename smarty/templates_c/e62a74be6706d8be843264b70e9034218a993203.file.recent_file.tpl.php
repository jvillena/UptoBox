<?php /* Smarty version Smarty-3.1.5, created on 2012-02-23 01:15:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/files/recent_file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2441135864f459342761643-76037687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e62a74be6706d8be843264b70e9034218a993203' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/user/files/recent_file.tpl',
      1 => 1329959396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2441135864f459342761643-76037687',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RUTA_WEB_ABSOLUTA' => 0,
    'BASE_THEMES_URL' => 0,
    'item_recent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f4593427c8f0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4593427c8f0')) {function content_4f4593427c8f0($_smarty_tpl) {?><script>
		function changePath(id, nombre){
				
				var path = '/'+id+'/'+nombre; 
				var url_file = '<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/path/' + id + '/' + nombre + "'";
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
			     
		}
	
</script>
<li>
	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/<?php if ($_smarty_tpl->tpl_vars['item_recent']->value['type_file']==''){?>icon_folder.png<?php }?>"/>
    <a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="#" onclick="changePath('<?php echo $_smarty_tpl->tpl_vars['item_recent']->value['id_archivo'];?>
','<?php echo $_smarty_tpl->tpl_vars['item_recent']->value['nombre'];?>
');return false;"><?php echo $_smarty_tpl->tpl_vars['item_recent']->value['nombre'];?>
</a>
</li><?php }} ?>