<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create a new task</title>
</head>
<body>
	
	<form action="/tasks/update/{{ $task->id }}" method="POST">
		@csrf

		<div>
			<input type="text" name="title" placeholder="Type your title" required="required" value="{{ $task->title }}">
		</div>
		<br>
		<div>
			<textarea name="description" id="" cols="30" rows="3" placeholder="Type optional description.">{{ $task->description }}</textarea>
		</div>
		<br>
		<div>
			<button type="submit">Edit Now</button>
		</div>
	</form>
</body>
</html>