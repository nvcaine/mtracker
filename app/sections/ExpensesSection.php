<?php
class ExpensesSection extends AbstractMenuSection {

	public function runGetMethod($params) {

		session_start();

		if (!$this->userIsLoggedIn())
			header('Location: ' . $this->appFacade->getAppURL() . 'login/');

		$this->init();
		$this->view->display('expenses');
	}
}