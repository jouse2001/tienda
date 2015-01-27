<?php /* Smarty version Smarty-3.1.19, created on 2014-12-15 22:16:50
         compiled from "/var/www/tienda/admin5284/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:566324255548f4fc2b56595-47720620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e81bcf5e01b3f0650d2cfacd9f5af7d17889f3c8' => 
    array (
      0 => '/var/www/tienda/admin5284/themes/default/template/content.tpl',
      1 => 1406810456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '566324255548f4fc2b56595-47720620',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_548f4fc2b5e142_83442722',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f4fc2b5e142_83442722')) {function content_548f4fc2b5e142_83442722($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
