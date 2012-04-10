<div class="span6 offset3">
	<?=form_open("/auth/register/",array('class'=>'form-horizontal'))?>

	<div class="control-group">
		<label for="email_address" class="control-label">Email Address</label>
		<div class="controls"><input type="text" name="email_address" id="email_address" class="input-xlarge"></div>
	</div>
	<div class="control-group">
		<label for="password" class="control-label">Password</label>
		<div class="controls"><input type="password" name="password" id="password" class="input-xlarge"></div>
	</div>
	<div class="control-group">
		<label for="password_confirmation" class="control-label">Password Confirmation</label>
		<div class="controls"><input type="password" name="password_confirmation" id="password_confirmation" class="input-xlarge"></div>
	</div>
	<div class="form-actions"><button type="submit" class="btn btn-primary">Create Account</button></div>
</div>