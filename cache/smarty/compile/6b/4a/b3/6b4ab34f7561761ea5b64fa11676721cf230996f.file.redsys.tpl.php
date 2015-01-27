<?php /* Smarty version Smarty-3.1.19, created on 2015-01-23 22:48:37
         compiled from "/var/www/tienda/modules/redsys//views/templates/redsys.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66517163554c2c1b5884300-52885792%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b4ab34f7561761ea5b64fa11676721cf230996f' => 
    array (
      0 => '/var/www/tienda/modules/redsys//views/templates/redsys.tpl',
      1 => 1417781186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66517163554c2c1b5884300-52885792',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
    'fee' => 0,
    'urltpv' => 0,
    'cantidad' => 0,
    'moneda' => 0,
    'pedido' => 0,
    'codigo' => 0,
    'terminal' => 0,
    'trans' => 0,
    'titular' => 0,
    'merchantdata' => 0,
    'nombre' => 0,
    'urltienda' => 0,
    'productos' => 0,
    'UrlOk' => 0,
    'UrlKO' => 0,
    'firma' => 0,
    'idioma_tpv' => 0,
    'tipopago' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54c2c1b591e764_07421936',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54c2c1b591e764_07421936')) {function content_54c2c1b591e764_07421936($_smarty_tpl) {?>﻿

<p class="payment_module">
	<a class="bankwire" href="javascript:$('#redsys_form').submit();" title="<?php echo smartyTranslate(array('s'=>'Conectar con el TPV','mod'=>'redsys'),$_smarty_tpl);?>
" style="float:left;width:100%">
		
		<img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
img/tarjetas_redsys.png" alt="<?php echo smartyTranslate(array('s'=>'Conectar con el TPV','mod'=>'redsys'),$_smarty_tpl);?>
" style="float:left; margin: 0px 10px 5px 0px;"/>
		
		<?php echo smartyTranslate(array('s'=>'Pagar con tarjeta  - Pasarela de pago Redsys','mod'=>'redsys'),$_smarty_tpl);?>

	<?php if ($_smarty_tpl->tpl_vars['fee']->value>0) {?>
		<br /><br />
		<?php echo smartyTranslate(array('s'=>'Esta forma de pago lleva asociada un recargo de ','mod'=>'redsys'),$_smarty_tpl);?>
 <font color="red"><b><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['fee']->value),$_smarty_tpl);?>
.</b></font> <?php echo smartyTranslate(array('s'=>'El recargo se suma a los gastos de env.','mod'=>'redsys'),$_smarty_tpl);?>

	<?php }?>
	</a><br /><br /><br /><br /><br /><br /><br />
</p>

<form action="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['urltpv']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post" id="redsys_form" class="hidden">	
	<input type="hidden" name="Ds_Merchant_Amount" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['cantidad']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
    <input type="hidden" name="Ds_Merchant_Currency" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['moneda']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_Order" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pedido']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_MerchantCode" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['codigo']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_Terminal" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['terminal']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_TransactionType" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['trans']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_Titular" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['titular']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_MerchantData" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['merchantdata']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_MerchantName" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['nombre']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_MerchantURL" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['urltienda']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_ProductDescription" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['productos']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_UrlOK" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['UrlOk']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_UrlKO" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['UrlKO']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_MerchantSignature" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['firma']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
	<input type="hidden" name="Ds_Merchant_ConsumerLanguage" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['idioma_tpv']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
    <input type="hidden" name="Ds_Merchant_PayMethods" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['tipopago']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
</form><?php }} ?>
