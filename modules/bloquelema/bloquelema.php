<?php
if (!defined('_PS_VERSION_'))
  exit;
 
class BloqueLema extends Module
{
  public function __construct()
  {
    $this->name = 'bloquelema';
    $this->tab = 'front_office_features';
    $this->version = '1.0.0';
    $this->author = 'Jose A Gomez';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_); 
    $this->bootstrap = true;
 
    parent::__construct();
 
    $this->displayName = $this->l('Bloque para crear lemas');
    $this->description = $this->l('Bloque para crear lemas en cualquier parte de la tienda.');
 
    $this->confirmUninstall = $this->l('Estás seguro de que quieres desinstalarlo?');
 
    if (!Configuration::get('BLOQUELEMA_NAME'))      
      $this->warning = $this->l('nombre no proporcionado');
  }

public function install()
{
  if (Shop::isFeatureActive())
    Shop::setContext(Shop::CONTEXT_ALL);
 
  if (!parent::install() ||
    !$this->registerHook('top') ||
    !$this->registerHook('header') ||
    !Configuration::updateValue('BLOQUELEMA_NAME', 'my friend')
  )
    return false;
 
  return true;
}

public function uninstall()
{
  if (!parent::uninstall() ||
    !Configuration::deleteByName('BLOQUELEMA_NAME')
  )
    return false;
 
  return true;
}

public function hookDisplayTop($params)
{
  $this->context->smarty->assign(
      array(
          'bloque_lema_name' => Configuration::get('BLOQUELEMA_NAME'),
          'bloque_lema_link' => $this->context->link->getModuleLink('bloquelema', 'display')
      )
  );
  return $this->display(__FILE__, 'bloquelema.tpl');
}
   
public function hookDisplayRightColumn($params)
{
  return $this->hookDisplayLeftColumn($params);
}
   
public function hookDisplayHeader()
{
  $this->context->controller->addCSS($this->_path.'css/bloquelema.css', 'all');
}   

}



