<?php /* Smarty version Smarty-3.1.19, created on 2015-01-24 23:52:10
         compiled from "/var/www/tienda/modules/paypal/views/templates/hook/column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:174600096454c4221a10e7a6-19263325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b7ca4b8e43939ae8906cd888ea27762104aedf1' => 
    array (
      0 => '/var/www/tienda/modules/paypal/views/templates/hook/column.tpl',
      1 => 1418773206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174600096454c4221a10e7a6-19263325',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir_ssl' => 0,
    'logo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54c4221a151cf7_83001634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c4221a151cf7_83001634')) {function content_54c4221a151cf7_83001634($_smarty_tpl) {?>

<div id="paypal-column-block">
	<p><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
modules/paypal/about.php" rel="nofollow"><img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="PayPal" title="<?php echo smartyTranslate(array('s'=>'Pay with PayPal','mod'=>'paypal'),$_smarty_tpl);?>
" style="max-width: 100%" /></a></p>
</div>
<?php }} ?>
