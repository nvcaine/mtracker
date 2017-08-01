<?php
class ExpensesProxy extends AbstractProxy {

	const TABLE = 'expenses';

	public function addExpense($itemId, $userId, $amount) {

		$values = array(
			'item_id' => $itemId,
			'user_id' => $userId,
			'amount' => $amount
		);
		$keys = array_keys($values);

		$query = 'INSERT INTO ' . self::TABLE .
		' (' . implode(',', $keys) . ') VALUES (' . implode(',', $this->getQueryTokens($keys)) . ')';

		$this->db->query($query, $values, null, false);
	}

	private function getQueryTokens($keys) {
		return array_map(array($this, 'getTokenFromKey'), $keys);
	}

	private function getTokenFromKey($key) {
		return ':' . $key;
	}
}