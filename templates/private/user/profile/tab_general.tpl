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
											<input class="xlarge" type="text" name="time_zone" >
										</td>
									</tr>
									<tr>
										<td  width="30%">	
											<span class="marron" style="font-weight: bold">{translate}tx_form_name_language{/translate}:</span>
										</td>
										<td align="left">
											<input class="xlarge required" type="text" name="language" id="language" value=""/>
										</td>
									</tr>
								</table>
							</form>	
					</div>
			</div>	
		</div>	