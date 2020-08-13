<form action="/tasks/toggle/{{ $task->id }}" method="POST">
	@csrf

	<button type="submit">
		@if($task->status)
			Uncheck
		@else
			Mark done
		@endif	
	</button>
</form>