<form action="/tasks/store" method="POST">
	@csrf

	<div>
		<input type="text" name="title" placeholder="Type your title" required="required">
	</div>
	<br>
	<div>
		<textarea name="description" id="" cols="30" rows="3" placeholder="Type optional description."></textarea>
	</div>
	<br>
	<div>
		<button type="submit">Add new task</button>
	</div>
</form>