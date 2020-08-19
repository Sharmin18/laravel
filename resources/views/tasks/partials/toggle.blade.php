<form action="/tasks/toggle/{{ $task->id }}" method="POST">
	@csrf

	<button type="submit" class="btn btn-info btn-sm">
		@if($task->status)
			Uncheck
		@else
			Mark done
		@endif	
	</button>
</form>