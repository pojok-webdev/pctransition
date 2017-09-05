<html>
<head></head>
<body>
<h1>List Ticket</h1>
<a href='<?php echo base_url();?>index.php/tickets/'>Add</a>
<table>
<thead><tr><th>Judul</th><th>Isi</th><th>Detai</th></tr></thead>
<tbody>
<?php foreach($tickets as $ticket){?>
<tr>
<td><?php echo $ticket->subject;?></td>
<td><?php echo character_limiter($ticket->content,20);?></td>
<td><a href='<?php echo base_url();?>index.php/tickets/detail/id/<?php echo $ticket->id;?>'>Detail</a></td>
</tr>
<?php }?>
</tbody>
</table>
</body>
</html>