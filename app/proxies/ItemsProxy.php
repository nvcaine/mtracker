<?php
class ItemsProxy extends AbstractProxy {

	const TABLE = 'items';

	public function addItem($label) {

		$values = array('label' => $label);
		$query = 'INSERT INTO ' . self::TABLE .	' (label) VALUES (:label)';

		$this->db->query($query, $values, null, false);
	}

	public function getItemsAutocompleteResults($autoCompleteQuery) {

		$query = 'SELECT * FROM ' . self::TABLE . ' WHERE label LIKE \''.$autoCompleteQuery.'%\' ORDER BY label';

		return $this->db->query($query);
	}

	public function lastInsertId() {
		return $this->db->lastInsertID();
	}
}