<?php /* Smarty version Smarty-3.1.19, created on 2014-12-17 00:23:29
         compiled from "/var/www/tienda/admin5284/themes/default/template/controllers/modules/warning_module.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20308678595490bef18b39a3-79482450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd40dc9e4e1bf1ec3acc403271089cbcea634e9b' => 
    array (
      0 => '/var/www/tienda/admin5284/themes/default/template/controllers/modules/warning_module.tpl',
      1 => 1406810456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20308678595490bef18b39a3-79482450',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_link' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5490bef18c1db5_68940167',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5490bef18c1db5_68940167')) {function content_5490bef18c1db5_68940167($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_link']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
</a><?php }} ?>
