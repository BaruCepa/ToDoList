<?php

declare(strict_types=1);

namespace App\Model;

use Nette\Database\Explorer;
use Nette\SmartObject;

class DatabaseManager
{
	use SmartObject;

	protected Explorer $database;

	public function __construct(Explorer $database)
	{
		$this->database = $database;
	}
}