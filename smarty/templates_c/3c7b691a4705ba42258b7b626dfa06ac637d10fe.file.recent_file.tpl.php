<?php /* Smarty version Smarty-3.0.8, created on 2012-01-26 09:50:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/files/recent_file.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13362167674f2121f6596e22-50337187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c7b691a4705ba42258b7b626dfa06ac637d10fe' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/private/user/files/recent_file.tpl',
      1 => 1326311365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13362167674f2121f6596e22-50337187',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<script>
		function changePath(id, nombre){
				
				var path = '/'+id+'/'+nombre; 
				var url_file = '<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
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
	<img style="width:20px;vertical-align:bottom" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/icons/<?php if ($_smarty_tpl->getVariable('item_recent')->value['type_file']==''){?>icon_folder.png<?php }?>"/>
    <a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="#" onclick="changePath('<?php echo $_smarty_tpl->getVariable('item_recent')->value['id_archivo'];?>
','<?php echo $_smarty_tpl->getVariable('item_recent')->value['nombre'];?>
');return false;"><?php echo $_smarty_tpl->getVariable('item_recent')->value['nombre'];?>
</a>
</li>