<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task Management</title>
</head>
<body>
	
	<h1>Task management</h1>

	@include('tasks.partials.create-form')

	<hr>

	<div>
		Filter by
		<a href="/">All</a>
		<a href="?sort=done">Done</a>
		<a href="?sort=pending">Pending</a>
	</div>

	<div>
		<form action="" method="GET">
			<input type="text" value="{{ request()->keyword }}" placeholder="Search your task" name="keyword">
		</form>
	</div>
	
	<ul>
		@foreach($tasks as $task)
			<li style="background: #FAFBFC; margin: 10px 0; padding: 10px 20px;">
				@if($task->status)
					<del>{{ $task->title }}</del>
				@else
					{{ $task->title }}
				@endif	
				
				 - added at {{ $task->created_at->diffForHumans() }}

				@if(! $task->status)
					<a href="/tasks/edit/{{ $task->id }}">Edit</a> |
				@endif

				<a href="/tasks/delete/{{ $task->id }}" style="color: red; padding-left: 30px; text-decoration: none;">Delete</a>

				@include('tasks.partials.toggle')
			</li>
		@endforeach	
	</ul>

	{{ $tasks->links() }}	
</body>
</html>