<?php /* Smarty version Smarty-3.1.19, created on 2015-01-24 14:58:16
         compiled from "/var/www/tienda/modules/blockcategories/views/blockcategories_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185871758554c3a4f86a3806-75280603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1b76d304c8466079097124d27af52bb64588510' => 
    array (
      0 => '/var/www/tienda/modules/blockcategories/views/blockcategories_admin.tpl',
      1 => 1418772463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185871758554c3a4f86a3806-75280603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'helper' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54c3a4f86e4a93_11289634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c3a4f86e4a93_11289634')) {function content_54c3a4f86e4a93_11289634($_smarty_tpl) {?>
<div class="form-group">
	<label class="control-label col-lg-3">
		<span class="label-tooltip" data-toggle="tooltip" data-html="true" title="" data-original-title="<?php echo smartyTranslate(array('s'=>'You can upload a maximum of 3 images.','mod'=>'blockcategories'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Thumbnails','mod'=>'blockcategories'),$_smarty_tpl);?>

		</span>
	</label>
	<div class="col-lg-4">
		<?php echo $_smarty_tpl->tpl_vars['helper']->value;?>

	</div>
</div>
<?php }} ?>
