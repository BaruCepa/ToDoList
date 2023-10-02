<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->addRoute('add', 'ToDoList:add');
		$router->addRoute('remove/<id>', 'ToDoList:remove');
		$router->addRoute('done/<id>', 'ToDoList:done');
		$router->addRoute('<presenter>/<action>[/<id>]', 'ToDoList:default');
		return $router;
	}
}
