
<?php echo form_open('users/register'); ?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">	
	<?php echo validation_errors('<div class="alert alert-warning text-center">','</div>'); ?>	
		<h1 class="text-center"><?php echo $title ?></h1>
			<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" placeholder="Name">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" name="password2" class="form-control" placeholder="Confirm Password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div> 
	</div>
<?php echo form_close(); ?>