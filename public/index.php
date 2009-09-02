<?php

defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('LIBRARY_PATH')
|| define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/../library/'));


defined('APPLICATION_ENV')
|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// On modifie l'include path de PHP
set_include_path(implode(PATH_SEPARATOR, array(
	realpath(LIBRARY_PATH),
	get_include_path(),
)));

// On a besoin de Zend Application pour lancer notre application
require_once 'Zend/Application.php';

require_once 'Zend/Session.php';
Zend_Session::start();

// On creer l'application, on lance le bootstrap et on lance l'application !
$application = new Zend_Application(
	APPLICATION_ENV,
	APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()->run();

 