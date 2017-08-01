<?php
class ItemsProxy extends AbstractProxy {

	const TABLE = 'items';

	public function addItem($label) {

		$values = array('label' => $label);
		$query = 'INSERT INTO ' . self::TABLE .	' (label) VALUES (:label)';

		$this->db->query($query, $values, null, false);
	}
}