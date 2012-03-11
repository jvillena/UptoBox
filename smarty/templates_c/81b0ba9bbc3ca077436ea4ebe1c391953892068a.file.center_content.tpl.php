<?php /* Smarty version Smarty-3.1.5, created on 2012-03-11 22:47:13
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/public/login/center_content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4636978894f5d2b7111f921-81370103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81b0ba9bbc3ca077436ea4ebe1c391953892068a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/uptosave/www/templates/public/login/center_content.tpl',
      1 => 1329960375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4636978894f5d2b7111f921-81370103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LOGIN_MODULE' => 0,
    'IMAGES_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.5',
  'unifunc' => 'content_4f5d2b711cf70',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f5d2b711cf70')) {function content_4f5d2b711cf70($_smarty_tpl) {?> <div class="container" style="margin-top:-100px;">
    	   <div class="content">
				  
			   <div style="margin-top:50px;
			    border-bottom-left-radius: 3px;
			    border-bottom-right-radius: 3px;
			    color: #FFF;
			    padding: 20px 15px;margin-left:40px;">
					<h1><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_login<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h1>
					<p>Join today and start to upload and share your online file storage.<strong>UptoBox</strong> is the best open sources online file storage
					</p>
					<div id="mensaje" style="display:none">
										<div id="error" class="alert-message">
										    <p id="retorno_usuario" style="display:none"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_welcome<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</p>
										    <p id="retorno_usuario_error" style="display:none"><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_welcome_error<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</p>
									    </div>
					</div>	
				</div>
				
		        <!-- Main hero unit for a primary marketing message or call to action -->
		 
						<div class="row" style="margin-top:50px;;margin-left:20px;">
								
				      			<div class="span12" style="width:800px;border: none; padding: 0px;opacity:1" >
				      				
				      				<?php echo $_smarty_tpl->tpl_vars['LOGIN_MODULE']->value;?>

				      			 <!-- Modal -->
				      			 	
								       <!-- <form name="form_login" id="form_login" method="post">
								        
								        	<div style="width:90%;position: relative; top: auto; left: auto; margin:0 auto;margin-top:-41px;margin-left:100px; z-index: 1" class="modal">
								        	  <div class="modal-header">
								        	    <h3><?php $_smarty_tpl->smarty->_tag_stack[] = array('translate', array()); $_block_repeat=true; echo Localizer::translate(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
tx_login<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Localizer::translate(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h3>
								        	  </div>
								        	  <div class="modal-body">
											   	  		<h4>Username</h4>
											   	  		<input type="text" class="xlarge required" id="username" name="username" placeholder="Username">
											   	  		<br/><br/>
											   	  		<h4>Password</h4>
												  		<input type="password" class="xlarge required" id="password" name="password" placeholder="Password">
														<input type="hidden" value="1" name="action"/>	
											 			<br/><br/>
											 </div>
								        	  <div class="modal-footer">
								        	  	<img id="id_cargando" style="display:none" src="<?php echo $_smarty_tpl->tpl_vars['IMAGES_URL']->value;?>
/resources/loading.gif" />
								        	    <input type="submit" class="btn primary" style="float: right;" value="Login" name="logueo" id="blogin"/>	
								        	  </div>
								        	</div>
								        </form>
								       -->
							      </div>
							    
						        
						  </div>
		</div>
</div><?php }} ?>