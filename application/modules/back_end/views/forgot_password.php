<html>
<head>
<link href="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/css/login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class='content'>
<form method='POST' action='<?php echo base_url();?>index.php/back_end/handler'>
<input type='hidden' name='post_sender' value='forgot_password' />
<div class='form'>
<div>Email:<input type='text' name='email' /></div>
<div>Password akan dikirimkan ke email anda</div>
<br />
</div>
<div class='button'>
<input type='submit' name='submit' value='Submit' id='btn' class='submit' />
</div>
</form>
</div>
</body>
</html>
