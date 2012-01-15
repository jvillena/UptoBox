<div class="left-nav col two" style="margin-top:110px">
	<div class="equal-height">
		<ul class="lat_menu_navigation">
			<li class="perfil" style="border-top:0px;">
				<div class="header image-block">
				
      			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;">{translate}tx_options_title{/translate}</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul> 
        				 <li>
        					 <img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_folder.png"/>
        					 <a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" onclick="createFolder('{translate}tx_options_create_new_folder{/translate}');" href="#">{translate}tx_options_new_folder{/translate}</a>
        				 </li>
        				 <li>
        				     <img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_upload_file.png"/>
        					 <a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="{$RUTA_WEB_ABSOLUTA}upload">{translate}tx_options_upload_file{/translate}</a>
       				     </li>
       				    </ul> 
        			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;">{translate}tx_menu_mi_cuenta{/translate}</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul> 
        				 	<li>
        				 	 	<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_perfil.png"/>
        				 		<a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="{$RUTA_WEB_ABSOLUTA}user/profile">{translate}tx_options_personal_account{/translate}</a>
        				 	</li>
        				 	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_almacenamiento.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="{$RUTA_WEB_ABSOLUTA}almacenamiento">{translate}tx_options_storages{/translate}: {$actual_size} {translate}tx_from{/translate} {$max_size}</a>
       				     	</li>
       				     </ul>
       				     
        			</div>
			</li>
			<li class="sistema expanded" style="text-align:left;margin-bottom:20px;">
					<div class="image-block" style="margin-bottom:10px;margin-left:15px;">
						<div style="padding:8px;"></div>
						<span style="color:#525252; font-size:14px;font-weight: bold;">{translate}tx_menu_activity{/translate}</span>
        				<div class="linea_horizontal" style="margin-top:5px;"></div>
        			</div>
        			<div class="bd" style="line-height: 12px;margin-left:10px;">
        				<ul> 
        					{foreach name="recent_files" from=$aRecentFile item=item_recent key=key}
								{include file='files/recent_file.tpl'}
							{/foreach}
        				 	<!-- <li>
        				 	 	<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_folder.png"/>
        				 		<a class="azul" style=" margin-bottom:10px;width:140px;clear:right;" href="{$RUTA_WEB_ABSOLUTA}perfil">Proyecto Uptobox</a>
        				 	</li>
        				 	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_folder.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="{$RUTA_WEB_ABSOLUTA}almacenamiento">Documentos de RRHH</a>
       				     	</li>
       				     	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_word.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="{$RUTA_WEB_ABSOLUTA}almacenamiento">Manual PHP</a>
       				     	</li>
       				     	<li>
        				 		<img style="width:20px;vertical-align:bottom" src="{$RUTA_WEB_ABSOLUTA}images/icons/icon_pdf.png"/>
        				 		<a class="azul" style="margin-bottom:10px;width:140px;clear:right;" href="{$RUTA_WEB_ABSOLUTA}almacenamiento">Tutorial Cocoa</a>
       				     	</li>
       				     -->
       				     </ul>
       				     
        			</div>
			</li>
		</ul>
	</div>
</div>
