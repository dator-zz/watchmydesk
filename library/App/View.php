<?php
class App_View extends Zend_View{
	protected function _run(){
		extract($this->getVars(), EXTR_SKIP);
		if ($this->_useViewStream && $this->useStreamWrapper()) {
			include 'zend.view://' . func_get_arg(0);
		} else {
			include func_get_arg(0);
		}

	}
}