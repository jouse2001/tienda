<?php
/**
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit || add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2014 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_CAN_LOAD_FILES_'))
	exit;

class Redsys extends PaymentModule
{
	private	$html = '';
	private $post_errors = array();

	public function __construct()
	{
		$this->name = 'redsys';
		$this->tab = 'payments_gateways';
		$this->version = '2.4.2';
		$this->author = 'REDSYS';
		// Array config con los datos de config.
		$config = Configuration::getMultiple(array('REDSYS_URLTPV', 'REDSYS_CLAVE', 'REDSYS_NOMBRE',
		'REDSYS_CODIGO','REDSYS_TIPOPAGO', 'REDSYS_TERMINAL', 'REDSYS_TIPOFIRMA', 'REDSYS_RECARGO',
		'REDSYS_MONEDA', 'REDSYS_TRANS', 'REDSYS_SSL','REDSYS_IDIOMAS_ESTADO'));
		// Establecer propiedades nediante los datos de config.
		$this->env = $config['REDSYS_URLTPV'];
		switch ($this->env)
		{
			case 1: //Real
				$this->urltpv = 'https://sis.redsys.es/sis/realizarPago/utf-8';
				break;
			case 2: //Pruebas t
				$this->urltpv = 'https://sis-t.redsys.es:25443/sis/realizarPago/utf-8';
				break;
			case 3: // Pruebas i
				$this->urltpv = 'https://sis-i.redsys.es:25443/sis/realizarPago/utf-8';
				break;
			case 4: //Pruebas d
				$this->urltpv = 'http://sis-d.redsys.es/sis/realizarPago/utf-8';
				break;
		}
		$this->clave = $config['REDSYS_CLAVE'];
		if (isset($config['REDSYS_NOMBRE']))
			$this->nombre = $config['REDSYS_NOMBRE'];
		if (isset($config['REDSYS_CODIGO']))
			$this->codigo = $config['REDSYS_CODIGO'];
		if (isset($config['REDSYS_TIPOPAGO']))
			$this->tipopago = $config['REDSYS_TIPOPAGO'];
		if (isset($config['REDSYS_TERMINAL']))
			$this->terminal = $config['REDSYS_TERMINAL'];
		if (isset($config['REDSYS_TIPOFIRMA']))
			$this->tipofirma = $config['REDSYS_TIPOFIRMA'];
		if (isset($config['REDSYS_RECARGO']))
			$this->recargo = $config['REDSYS_RECARGO'];
		if (isset($config['REDSYS_MONEDA']))
			$this->moneda = $config['REDSYS_MONEDA'];
		if (isset($config['REDSYS_TRANS']))
			$this->trans = $config['REDSYS_TRANS'];
		if (isset($config['REDSYS_SSL']))
			$this->ssl = $config['REDSYS_SSL'];
		if (isset($config['REDSYS_IDIOMAS_ESTADO']))
			$this->idiomas_estado = $config['REDSYS_IDIOMAS_ESTADO'];

		parent::__construct();

		$this->page = basename(__FILE__, '.php');
		$this->displayName = $this->l('Redsys');
		$this->description = $this->l('Aceptar pagos con tarjeta mediante Redsys');

		// Mostrar aviso si faltan datos de config.
		if (!isset($this->urltpv)
		|| !isset($this->clave)
		|| !isset($this->nombre)
		|| !isset($this->codigo)
		|| !isset($this->tipopago)
		|| !isset($this->terminal)
		|| !isset($this->tipofirma)
		|| !isset($this->recargo)
		|| !isset($this->moneda)
		|| !isset($this->trans)
		|| !isset($this->ssl)
		|| !isset($this->idiomas_estado))

		$this->warning = $this->l('Faltan datos por configurar del mod. Redsys.');
	}

	public function install()
	{
		// Valores por defecto al instalar
		if (!parent::install()
			|| !Configuration::updateValue('REDSYS_URLTPV', '0')
			|| !Configuration::updateValue('REDSYS_NOMBRE', $this->l('Escriba el nombre de su tienda'))
			|| !Configuration::updateValue('REDSYS_TIPOPAGO', 'T')
			|| !Configuration::updateValue('REDSYS_TERMINAL', 1)
			|| !Configuration::updateValue('REDSYS_TIPOFIRMA', 0)
			|| !Configuration::updateValue('REDSYS_RECARGO', '00')
			|| !Configuration::updateValue('REDSYS_MONEDA', '978')
			|| !Configuration::updateValue('REDSYS_TRANS', 0)
			|| !Configuration::updateValue('REDSYS_SSL', 'no')
			|| !Configuration::updateValue('REDSYS_IDIOMAS_ESTADO', 'no')
			|| !$this->registerHook('payment')
			|| !$this->registerHook('paymentReturn'))
			return false;
		return true;
	}

	public function uninstall()
	{
		// Valores a quitar si desinstalamos
		if (!Configuration::deleteByName('REDSYS_URLTPV')
			|| !Configuration::deleteByName('REDSYS_CLAVE')
			|| !Configuration::deleteByName('REDSYS_NOMBRE')
			|| !Configuration::deleteByName('REDSYS_CODIGO')
			|| !Configuration::deleteByName('REDSYS_TIPOPAGO')
			|| !Configuration::deleteByName('REDSYS_TERMINAL')
			|| !Configuration::deleteByName('REDSYS_TIPOFIRMA')
			|| !Configuration::deleteByName('REDSYS_RECARGO')
			|| !Configuration::deleteByName('REDSYS_MONEDA')
			|| !Configuration::deleteByName('REDSYS_TRANS')
			|| !Configuration::deleteByName('REDSYS_SSL')
			|| !Configuration::deleteByName('REDSYS_IDIOMAS_ESTADO')
			|| !parent::uninstall())
			return false;
		return true;
	}

	private function _postValidation()
	{
		// Si al enviar los datos del formulario de config. hay campos vacios, mostrar errores.
		if (Tools::isSubmit('btnSubmit'))
		{
			if (!Tools::getValue('clave'))
				$this->post_errors[] = $this->l('Se requiere la Clave secreta de encript.');
			if (!Tools::getValue('nombre'))
				$this->post_errors[] = $this->l('Se requiere el Nombre del comercio.');
			if (!Tools::getValue('tipopago'))
				$this->post_errors[] = $this->l('Se requiere el tipo de pago del comercio.');
			if (!Tools::getValue('codigo'))
				$this->post_errors[] = $this->l('Se requiere el Num. de comercio (FUC).');
			if (!Tools::getValue('terminal'))
				$this->post_errors[] = $this->l('Se requiere el Terminal del comercio (FUC).');
			if (!Tools::getValue('recargo'))
				$this->post_errors[] = $this->l('Si no desea aplicar recargo, ponga 00.');
			if (!Tools::getValue('moneda'))
				$this->post_errors[] = $this->l('Se requiere el Tipo de moneda.');

		}
	}

	private function _postProcess()
	{
		// Actualizar la config. en la BBDD
		if (Tools::isSubmit('btnSubmit'))
		{
			Configuration::updateValue('REDSYS_URLTPV', Tools::getValue('urltpv'));
			Configuration::updateValue('REDSYS_CLAVE', Tools::getValue('clave'));
			Configuration::updateValue('REDSYS_NOMBRE', Tools::getValue('nombre'));
			Configuration::updateValue('REDSYS_CODIGO', Tools::getValue('codigo'));
			Configuration::updateValue('REDSYS_TIPOPAGO', Tools::getValue('tipopago'));
			Configuration::updateValue('REDSYS_TERMINAL', Tools::getValue('terminal'));
			Configuration::updateValue('REDSYS_TIPOFIRMA', Tools::getValue('tipofirma'));
			Configuration::updateValue('REDSYS_RECARGO', Tools::getValue('recargo'));
			Configuration::updateValue('REDSYS_MONEDA', Tools::getValue('moneda'));
			Configuration::updateValue('REDSYS_TRANS', Tools::getValue('trans'));
			Configuration::updateValue('REDSYS_SSL', Tools::getValue('ssl'));
			Configuration::updateValue('REDSYS_IDIOMAS_ESTADO', Tools::getValue('idiomas_estado'));
		}

		$this->html .= '<div class="conf confirm"><img src="../img/admin/ok.gif" alt="'.$this->l('ok').'" /> '.$this->l('Configuración actualizada').'</div>';
	}

	private function _displayredsys()
	{
		// lista de payments
		$this->html .= '<img src="../modules/redsys/img/redsys.png" style="float:left; margin-right:15px;"><b>'.$this->l('Este mod. te permite aceptar pagos con tarjeta.').'</b><br /><br />
		'.$this->l('Si el cliente elije este modo de pago, podrá pagar de forma automática.').'<br /><br /><br />';
	}

	private function _displayForm()
	{
		$tipopago = Tools::getValue('tipopago', $this->tipopago);
		$tipopago_a = ($tipopago == ' ') ? ' selected="selected" ' : '';
		$tipopago_b = ($tipopago == 'C') ? ' selected="selected" ' : '';
		$tipopago_c = ($tipopago == 'T') ? ' selected="selected" ' : '';

		// Opciones para el select de monedas.
		$moneda = Tools::getValue('moneda', $this->moneda);
		$iseuro = ($moneda == '978') ? ' selected="selected" ' : '';
		$isdollar = ($moneda == '840') ? ' selected="selected" ' : '';

		// Opciones para activar/desactivar SSL
		$ssl = Tools::getValue('ssl', $this->ssl);
		$ssl_si = ($ssl == 'si') ? ' checked="checked" ' : '';
		$ssl_no = ($ssl == 'no') ? ' checked="checked" ' : '';

		// Opciones para activar los idiomas
		$idiomas_estado = Tools::getValue('idiomas_estado', $this->idiomas_estado);
		$idiomas_estado_si = ($idiomas_estado == 'si') ? ' checked="checked" ' : '';
		$idiomas_estado_no = ($idiomas_estado == 'no') ? ' checked="checked" ' : '';

		// Opciones entorno
		if (!Tools::getValue('urltpv'))
			$entorno = Tools::getValue('env', $this->env);
				else
					$entorno = Tools::getValue('urltpv');
		$entorno_real = ($entorno == 1) ? ' selected="selected" ' : '';
		$entorno_t = ($entorno == 2) ? ' selected="selected" ' : '';
		$entorno_i = ($entorno == 3) ? ' selected="selected" ' : '';
		$entorno_d = ($entorno == 4) ? ' selected="selected" ' : '';

		// Opciones tipofirma
		$tipofirma = Tools::getValue('tipofirma', $this->tipofirma);
		$tipofirma_a = ($tipofirma == 0) ? ' checked="checked" ' : '';
		$tipofirma_c = ($tipofirma == 1) ? ' checked="checked" '  : '';

		// Mostar formulario
		$this->html .= '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
			<fieldset>
			<legend><img src="../img/admin/contact.gif" />'.$this->l('Configuración del TPV').'</legend>
				<table border="0" width="680" cellpadding="0" cellspacing="0" id="form">
					<tr><td colspan="2">'.$this->l('Por favor completa los datos de config. del comercio').'.<br /><br /></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('Entorno de Redsys').'</td><td><select name="urltpv"><option value="1"'.$entorno_real.'>'.$this->l('Real').'</option><option value="2"'.$entorno_t.'>'.$this->l('Pruebas en sis-t').'</option><option value="3"'.$entorno_i.'>'.$this->l('Pruebas en sis-i').'</option><option value="4"'.$entorno_d.'>'.$this->l('Pruebas en sis-d').'</option></select></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('Nombre del comercio').'</td><td><input type="text" name="nombre" value="'.htmlentities(Tools::getValue('nombre', $this->nombre), ENT_COMPAT, 'UTF-8').'" style="width: 200px;" /></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('N&uacute;mero de comercio (FUC)').'</td><td><input type="text" name="codigo" value="'.Tools::getValue('codigo', $this->codigo).'" style="width: 200px;" /></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('Tipos de pago permitidos').'</td><td><select name="tipopago" style="width: 120px;"><option value=""></option><option value=" "'.$tipopago_a.'>Todos</option><option value="C"'.$tipopago_b.'>Solo con Tarjeta</option><option value="T"'.$tipopago_c.'>Tarjeta y Iupay</option></select></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('Clave secreta de encriptación').'</td><td><input type="text" name="clave" value="'.Tools::getValue('clave', $this->clave).'" style="width: 200px;" /></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('N&uacute;mero de terminal').'</td><td><input type="text" name="terminal" value="'.Tools::getValue('terminal', $this->terminal).'" style="width: 80px;" /></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('Tipo de firma').'</td><td><input type="radio" name="tipofirma" id="tipofirma_c" value="1"'.$tipofirma_c.'/>'.$this->l('Completa').'<input type="radio" name="tipofirma" id="tipofirma_a" value="0"'.$tipofirma_a.'/>'.$this->l('Ampliada').'</td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('Tipo de moneda').'</td><td><select name="moneda" style="width: 80px;"><option value=""></option><option value="978"'.$iseuro.'>EURO</option><option value="840"'.$isdollar.'>DOLLAR</option></select></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('Tipo de transacción').'</td><td><input type="text" name="trans" value="'.Tools::getValue('trans', $this->trans).'" style="width: 80px;" /></td></tr>
					<tr><td width="215" style="height: 35px;">'.$this->l('Recargo (% de recargo en el precio)').'</td><td><input type="text" name="recargo" value="'.Tools::getValue('recargo', $this->recargo).'" style="width: 80px;" /></td></tr>
		</td></tr>
				</table>
			</fieldset>
			<br>
			<fieldset>
			<legend><img src="../img/admin/cog.gif" />'.$this->l('Personalización').'</legend>
			<table border="0" width="680" cellpadding="0" cellspacing="0" id="form">
		<tr>
		<td colspan="2">'.$this->l('Por favor completa los datos adicionales').'.<br /><br /></td>
		</tr>
		<tr>
		<td width="340" style="height: 35px;">'.$this->l('HTTPS en URL de validación').'</td>
			<td>
			<input type="radio" name="ssl" id="ssl_1" value="si" '.$ssl_si.'/>
			<img src="../img/admin/enabled.gif" alt="'.$this->l('Activado').'" title="'.$this->l('Activado').'" />
			<input type="radio" name="ssl" id="ssl_0" value="no" '.$ssl_no.'/>
			<img src="../img/admin/disabled.gif" alt="'.$this->l('Desactivado').'" title="'.$this->l('Desactivado').'" />
			</td>
		</tr>
		<tr>
		<td width="340" style="height: 35px;">'.$this->l('Activar los idiomas en el TPV').'</td>
			<td>
			<input type="radio" name="idiomas_estado" id="idiomas_estado_si" value="si" '.$idiomas_estado_si.'/>
			<img src="../img/admin/enabled.gif" alt="'.$this->l('Activado').'" title="'.$this->l('Activado').'" />
			<input type="radio" name="idiomas_estado" id="idiomas_estado_no" value="no" '.$idiomas_estado_no.'/>
			<img src="../img/admin/disabled.gif" alt="'.$this->l('Desactivado').'" title="'.$this->l('Desactivado').'" />
			</td>
		</tr>
		</table>
			</fieldset>
			<br>
		<input class="button" name="btnSubmit" value="'.$this->l('Guardar configuración').'" type="submit" />
		</form>';
	}

	public function getContent()
	{
		// Recoger datos
		$this->html = '<h2>'.$this->displayName.'</h2>';
		if (!empty($_POST))
		{
			$this->_postValidation();
			if (!count($this->post_errors))
				$this->_postProcess();
			else
				foreach ($this->post_errors as $err)
					$this->html .= '<div class="alert error">'.$err.'</div>';
		}
		else
			$this->html .= '<br />';
		$this->_displayredsys();
		$this->_displayForm();
		return $this->html;
	}

	public function hookPayment($params)
	{
		// Aplicar Recargo
		$porcientorecargo = Tools::getValue('recargo', $this->recargo);
		$porcientorecargo = str_replace (',', '.', $porcientorecargo);
		$totalcompra = (float)$params['cart']->getOrderTotal(true, 3);
		$fee = ($porcientorecargo / 100) * $totalcompra;

		// Valor de compra
		$id_currency = (int)Configuration::get('PS_CURRENCY_DEFAULT');
		$currency = new Currency((int)$id_currency);
		$cantidad = number_format(Tools::convertPrice($params['cart']->getOrderTotal(true, 3) + $fee, $currency), 2, '.', '');
		$cantidad = str_replace('.', '', $cantidad);
		$cantidad = (float)$cantidad;

		// El num. de pedido es  los 8 ultimos digitos del ID del carrito + el tiempo MMSS.
		$numpedido = str_pad($params['cart']->id, 8, '0', STR_PAD_LEFT).date('is');

		$codigo = Tools::getValue('codigo', $this->codigo);
		$moneda = Tools::getValue('moneda', $this->moneda);
		$trans = Tools::getValue('trans', $this->trans);

		$ssl = Tools::getValue('ssl', $this->ssl);
		if ($ssl == 'no')
		$urltienda = 'http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'modules/redsys/respuesta_tpv.php';
		elseif ($ssl == 'si')
		$urltienda = 'https://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'modules/redsys/respuesta_tpv.php';
		else
		$urltienda = 'ninguna';

		$clave = Tools::getValue('clave', $this->clave);

		// SHA1 $trans . $urltienda
		if (Tools::getValue('tipofirma', $this->tipofirma))
			$mensaje = $cantidad.$numpedido.$codigo.$moneda.$clave;
		else
			$mensaje = $cantidad.$numpedido.$codigo.$moneda.$trans.$urltienda.$clave;
		$firma = Tools::strtoupper(sha1($mensaje));

		$products = $params['cart']->getProducts();
		$productos = '';

		// Idiomas del TPV
		$idiomas_estado = Tools::getValue('idiomas_estado', $this->idiomas_estado);
		if ($idiomas_estado == 'si')
		{
			$idioma_web = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);

			switch ($idioma_web)
			{
				case 'es':
				$idioma_tpv = '001';
				break;
				case 'en':
				$idioma_tpv = '002';
				break;
				case 'ca':
				$idioma_tpv = '003';
				break;
				case 'fr':
				$idioma_tpv = '004';
				break;
				case 'de':
				$idioma_tpv = '005';
				break;
				case 'nl':
				$idioma_tpv = '006';
				break;
				case 'it':
				$idioma_tpv = '007';
				break;
				case 'sv':
				$idioma_tpv = '008';
				break;
				case 'pt':
				$idioma_tpv = '009';
				break;
				case 'pl':
				$idioma_tpv = '011';
				break;
				case 'gl':
				$idioma_tpv = '012';
				break;
				case 'eu':
				$idioma_tpv = '013';
				break;
				default:
				$idioma_tpv = '002';
			}
		}
		else
			$idioma_tpv = '0';

		foreach ($products as $product)
			$productos .= $product['quantity'].' '.$product['name'];

		//Variables Confirmation
		$id_cart = (int)$params['cart']->id;
		$context = Context::getContext();
		$cart = $context->cart;
		$customer = new Customer($cart->id_customer);

		$this->smarty->assign(array(
			'urltpv' => Tools::getValue('urltpv', $this->urltpv),
			'cantidad' => $cantidad,
			'moneda' => $moneda,
			'pedido' => $numpedido,
			'codigo' => $codigo,
			'tipopago' => Tools::getValue('tipopago', $this->tipopago),
			'terminal' => Tools::getValue('terminal', $this->terminal),
			'trans' => $trans,
			'merchantdata' => sha1($urltienda),
			'titular' => $customer->firstname.' '.$customer->lastname,
			'nombre' => Tools::getValue('nombre', $this->nombre),
			'urltienda' => $urltienda,
			'productos' => $productos,
			'UrlOk' => 'http://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'index.php?controller=order-confirmation&id_cart='.(int)$id_cart.'&id_module='.(int)$this->id.'&id_order='.(int)$numpedido.'&key='.$customer->secure_key,
			'UrlKO' => $urltienda,
			'firma' => $firma,
			'idioma_tpv' => $idioma_tpv,
			'this_path' => $this->_path,
			'fee' => number_format($fee, 2, '.', '')
		));
		return $this->display(__FILE__, '/views/templates/redsys.tpl');
	}

	public function hookPaymentReturn($params)
	{
		if (!$this->active)
			return;

		$this->smarty->assign(array(
			'total_to_pay' => Tools::displayPrice($params['total_to_pay'], $params['currencyObj'], false),
			'status' => 'ok',
			'id_order' => $params['objOrder']->id
			));

		return $this->display(__FILE__, 'payment_return.tpl');
	}
}
?>