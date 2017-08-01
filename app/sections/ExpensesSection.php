<?php
class ExpensesSection extends AbstractMenuSection {

	public function runGetMethod($params) {

		session_start();

		if (!$this->userIsLoggedIn())
			header('Location: ' . $this->appFacade->getAppURL() . 'login/');

		$this->init();
		$this->view->display('expenses');
	}

	public function runPostMethod($params) {

		session_start();

		if (!$this->userIsLoggedIn())
			header('Location: ' . $this->appFacade->getAppURL() . 'login/');

		$this->handlePostRequest($params);
	}

	private function handlePostRequest($params) {

		switch ($params['expenses-action']) {

			case 'add-expense':
				$this->addExpense($params);
				break;
		}
	}

	private function addExpense($params) {

		$expenseItemId = $this->checkAndAddNewItem($params);

		$expensesProxy = new ExpensesProxy(DBWrapper::cloneInstance());
		$expensesProxy->addExpense($expenseItemId, $_SESSION[Consts::USERID_INDEX], $params['expense-amount']);
	}

	private function checkAndAddNewItem($params) {

		if (isset($params['expense-item-id']) && $params['expense-item-id'] != 0)
			return $params['expense-item-id'];

		$itemsProxy = new ItemsProxy(DBWrapper::cloneInstance());
		$itemsProxy->addItem($params['expense-item-label']);

		return $itemsProxy->lastInsertId();
	}
}