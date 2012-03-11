{literal}
	
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
			      url: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/tabs/'+ruta,
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
      title: "{/literal}{$tx_titulo_treeview}{literal}",
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
        url: "{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/files/treeview/0"
        },
	  
      onActivate: function(node) {
       				 cambiarUrl('/'+node.data.key+'/'+node.data.title);
					 $.ajax({
				            type: 'POST',
				            url: '{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/path/'+node.data.key+'/'+node.data.title,
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
          url: "{/literal}{$RUTA_WEB_ABSOLUTA}{literal}user/files/treeview/"+node.data.key,
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





{/literal}
<div class="topbar" data-dropdown="dropdown">
	<div class="topbar-inner">
		<span id="loading" class="label important right" style="display:none;margin-top: 7px;margin-right: 5px;">Loading...</span>
  		<div class="container" style="width:980px">
			<a id="brand" class="brand margin-top-1" href="{if $LOGUEADO}{$RUTA_WEB_ABSOLUTA}user/files{else}{$RUTA_WEB_ABSOLUTA}{/if}"><img src="{$IMAGES_URL}/logos/logo.png" /></a>
			{if $LOGUEADO}
			<ul class="nav">
				<li {if isset($menu_principal) && $menu_principal=='files'}class="active"{/if}>
					<a href="{$RUTA_WEB_ABSOLUTA}user/files" >{translate}tx_menu_fichero{/translate}</a>
				</li>
				<li {if isset($menu_principal) && $menu_principal=='contact'}class="active"{/if}>
						<a href="{$RUTA_WEB_ABSOLUTA}personal" {if isset($menu_principal) && $menu_principal=='contact'}class="seleccionado"{/if}>{translate}tx_menu_colaboradores{/translate}</a>
				</li>
			
				<li class="dropdown {if isset($menu_principal) && $menu_principal=='myaccount'} active {/if}">
						<a href="#" class="dropdown-toggle">{translate}tx_menu_mi_cuenta{/translate}</a>
						<ul class="dropdown-menu">
							<li>
								<a class="azul" href="{$RUTA_WEB_ABSOLUTA}user/profile">
									<div class="bd">
					        				<table>
					        					<tr>
					        						<td>
					        						{if $foto==""}
					        							<img style="border: 1px solid #CCC" src="{$RUTA_WEB_ABSOLUTA}libs/rescalado_imagen/image.php/{$BASE_THEMES_URL}images/icons/icon_avatar_grande.png?width=30&amp;image={$BASE_THEMES_URL}images/icons/icon_avatar_grande.png"  alt="avatar-grande" />
					        						{else}
					        							<img style="border: 1px solid #CCC" src="{$RUTA_WEB_ABSOLUTA}libs/rescalado_imagen/image.php/{$RUTA_WEB_ABSOLUTA}datas/users/{$id_usuario}/profile/{$foto}?width=30&amp;image={$RUTA_WEB_ABSOLUTA}datas/users/{$id_usuario}/profile/{$foto}"  alt="avatar-grande" />
					        						{/if}	
					        						</td>
					        						<td>
					        							<span class="azul" style="float:left;font-weight: bold;">{$nombre_usuario}</span>
					     				     			<span style="float:left;" class="azul margin-top-5" >{translate}tx_lat_izq_acceder_perfil{/translate}</span>
					        						</td>
				        					</tr>
				        				</table>
				        			</div>
								
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a class="azul" href="{$RUTA_WEB_ABSOLUTA}logout"><span class="azul" >{translate}tx_menu_desconectarse{/translate}</span></a>
							</li>
						</ul>
					</li>
			</ul>
			<ul class="nav secondary-nav" style="margin-right: 10px;">
           		<li class="menu" data-dropdown="menu">
           			{if $LOGUEADO}
						<form action="" class="pull-left">
			          	  <input type="text" placeholder="{translate}tx_search_file{/translate}">
			          	</form>
			          	
					{/if}
				</li>
			</ul>
			
			{/if}
		</div>
	</div>
	{if $LOGUEADO}
	
	<div  class="page-header">
			<div class="wrapper-all">
					{if isset($menu_principal) && $menu_principal!='myaccount'}
		       		<a href="#" id="tree_collapse" onclick="$('#tree').toggle();" style="color:#3376A4;background: none"><img src="{$BASE_THEMES_URL}images/icons/icon_tree.png"/>{translate}tx_root_tree{/translate}</a>
		       		<div id="sub_root_tree" style="display:none;"></div>
					<div id="tree" style="color:#222; display: none;
									    left: 215px;
									    position: absolute;
									    top: 79px;
									    width: 325px;
									    z-index: 10;"><!-- When using initAjax, it may be nice to put a throbber here, that spins until the initial content is loaded: -->
				  	</div>
				  	
				  	{/if}
		          	<table class="page_table">
        					<tr>
        						<td>
        							<h1 id="title_root">{if isset($menu_principal) && $menu_principal=='files'}{translate}tx_sub_file{/translate}{elseif isset($menu_principal) && $menu_principal=='myaccount'}{translate}tx_sub_myaccount{/translate}{elseif isset($menu_principal) && $menu_principal=='viewer'}{$name_file}{/if} <small>{if $menu_principal == 'files'}{translate}tx_sub_message{/translate}{/if}</small></h1>			
        							  <div id="tabs_menu" style="float:left;margin-bottom:-3px;">
        							  	{if isset($menu_principal) && $menu_principal!='viewer'}
        							    <ul class="tabs">
        							    	
									    	<li style="background-color:#fff">
									    		<a href="#profile" style="line-height:10px; color:#545454;font-weight: bold;background-color:#fff;background-image: none;">{if isset($menu_principal) && $menu_principal=='files'}{translate}tx_sub_file{/translate}{elseif isset($menu_principal) && $menu_principal=='myaccount'}{translate}tx_tabs_profile{/translate}{/if}</a>
									    	</li>
									    	{if isset($menu_principal) && $menu_principal=='myaccount'}
									    	<li>
									    		<a href="#general" style="line-height:10px; color:#545454;font-weight: bold;background-image: none;">{if isset($menu_principal) && $menu_principal=='files'}{translate}tx_sub_file{/translate}{elseif isset($menu_principal) && $menu_principal=='myaccount'}{translate}tx_tabs_profile_general{/translate}{/if}</a>
									    	</li>
									    	{/if}
									    </ul>
									    {/if}
									   </div>
        						</td>
        						<td>
        						
        						</td>
        						<td style="width:22%; ">
        							{if $foto==""}
        							<a href="{$RUTA_WEB_ABSOLUTA}user/profile">
        								<img style="float:left;border: 1px solid #CCC;padding:4px;" src="{$RUTA_WEB_ABSOLUTA}libs/rescalado_imagen/image.php/{$BASE_THEMES_URL}images/icons/icon_avatar_grande.png?width=40&amp;image={$BASE_THEMES_URL}images/icons/icon_avatar_grande.png"  alt="avatar-grande" />
	        						</a>
	        						{else}
	        						<a href="{$RUTA_WEB_ABSOLUTA}user/profile">
	        							<img style="float:left;border: 1px solid #CCC;padding:4px;" src="{$RUTA_WEB_ABSOLUTA}libs/rescalado_imagen/image.php/{$RUTA_WEB_ABSOLUTA}datas/users/{$id_usuario}/profile/{$foto}?width=40&amp;image={$RUTA_WEB_ABSOLUTA}datas/users/{$id_usuario}/profile/{$foto}"  alt="avatar-grande" />
	        						</a>
	        						{/if}	
	        						<div style="float:left;margin-top:30px;margin-left:4px;">
     				     				<a class="enlace-color" href="{$RUTA_WEB_ABSOLUTA}logout"><span class="azul" style="background-color:#F5F5F5;padding:2px;">{translate}tx_menu_desconectarse{/translate}</span></a>
     				     				<span class="label warning">Upgrade</span>
     				     			</div>
        						</td>
        					</tr>
        				</table>
				<div id="file-upload" style="float:left;margin-left:500px;margin-top:-40px">
					<input style="width:100px;padding:6px;cursor:pointer;  background: -moz-linear-gradient(center top , #5989AC, #004A80) repeat scroll 0 0 transparent;
    border: 1px solid #004373;
    color: #FFFFFF;  margin-bottom: 9px;  border-radius: 5px 5px 5px 5px;
    box-shadow: 0 1px 2px #000000;  display: inline-block;  outline: medium none;
    padding: 0.55em 2em;
    text-align: center;
    text-decoration: none;" type="button" name="btnFile" id="btnFile" value="Subir fichero" />
					
				</div>        				
		    </div>
	</div>
	{/if}
</div>

