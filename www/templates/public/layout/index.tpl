<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="{$metadescription}"/>
        <meta name="description" content="UptoSave is new Box bussines cloud for sharing files">
    	<meta name="author" content="José E. Villena">
		<link rel="icon" href="favicon.png" type="image/png" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    	<!--[if lt IE 9]>
    	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    	<![endif]-->

		{foreach from=$aStyles item=item}
			{$item}
		{/foreach}

		{foreach from=$aScripts item=item}
			<script language="JavaScript" src='{$item}'></script>
		{/foreach}
		         
		<title>{$metatitle}</title>

		

		
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