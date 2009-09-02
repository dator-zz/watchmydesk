<?php
class ErrorController extends Zend_Controller_Action {
	public function errorAction(){
		$errors = $this->_getParam('error_handler');

		switch ($errors->type) { 
		    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
		    case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
        
		        // Erreur 404
		        $this->getResponse()->setHttpResponseCode(404);
		        $this->view->message = 'Pas non trouvé';
		        break;
		    default:
		        // Erreur de l'application
		        $this->getResponse()->setHttpResponseCode(500);
		        $this->view->message = "Erreur de l'application";
		        break;
		}
        
		$this->view->exception = $errors->exception;
		$this->view->request   = $errors->request;
	}
}
