<?php /* Smarty version Smarty-3.0.8, created on 2012-01-05 18:26:47
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/public/layout/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12814216824f05dd57b9df55-59566569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70593f5bc19e23b37830e907172f37872b75e708' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptobox/templates/public/layout/header.tpl',
      1 => 1325704479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12814216824f05dd57b9df55-59566569',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<script type="text/javascript">
$(document).ready(function() {
	$('#topbar').dropdown();
});
</script>

<div class="topbar" data-dropdown="dropdown">
	<div class="topbar-inner">
		<span id="loading" class="label important right" style="display:none;margin-top: 7px;margin-right: 5px;">Loading...</span>
  		<div class="container" style="width:980px">
			<a id="brand" class="brand margin-top-1" href="<?php if ($_smarty_tpl->getVariable('LOGUEADO')->value){?><?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/files<?php }else{ ?><?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
<?php }?>"><img src="<?php echo $_smarty_tpl->getVariable('IMAGES_URL')->value;?>
/logos/logo.png" /></a>
			<?php if ($_smarty_tpl->getVariable('LOGUEADO')->value){?>
			<ul class="nav">
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='files'){?>class="active"<?php }?>>
					<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/files" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_fichero<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='contact'){?>class="active"<?php }?>>
						<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
personal" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='contact'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_colaboradores<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
			
				<li class="dropdown <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='myaccount'){?> active <?php }?>">
						<a href="#" class="dropdown-toggle"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_mi_cuenta<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
						<ul class="dropdown-menu">
							<li>
								<a class="azul" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile">
									<div class="bd">
					        				<table>
					        					<tr>
					        						<td>
					        						<?php if ($_smarty_tpl->getVariable('foto')->value==''){?>
					        							<img style="border: 1px solid #CCC" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/iconos/icon_avatar_grande.png?width=30&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/iconos/icon_avatar_grande.png"  alt="avatar-grande" />
					        						<?php }else{ ?>
					        							<img style="border: 1px solid #CCC" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
/profile/<?php echo $_smarty_tpl->getVariable('foto')->value;?>
?width=30&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
/profile/<?php echo $_smarty_tpl->getVariable('foto')->value;?>
"  alt="avatar-grande" />
					        						<?php }?>	
					        						</td>
					        						<td>
					        							<span class="azul" style="float:left;font-weight: bold;"><?php echo $_smarty_tpl->getVariable('nombre_usuario')->value;?>
</span>
					     				     			<span style="float:left;" class="azul margin-top-5" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_lat_izq_acceder_perfil<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
					        						</td>
				        					</tr>
				        				</table>
				        			</div>
								
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="azul" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
logout"><span class="azul" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></a>
							</li>
						</ul>
					</li>
			</ul>
			<ul class="nav secondary-nav" style="margin-right: 10px;">
           		<li class="menu" data-dropdown="menu">
           			<?php if ($_smarty_tpl->getVariable('LOGUEADO')->value){?>
						<form action="" class="pull-left">
			          	  <input type="text" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_search_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
			          	</form>
			          	
					<?php }?>
				</li>
			</ul>
			<?php }else{ ?>
			<ul class="nav">
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='inicio'){?>class="active"<?php }?>>
					<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_inicio<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
personal" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='pagina_personal'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_personal<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
empresas" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='pagina_empresa'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_empresa<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
como_funciona" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='como_funciona'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_planes_pago<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='crea_tu_perfil'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
planes_precios" <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='pagina_precios'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_precios<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='faqs'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
faqs" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_faqs<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
			</ul>
			<ul class="nav secondary-nav" style="margin-right: 10px;">
           		<li class="menu" data-dropdown="menu">
           			<button class="btn small primary margin-top-5" onclick="location.href='<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
login'"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_login<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</button>
           			<ul class="dropdown-menu">
							<li><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_conf_perfil<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
logout"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
					</ul>
				</li>
			</ul>
			<?php }?>
		</div>
	</div>
	<?php if ($_smarty_tpl->getVariable('LOGUEADO')->value){?>
	<div class="page-header">
			<div class="wrapper-all">
		          
		          	<table class="page_table">
        					<tr>
        						<td>
        							<h1><?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }elseif(isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='myaccount'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_myaccount<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?> <small><?php if ($_smarty_tpl->getVariable('menu_principal')->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_message<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></small></h1>			
        							  <div id="tabs_menu" style="float:left;margin-bottom:-3px;">
        							    <ul class="tabs">
									    	<li class="active" style="background-color:#fff">
									    		<a href="#" style="line-height:10px; color:#545454;font-weight: bold;background-color:#fff;background-image: none;"><?php if (isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }elseif(isset($_smarty_tpl->getVariable('menu_principal',null,true,false)->value)&&$_smarty_tpl->getVariable('menu_principal')->value=='myaccount'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_tabs_profile<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></a>
									    	</li>
									    </ul>
									   </div>
        						</td>
        						<td>
        						
        						</td>
        						<td style="width:22%; ">
        							<?php if ($_smarty_tpl->getVariable('foto')->value==''){?>
        							<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile">
        								<img style="float:left;border: 1px solid #CCC;padding:4px;" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/iconos/icon_avatar_grande.png?width=40&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
images/iconos/icon_avatar_grande.png"  alt="avatar-grande" />
	        						</a>
	        						<?php }else{ ?>
	        						<a href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
user/profile">
	        							<img style="float:left;border: 1px solid #CCC;padding:4px;" src="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
libs/php/rescalado_imagen/image.php/<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
/profile/<?php echo $_smarty_tpl->getVariable('foto')->value;?>
?width=40&amp;image=<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
datas/users/<?php echo $_smarty_tpl->getVariable('id_usuario')->value;?>
/profile/<?php echo $_smarty_tpl->getVariable('foto')->value;?>
"  alt="avatar-grande" />
	        						</a>
	        						<?php }?>	
	        						<div style="float:left;margin-top:30px;margin-left:4px;">
     				     				<a class="enlace-color" href="<?php echo $_smarty_tpl->getVariable('RUTA_WEB_ABSOLUTA')->value;?>
logout"><span class="azul" style="background-color:#F5F5F5;padding:2px;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></a>
     				     				<span class="label warning">Upgrade</span>
     				     			</div>
        						</td>
        					</tr>
        				</table>
		    </div>
	</div>
	<?php }?>
</div>

