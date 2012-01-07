		<div class="alert-message block-message info" style="margin-top:120px;margin-left:5px;margin-right:5px;">
		        <p><strong>{translate}tx_general_tittle{/translate}</strong> {translate}tx_general_sub_tittle{/translate}</p>
		</div>
		<div id="mensaje" style="display:none">
			<div id="error" class="alert-message">
			    <p id="retorno_usuario"></p>
		    </div>
		</div>	
		
		<div class="row" style="margin-top:30px;margin-bottom:30px">
			 <div class="span3" style="margin-top:-15px;">
					
					<div class="span8 offset2">
								<form id="form_general" name="form_general" method="post">
										<table id="datos_general" cellspacing="10px;" width="100%" style="padding:20px;">
											<tr>
												<td style="border:0" colspan="3" id="retorno_perfil">
													
												</td>
											</tr>
											<tr>
												<td width="30%">	
													<span class="marron" style="font-weight: bold">{translate}tx_form_name_time_zone{/translate}:</span>
												</td>
												<td>
													<select id="timezone" name="timezone" class="xlarge">
													{foreach name="timezone" from=$aTimeZone item=item key=key}
														<option value="{$item.zone_id}">{$item.zone_name}</option>
													{/foreach}
													</select>
												</td>
											</tr>
											<tr>
												<td  width="30%">	
													<span class="marron" style="font-weight: bold">{translate}tx_form_name_language{/translate}:</span>
												</td>
												<td align="left">
													<select id="language" name="language" class="xlarge">
													{foreach name="Language" from=$aLanguages item=item key=key}
														<option value="{$item.id}">{$item.idioma}</option>
													{/foreach}
													</select>
												</td>
											</tr>
											<tr>
												<td style="border:0;" colspan="2">
													<img id="id_cargando" style="display:none;float:left" src="{$IMAGES_URL}resources/loading.gif" />
													<input type="submit" value="{translate}tx_button_edit{/translate}" id="boton_modificar_perfil_general" class="btn info right" style="margin-right: 45px;margin-top:4px">
												</td>
											</tr>

										</table>
							</form>	
					</div>
			</div>	
		</div>	