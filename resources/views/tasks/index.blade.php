<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Task Management</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">
		<h1 class="py-4 text-primary">Task management</h1>

		<div class="row">
			<div class="col-sm-4">
				@include('tasks.partials.create-form')		
			</div>
		</div>
		

		<hr>

		<div class="row">
			<div class="col-sm-6"></div>
			<div class="col-sm-3">
				<span class="text-muted">Filter by</span>
				<a href="/" class="px-2 font-weight-bold">All</a>
				<a href="?sort=done" class="px-2 font-weight-bold">Done</a>
				<a href="?sort=pending" class="px-2 font-weight-bold">Pending</a>
			</div>
			<div class="col-sm-3">
				<form action="" method="GET">
					<input class="form-control" type="text" value="{{ request()->keyword }}" placeholder="Search your task" name="keyword">
				</form>
			</div>
		</div>

		<ul class="list-group list-group-flush mt-5">
			@foreach($tasks as $task)
				<li class="list-group-item bg-light">
					<span class="h5">
						@if($task->status)
							<span class="text-danger">
								<del>{{ $task->title }}</del>
							</span>
						@else
							{{ $task->title }}
						@endif
					</span>

					<span class="text-muted">added at </span> {{ $task->created_at->diffForHumans() }}
					
					<div class="row my-2">
						@if(! $task->status)
							<div class="col-sm-1">
								<a class="btn btn-outline-dark btn-sm" href="/tasks/edit/{{ $task->id }}">Edit</a>
							</div>
						@endif
						<div class="col-sm-1">
							<a class="btn btn-outline-danger btn-sm" href="/tasks/delete/{{ $task->id }}">Delete</a>							
						</div>
						<div class="col-sm-2">
							@include('tasks.partials.toggle')
						</div>
					</div>		
				</li>
			@endforeach	
		</ul>

		{{ $tasks->links() }}	
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>