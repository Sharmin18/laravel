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
	<ul>
		@foreach($tasks as $task)
			<li>
				@if($task->status)
					<del>{{ $task->title }}</del>
				@else
					{{ $task->title }}
				@endif	
				
				 - added at {{ $task->created_at->diffForHumans() }}

				@include('tasks.partials.toggle')
			</li>
		@endforeach	
	</ul>
</body>
</html>