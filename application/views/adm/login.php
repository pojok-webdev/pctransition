<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('adm/head');?>
	<body>
		<div class="loginBox">
			<div class="loginHead">
				<img src="<?php echo base_url();?>img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>
			</div>
			<form class="form-horizontal" action="<?php echo base_url();?>adm/handler" method="POST">
				<input type='hidden' name='sender' value='login' />
				<div class="control-group">
					<label for="username">Email</label>
					<input type="text" id="username" name='username'/>
				</div>
				<div class="control-group">
					<label for="password">Password</label>
					<input type="password" id="password" name='password'/>
				</div>
				<div class="control-group" style="margin-bottom: 5px;">
					<a href="<?php echo base_url();?>adm/reset_password"> Reset Password</a>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-block">Sign in</button>
				</div>
			</form>
		</div>
	</body>
</html>
