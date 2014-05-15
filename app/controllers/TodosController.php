<?php

class TodosController extends BaseController {

	public function getIndex () 
	{
		$todos = Todo::orderBy('done','ASC')->orderBy('created_at', 'DESC')->get();

		return View::make('todos')->with('todos', $todos);
	}

	public function postIndex ()
	{
		$todo_description = Input::get('todo-description');

		$todo = new Todo;
		$todo->description = $todo_description;
		$todo->done = false;

		$todo->save();

		return Redirect::to('/todos');
	}

	public function postUpdate ($id)
	{
		$todo = Todo::find($id);
		$todo->done = Input::get('done');
		$todo->save();
		return Redirect::to('/todos');
	}
}