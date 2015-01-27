{*
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
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<img src="modules/redsys/img/redsys.png" /><br /><br />
{if $status == 'ok'}
	<p>{l s='Your order on %s is complete.' sprintf=$shop_name mod='redsys'}
		<br /><br />- {l s='Payment amount.' mod='redsys'} <span class="price"><strong>{$total_to_pay}</strong></span>
		<br /><br />- N# <span class="price"><strong>{$id_order}</strong></span>
		<br /><br />{l s='An email has been sent to you with this information.' mod='redsys'}
		<br /><br />{l s='For any questions or for further information, please contact our' mod='redsys'} <a href="{$link->getPageLink('contact', true)|escape:'html'}">{l s='customer service department.' mod='redsys'}</a>.
	</p>
{else}
	<p class="warning">
		{l s='We have noticed that there is a problem with your order. If you think this is an error, you can contact our' mod='redsys'} 
		<a href="{$link->getPageLink('contact', true)|escape:'html'}">{l s='customer service department.' mod='redsys'}</a>.
	</p>
{/if}
