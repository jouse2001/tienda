<?php /* Smarty version Smarty-3.1.19, created on 2014-12-15 21:08:59
         compiled from "/var/www/tienda/admin/themes/default/template/helpers/tree/tree_node_item.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1945638958548f4deb525186-47591267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c57c0c6033617a83782fce0b305565d79124e801' => 
    array (
      0 => '/var/www/tienda/admin/themes/default/template/helpers/tree/tree_node_item.tpl',
      1 => 1406810456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1945638958548f4deb525186-47591267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'node' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_548f4deb52bbc6_85324810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548f4deb52bbc6_85324810')) {function content_548f4deb52bbc6_85324810($_smarty_tpl) {?>

<li class="tree-item">
	<label class="tree-item-name">
		<i class="tree-dot"></i>
		<?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>

	</label>
</li><?php }} ?>
