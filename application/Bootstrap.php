<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public function run()
	{
		// Cela permet d'avoir la configuration disponible de partout dans notre application
		Zend_Registry::set('config', new Zend_Config($this->getOptions()));
		parent::run();
	}

	protected function _initAutoload()
	{
		// On enregistre les modules (les parties de notre application), souvenez-vous :Backend et Frontend
		$loader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath'  => APPLICATION_PATH));

		return $loader;
	}

	protected function _initSession()
	{
		// On initialise la session
		$session = new Zend_Session_Namespace('watchmydesk', true);
		Zend_Registry::set('session', $session);
		return $session;
	}

	protected function _initView()
	{
		// Initialisation de la vue et des helpers de vue
		$view = new App_View();
		$view->doctype('XHTML1_STRICT');

		$view->addHelperPath(APPLICATION_PATH . '/views/helpers');
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
		$viewRenderer->setView($view);

		
		return $view;
	}

	protected function _initRouter()
	{
		$this->bootstrap('frontController');
		$front = $this->getResource('frontController');
		$router = $front->getRouter();
		$router->addConfig(new Zend_Config_Ini(APPLICATION_PATH . '/configs/routes.ini', 'routes'), 'routes');
 		return $router;
	}

	protected function _initTranslatePlugin() {
		$this->bootstrap('view');
		$this->bootstrap('frontController');
		$front = $this->getResource('frontController');
		$view = $this->getResource('view');
		$front->registerPlugin(new Plugin_Translate($view));
	}

}
