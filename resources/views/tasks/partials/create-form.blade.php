<div class="card">
	<div class="card-body bg-light">
		<form action="/tasks/store" method="POST">
			@csrf

			<div class="form-group">
				<label for="exampleInputEmail1">Title</label>
				<input type="text" class="form-control" name="title" placeholder="Type your title" required="required">
			</div>
			<br>
			<div>
				<label for="exampleInputEmail1">Description</label>
				<textarea name="description" class="form-control" cols="30" rows="3" placeholder="Type optional description."></textarea>
			</div>
			<br>
			<div>
				<button class="btn btn-primary" type="submit">Add new task</button>
			</div>
		</form>
	</div>	
</div>