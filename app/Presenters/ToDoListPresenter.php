<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Model\ToDoListManager;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;


final class ToDoListPresenter extends Nette\Application\UI\Presenter
{
	public ToDoListManager $toDoManager;

	public function __construct(ToDoListManager $toDoManager)
	{
		$this->toDoManager = $toDoManager;
	}

	public function renderDefault()
	{
		$this->template->items = $this->toDoManager->getItems();
	}

	public function addToDoSucceeded(Form $form, ArrayHash $data): void
	{
		$this->toDoManager->saveItem($data);
		$this->flashMessage('Data byla uložena.');
		$this->redirect('ToDoList:');
	}

	public function actionRemove(int $id)
	{
		$this->toDoManager->deleteItem($id);
		$this->flashMessage('Záznam byl úspěšně smazán.');
		$this->redirect('ToDoList:');
	}

	public function actionDone(int $id)
	{
		$this->toDoManager->doneItem($id);
		$this->flashMessage('Úkol byl označen za splněný.');
		$this->redirect('ToDoList:');
	}

	protected function createComponentAddToDoForm(): Form
	{
		$form = new Form();
		$form->addText('name', 'Název:')
			->setRequired("Název je povinný, prosím vyplňte.");
		$form->addText('description', 'Popis:');
		$form->addSubmit('save', 'Uložit');
		$form->onSuccess[] = [$this, 'addToDoSucceeded'];

		return $form;
	}
}
