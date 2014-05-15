@extends('layout.default')
@section('content')
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Add a new todo</h4>
			</div>
			<div class="panel-body">
				<form class="row" role="form" method="POST">
					<div class="form-group col-xs-10">
						<label class="sr-only" for="todo-description">Enter todo description</label>
						<input type="text" name="todo-description" class="form-control" id="todo-description" 
							   placeholder="Enter todo description.">
					</div>
					<button type="submit" class="btn btn-primary">Add todo</button>
				</form>						
			</div>
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>List of existing todos</h4>
			</div>
			<div class="panel-body">
			@if (count($todos) > 0)
				@foreach($todos as $todo)
					<div class="panel panel-default">
						<div class="panel-body">
							{{ Form::model($todo, ['url' => array('todos/update',$todo->id), 'class'=>'form-inline']) }}
								<div class="checkbox">
					            	<label>
					            		{{Form::checkbox('done')}}
					            		@if ($todo->done)
					            			<strike>{{$todo->description}}</strike>
					            		@else
					            			{{$todo->description}}
					            		@endif
					            	</label>
					            </div>
					            {{ Form::submit('update todo', array('class'=>'btn btn-primary pull-right')) }}
							{{ Form::close() }}							
						</div>
					</div>
				@endforeach	
			@else
				<p class="lead text-info">There are no todos, please add one using the form above.</p>
			@endif		
			</div>
		</div>
	</div>
@stop