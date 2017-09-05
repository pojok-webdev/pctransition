<html>
<head>
<style type='text/css'>
table tr{
margin: 10px;
background: gray;
}
</style>
<script type='text/javascript' src='<?php echo base_url();?>asset/ckeditor/ckeditor.js'></script>
<title>Ticket</title>
</head>
<body>
<ul class='menu'>
<li><a href='<?php echo base_url();?>index.php/tickets/lists'>Lists</a></li>
</ul>
<h1>TICKET</h1>
<form action='<?php echo base_url();?>index.php/tickets/handler' method='POST'>
<input type='hidden' name='post_sender' value='ticket_answer' />
<input type='hidden' name='prev_id' value='<?php echo $id;?>' />
<input type='hidden' name='subject' value='<?php echo 'Re: ' . $subject;?>' />
<table>
<tr><td>Judul</td><td>:</td><td><?php echo $subject;?></td></tr>
<tr><td>Isi</td><td>:</td><td><?php echo $content;?></td></tr>
<tr><td>Jawaban</td><td>:</td><td><textarea class='ckeditor' name='content'></textarea></td></tr>
</table>
<input type='submit' name='submit' value='Submit' />
</form>
</body>
</html>