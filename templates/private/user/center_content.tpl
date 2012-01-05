<div class="main-content col eight equal-height">
	{if $contenido_central == 'inicio'}
		{include file="init/init.tpl"}
	{elseif $contenido_central == 'profile'}
		{include file="profile/tabs.tpl"}
	{/if}
</div>
