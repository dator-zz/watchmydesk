<?php
class Plugin_Translate extends  Zend_Controller_Plugin_Abstract {
  public function __construct($view){
    $this->_view = $view;
  }
  public function routeShutdown($view) {
    $locale = $this->getRequest()->getParam('language');
                            $translate = new Zend_Translate('array',APPLICATION_PATH.'/languages/fr_FR.php','fr');
                            $translate->addTranslation(APPLICATION_PATH.'/languages/en_US.php','en');

    Zend_Registry::set('Zend_Locale', $locale);
    
    if (!$translate->isAvailable($locale)) {
        $translate->setLocale('en');
        $this->_view->language = 'en';
    } else {
        $translate->setLocale($locale);
        $this->_view->language = Zend_Registry::get('Zend_Locale');
    }
    
    Zend_Registry::set('Zend_Translate', $translate);
    
  }
}