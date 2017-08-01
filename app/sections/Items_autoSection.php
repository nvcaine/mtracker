<?php
class Items_autoSection extends AbstractSection {

	public function runGetMethod($params) {

		header("Content-type: application/json");

		session_start();

		if (isset($_SESSION[Consts::LOGGED_IN_INDEX]) && ($_SESSION[Consts::LOGGED_IN_INDEX] === true))
			$this->handleAsyncRequest($params);
		else
			echo json_encode(array('error' => 'Not authorized.'), JSON_PRETTY_PRINT);
	}

	private function handleAsyncRequest($params) {

		if (isset($params['query']))
			echo json_encode($this->getItemsAutocompleteResults($params['query']), JSON_PRETTY_PRINT);
	}

	private function getItemsAutocompleteResults($query) {

		$itemsProxy = new ItemsProxy(DBWrapper::cloneInstance());

		return $itemsProxy->getItemsAutocompleteResults($query);
	}
}