<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\DatabaseManager;
use Nette\Utils\ArrayHash;

class ToDoListManager extends DatabaseManager
{
	const
			TABLE_NAME = 'todo',
			COLUMN_ID = 'id',
			COLUMN_DONE = 'is_done',
			COLUMN_NAME = 'name',
			COLUMN_DESCRIPTION = 'description';

	public function getItems()
	{
		return $this->database->table(self::TABLE_NAME)->order(self::COLUMN_ID . ' DESC');
	}

	public function saveItem(ArrayHash $data)
	{
		$this->database->table(self::TABLE_NAME)->insert($data);
	}

	public function deleteItem(int $id)
	{
		$this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
	}

	public function doneItem(int $id)
	{
		$this->database->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->update(['is_done' => true]);
	}
}