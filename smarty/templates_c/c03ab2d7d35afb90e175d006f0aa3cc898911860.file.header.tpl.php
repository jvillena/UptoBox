<?php /* Smarty version Smarty-3.1.5, created on 2012-02-23 01:05:51
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/layout/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13877206294f4590ef8889c2-28488496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c03ab2d7d35afb90e175d006f0aa3cc898911860' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/private/layout/header.tpl',
      1 => 1329780706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13877206294f4590ef8889c2-28488496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RUTA_WEB_ABSOLUTA' => 0,
    'tx_titulo_treeview' => 0,
    'LOGUEADO' => 0,
    'IMAGES_URL' => 0,
    'menu_principal' => 0,
    'foto' => 0,
    'BASE_THEMES_URL' => 0,
    'id_usuario' => 0,
    'nombre_usuario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f4590efe43e4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f4590efe43e4')) {function content_4f4590efe43e4($_smarty_tpl) {?>
	
<script type="text/javascript">
	$(document).ready(function() {
		$('#topbar').dropdown();
		$(".tab_content").hide(); //Esconde todo el contenido
		$("ul.tabs li:first").addClass("active").show(); //Activa la primera tab
		$(".tab_content:first").show(); //Muestra el contenido de la primera tab
		
		$("ul.tabs li").click(function() {


		$("ul.tabs li").removeClass("active"); //Elimina las clases activas
	
		$(this).addClass("active"); //Agrega la clase activa a la tab seleccionada
	
		$(".tab_content").hide(); //Esconde todo el contenido de la tab
	
		var activeTab = $(this).find("a").attr("href"); //Encuentra el valor del atributo href para identificar la tab activa + el contenido
		
		if(activeTab=='#profile'){
			ruta="profile";
		}
		else if(activeTab=='#general'){
			ruta="general";
		}

		$("#loading").show();	
		$.ajax({
			      type: "POST",
			      url: '<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/tabs/'+ruta,
		      	  success:function(data){
		      	  	var result = jQuery.parseJSON(data);
					$("#loading").hide();
					$(activeTab).html(result);
					$(activeTab).fadeIn(); //Agrega efecto de transición (fade) en el contenido activo
		      	  }
			});
			
			
		
			return false;
	
		});
	});
</script>

<script type="text/javascript">
	
  $(document).ready(function() {
	 
    // --- Initialize sample trees
    $("#tree").dynatree({
      title: "<?php echo $_smarty_tpl->tpl_vars['tx_titulo_treeview']->value;?>
",
      fx: { height: "toggle", duration: 200 },
      minExpandLevel: 1,
      autoFocus: false, // Set focus to first child, when expanding or lazy-loading.
      // In real life we would call a URL on the server like this:
//          initAjax: {
//              url: "/getTopLevelNodesAsJson",
//              data: { mode: "funnyMode" }
//              },
      // .. but here we use a local file instead:
      initAjax: {
        url: "<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/files/treeview/0"
        },
	  
      onActivate: function(node) {
       				 cambiarUrl('/'+node.data.key+'/'+node.data.title);
					 $.ajax({
				            type: 'POST',
				            url: '<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/path/'+node.data.key+'/'+node.data.title,
				            data: '',
				            // before: mostrarVentanaCargando(),
				            // complete: ocultarVentanaCargando(), 
				            success: function(data) {
					        	var result = jQuery.parseJSON(data);
									$("#loading").toggle();
									$('#loading').delay(2000).fadeOut(400);
									$('#row_file').html(result[0]);
									//$('#id_padre').val(result[1]);
									$('#title_root').html(node.data.title);	
									$('#tree_collapse').css('display','none');
									$('#sub_root_tree').html(result[2]);
									$('#sub_root_tree').css('display','block');
									$("#tree").hide();
								
				            }
				        });
      },

      onLazyRead: function(node){
        // In real life we would call something like this:
//              node.appendAjax({
//                  url: "/getChildrenAsJson",
//                data: {key: node.data.key,
//                       mode: "funnyMode"
//                         }
//              });
        // .. but here we use a local file instead:
        node.appendAjax({
          url: "<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/files/treeview/"+node.data.key,
          // We don't want the next line in production code:
          debugLazyDelay: 750
        });
      }
    });
    $("#btnReloadActive").click(function(){
      var node = $("#tree").dynatree("getActiveNode");
      if( node && node.isLazy() ){
        node.reloadChildren(function(node, isOk){
        });
      }else{
        alert("Please activate a lazy node first.");
      }
     });
     
     $("#wrapper").click(function(){
      $("#tree").hide();
      return true;
    });
     
     $("#tree_collapse").click(function(){
      $("#tree").dynatree("getRoot").visit(function(node){
        node.expand(false);
      });
      return false;
    });
    
    
    

    $("#btnLoadKeyPath").click(function(){
      var tree = $("#tree").dynatree("getTree");
      // Make sure that node #_27 is loaded, by traversing the parents.
      // The callback is executed for every node as we go:
      tree.loadKeyPath("/folder4/_23/_26/_27", function(node, status){
        if(status == "loaded") {
          // 'node' is a parent that was just traversed.
          // If we call expand() here, then all nodes will be expanded
          // as we go
          node.expand();
        }else if(status == "ok") {
          // 'node' is the end node of our path.
          // If we call activate() or makeVisible() here, then the
          // whole branch will be exoanded now
          node.activate();
        }
      });
     });
  });
  
  function loadPath(id_archivo, nombre, url){
  					cambiarUrl('/'+id_archivo+'/'+nombre);
											$.ajax({
									            type: 'POST',
									            url: url,
									            data: '',
									            // before: mostrarVentanaCargando(),
									            // complete: ocultarVentanaCargando(), 
									            success: function(data) {
										        	var result = jQuery.parseJSON(data);
														$("#loading").toggle();
														$('#loading').delay(2000).fadeOut(400);
														$('#row_file').html(result[0]);
														$('#id_padre').val(result[1]);
														$('#tree_collapse').css('display','none');
														$('#sub_root_tree').html(result[2]);
														$('#sub_root_tree').css('display','block');
														$('#title_root').html(result[3]);
														$("#tree").hide();
													
									            }
									        });
  }
  
</script>






<div class="topbar" data-dropdown="dropdown">
	<div class="topbar-inner">
		<span id="loading" class="label important right" style="display:none;margin-top: 7px;margin-right: 5px;">Loading...</span>
  		<div class="container" style="width:980px">
			<a id="brand" class="brand margin-top-1" href="<?php if ($_smarty_tpl->tpl_vars['LOGUEADO']->value){?><?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/files<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
<?php }?>"><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGES_URL']->value;?>
/logos/logo.png" /></a>
			<?php if ($_smarty_tpl->tpl_vars['LOGUEADO']->value){?>
			<ul class="nav">
				<li <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='files'){?>class="active"<?php }?>>
					<a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/files" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_fichero<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
				<li <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='contact'){?>class="active"<?php }?>>
						<a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
personal" <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='contact'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_colaboradores<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
			
				<li class="dropdown <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='myaccount'){?> active <?php }?>">
						<a href="#" class="dropdown-toggle"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_mi_cuenta<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
						<ul class="dropdown-menu">
							<li>
								<a class="azul" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/profile">
									<div class="bd">
					        				<table>
					        					<tr>
					        						<td>
					        						<?php if ($_smarty_tpl->tpl_vars['foto']->value==''){?>
					        							<img style="border: 1px solid #CCC" src="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
libs/rescalado_imagen/image.php/<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_avatar_grande.png?width=30&amp;image=<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_avatar_grande.png"  alt="avatar-grande" />
					        						<?php }else{ ?>
					        							<img style="border: 1px solid #CCC" src="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
libs/rescalado_imagen/image.php/<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
datas/users/<?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['foto']->value;?>
?width=30&amp;image=<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
datas/users/<?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['foto']->value;?>
"  alt="avatar-grande" />
					        						<?php }?>	
					        						</td>
					        						<td>
					        							<span class="azul" style="float:left;font-weight: bold;"><?php echo $_smarty_tpl->tpl_vars['nombre_usuario']->value;?>
</span>
					     				     			<span style="float:left;" class="azul margin-top-5" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
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
								<a class="azul" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
logout"><span class="azul" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></a>
							</li>
						</ul>
					</li>
			</ul>
			<ul class="nav secondary-nav" style="margin-right: 10px;">
           		<li class="menu" data-dropdown="menu">
           			<?php if ($_smarty_tpl->tpl_vars['LOGUEADO']->value){?>
						<form action="" class="pull-left">
			          	  <input type="text" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_search_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
">
			          	</form>
			          	
					<?php }?>
				</li>
			</ul>
			<?php }else{ ?>
			<ul class="nav">
				<li <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='inicio'){?>class="active"<?php }?>>
					<a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_inicio<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
				</li>
				<li <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
personal" <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='pagina_personal'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_personal<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
empresas" <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='pagina_empresa'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_empresa<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='como_funciona'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
como_funciona" <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='como_funciona'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_planes_pago<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='crea_tu_perfil'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
planes_precios" <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='pagina_precios'){?>class="seleccionado"<?php }?>><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_precios<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
				<li <?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='faqs'){?>class="active"<?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
faqs" ><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_faqs<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
			</ul>
			<ul class="nav secondary-nav" style="margin-right: 10px;">
           		<li class="menu" data-dropdown="menu">
           			<button class="btn small primary margin-top-5" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
login'"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_login<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</button>
           			<ul class="dropdown-menu">
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/profile"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_conf_perfil<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
logout"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a></li>
					</ul>
				</li>
			</ul>
			<?php }?>
		</div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['LOGUEADO']->value){?>
	
	<div  class="page-header">
			<div class="wrapper-all">
					<?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value!='myaccount'){?>
		       		<a href="#" id="tree_collapse" onclick="$('#tree').toggle();" style="color:#3376A4;background: none"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_tree.png"/><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_root_tree<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
		       		<div id="sub_root_tree" style="display:none;"></div>
					<div id="tree" style="color:#222; display: none;
									    left: 215px;
									    position: absolute;
									    top: 79px;
									    width: 325px;
									    z-index: 10;"><!-- When using initAjax, it may be nice to put a throbber here, that spins until the initial content is loaded: -->
				  	</div>
				  	
				  	<?php }?>
		          	<table class="page_table">
        					<tr>
        						<td>
        							<h1 id="title_root"><?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }elseif(isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='myaccount'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_myaccount<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?> <small><?php if ($_smarty_tpl->tpl_vars['menu_principal']->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_message<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></small></h1>			
        							  <div id="tabs_menu" style="float:left;margin-bottom:-3px;">
        							    <ul class="tabs">
									    	<li style="background-color:#fff">
									    		<a href="#profile" style="line-height:10px; color:#545454;font-weight: bold;background-color:#fff;background-image: none;"><?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }elseif(isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='myaccount'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_tabs_profile<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></a>
									    	</li>
									    	<?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='myaccount'){?>
									    	<li>
									    		<a href="#general" style="line-height:10px; color:#545454;font-weight: bold;background-image: none;"><?php if (isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='files'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_sub_file<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }elseif(isset($_smarty_tpl->tpl_vars['menu_principal']->value)&&$_smarty_tpl->tpl_vars['menu_principal']->value=='myaccount'){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_tabs_profile_general<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?></a>
									    	</li>
									    	<?php }?>
									    </ul>
									   </div>
        						</td>
        						<td>
        						
        						</td>
        						<td style="width:22%; ">
        							<?php if ($_smarty_tpl->tpl_vars['foto']->value==''){?>
        							<a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/profile">
        								<img style="float:left;border: 1px solid #CCC;padding:4px;" src="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
libs/rescalado_imagen/image.php/<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_avatar_grande.png?width=40&amp;image=<?php echo $_smarty_tpl->tpl_vars['BASE_THEMES_URL']->value;?>
images/icons/icon_avatar_grande.png"  alt="avatar-grande" />
	        						</a>
	        						<?php }else{ ?>
	        						<a href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
user/profile">
	        							<img style="float:left;border: 1px solid #CCC;padding:4px;" src="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
libs/rescalado_imagen/image.php/<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
datas/users/<?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['foto']->value;?>
?width=40&amp;image=<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
datas/users/<?php echo $_smarty_tpl->tpl_vars['id_usuario']->value;?>
/profile/<?php echo $_smarty_tpl->tpl_vars['foto']->value;?>
"  alt="avatar-grande" />
	        						</a>
	        						<?php }?>	
	        						<div style="float:left;margin-top:30px;margin-left:4px;">
     				     				<a class="enlace-color" href="<?php echo $_smarty_tpl->tpl_vars['RUTA_WEB_ABSOLUTA']->value;?>
logout"><span class="azul" style="background-color:#F5F5F5;padding:2px;"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_menu_desconectarse<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></a>
     				     				<span class="label warning">Upgrade</span>
     				     			</div>
        						</td>
        					</tr>
        				</table>
				<div id="file-upload" style="float:left;margin-left:500px;margin-top:-40px">
					<input style="width:100px;padding:6px;cursor:pointer;background-color: #3376A4;
					  background-repeat: repeat-x;
					  background-image: -khtml-gradient(linear, left top, left bottom, from(#3376A4), to(#1169a6));
					  background-image: -moz-linear-gradient(top, #3376A4, #1169a6);
					  background-image: -ms-linear-gradient(top, #3376A4, #1169a6);
					  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3376A4), color-stop(100%, #1169a6));
					  background-image: -webkit-linear-gradient(top, #3376A4, #1169a6);
					  background-image: -o-linear-gradient(top,#3376A4, #1169a6);
					  background-image: linear-gradient(top,#3376A4, #1169a6);
					  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3376A4', endColorstr='#1169a6', GradientType=0);
					  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
					  border-color: #1169a6 #1169a6 #3376A4;
					  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);color:#FFF;" type="button" name="btnFile" id="btnFile" value="Subir fichero" />
					
				</div>        				
		    </div>
	</div>
	<?php }?>
</div>

<?php }} ?>