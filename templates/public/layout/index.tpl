<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="{$metadescription}"/>
		<link rel="icon" href="favicon.png" type="image/png" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />         
		<link rel='stylesheet' type='text/css' href='{$RUTA_WEB_ABSOLUTA}css/login.css' />
		<link rel='stylesheet' type='text/css' href='{$RUTA_WEB_ABSOLUTA}css/bootstrap.css' />
		<link rel='stylesheet' type='text/css' href='{$RUTA_WEB_ABSOLUTA}css/public.css' />
		<link rel='stylesheet' type='text/css' href='{$RUTA_WEB_ABSOLUTA}libs/javascript/jquery/jquery_ui/css/ui-lightness/jquery-ui-1.8.12.custom.css' />
		<link rel='stylesheet' type='text/css' href='{$RUTA_WEB_ABSOLUTA}libs/javascript/jquery/contextmenu/jquery.contextMenu.css' />
		<title>{$metatitle}</title>

        <!-- Javascripts necesarios para la validación de formularios. -->
        <script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/jquery/jquery.js" type="text/javascript"></script>
        <script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/jquery/validate/validate.js" type="text/javascript"></script>
        <script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/jquery/jquery-ui.min.js" type="text/javascript"></script>
        <script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/jquery/jquery-ui/jquery-ui.custom.js" type="text/javascript"></script>
		<script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/jquery/jquery.cookie.js" type="text/javascript"></script>
		
	

		<!-- Javascripts necesarios para estilos en radio y checkbox. -->
		<script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/jquery/checkbox/customInput.jquery.js" type="text/javascript"></script>
		<script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/comunes.js" type="text/javascript"></script>

		<!-- Javascripts necesarios para usar efectos de bootstrap en css. -->
		<script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/bootstrap/bootstrap-dropdown.js" type="text/javascript"></script>
		<script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/bootstrap/bootstrap-tabs.js" type="text/javascript"></script>
		<script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/bootstrap/bootstrap-modal.js" type="text/javascript"></script>
		<script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/bootstrap/bootstrap-twipsy.js" type="text/javascript"></script>
		<script src="{$RUTA_WEB_ABSOLUTA}libs/javascript/bootstrap/bootstrap-tabs.js" type="text/javascript"></script>
		
		<!-- Añade esta etiqueta en la cabecera o delante de la etiqueta body. -->
		<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
		  {literal}{lang: 'es'}{/literal}
		</script>		

    </head>
    <body>
    	<div id="header">
			{$HEADER}
		</div>
		<div id="wrapper">
			<div  class="wrapper-all">
				{$CONTENIDO_CENTRAL}
				{$LATERAL_DERECHO}
			</div>
			
		</div>
		<div id="footer">
			{$FOOTER}
		</div>
    </body>
</html>