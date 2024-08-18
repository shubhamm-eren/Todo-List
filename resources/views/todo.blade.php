<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo Lists</title>
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@200&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="top_header">
			<h1>{{$title}}</h1>
		</div>
		<div class="form_container">
			@php
			// print_r($edit_task);
			@endphp
			<form action="{{$url}}" method="post">
				@csrf
				<div class="form_control">
					<input type="text" name="title" value="{{ isset($edit_task) ? $edit_task->title : '' }}" placeholder="Title">
					@error('title')
					<span class="err">{{$message}}</span>
					@enderror
				</div>
				<div class="form_control">
					<textarea name="description" placeholder="Description">{{ isset($edit_task) ? $edit_task->description : '' }}</textarea>
					@error('description')
					<span class="err">{{$message}}</span>
					@enderror
				</div>
				<input type="submit" name="save" value="{{$button}}">
			</form>
		</div>
		<div class="view_table">
			<table>
				<thead>
					<tr>
						<th>Task ID</th>
						<th>Title</th>
						<th>Description</th>
						<th>Created</th>
						<th colspan="2">Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tasks as $task)
					<tr>
						<td>{{$task->task_id}}</td>
						<td>{{$task->title}}</td>
						<td>{{$task->description}}</td>
						<td>{{$task->created_at->toDateString()}}</td>
						<td>
							<a class="edit_link" href="{{route('task.edit',['id'=> $task->task_id])}}">
								<i class="fas fa-edit"></i>
							</a>
						</td>
						<td><a class="delete_link" href="{{route('task.delete',['id'=> $task->task_id])}}">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>