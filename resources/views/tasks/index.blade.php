<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task Management</title>
</head>
<body>
	
	<h1>Task management</h1>

	<ul>
		@foreach($tasks as $task)
			<li>
				@if($task->status)
					<del>{{ $task->title }}</del>
				@else
					{{ $task->title }}
				@endif	
				
				 - added at {{ $task->created_at->diffForHumans() }}

				<button>
					@if($task->status)
						Uncheck
					@else
						Mark done
					@endif	
				</button>
			</li>
		@endforeach	
	</ul>
</body>
</html>