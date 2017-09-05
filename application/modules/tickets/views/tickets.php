<html>
<head>
<script type='text/javascript' src='<?php echo base_url();?>asset/ckeditor/ckeditor.js'></script>
<title>Ticket</title>
</head>
<body>
<ul class='menu'>
<li><a href='<?php echo base_url();?>index.php/tickets/lists'>Lists</a></li>
</ul>
<h1>TICKET</h1>
<form action='<?php echo base_url();?>index.php/tickets/handler' method='POST'>
<input type='hidden' name='post_sender' value='ticket' />
<input type='hidden' name='prev_id' value='0' />
<table>

<tr><td>Judul</td><td>:</td><td><input name='subject' id='subject' type='text' /></td></tr>
<tr><td>Permasalahan</td><td>:</td><td><textarea name='content' id='problem_textarea' class='ckeditor'></textarea></td></tr>
</table>
<input type='submit' name='submit' value='Submit Ticket' />
</form>
</body>
</html>