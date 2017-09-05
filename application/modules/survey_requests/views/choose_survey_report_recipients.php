<html>
<?php echo form_open(base_url() . 'index.php/survey_requests/send_mail');?>
<?php echo form_hidden('survey_id',$survey_id);?>
<?php echo form_submit('send','Kirim');?>
<table>
<thead></thead>
<tbody>
<?php foreach($users as $user){	?>
<tr><td><?php echo form_checkbox('recipient[]',$user->id);?></td><td><?php echo $user->username;?></td></tr>
<?php }?>
</tbody>
</table>
<?php echo form_close();?>
</html>