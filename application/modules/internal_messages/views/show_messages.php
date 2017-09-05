<h1><?php echo $read_trigger;?></h1>

<?php echo form_open(base_url() . 'index.php/internal_messages/handler');?>
<?php echo form_submit('set_read',$set_read_label);?>
<?php echo form_hidden('has_read',$has_read);?>
<?php echo form_submit('read_messages',$has_read_label);?>
<table class='table_message'>
<thead>
<tr><th></th><th><?php echo $this->lang->line('sender')?></th><th><?php echo $this->lang->line('content')?></th><th><?php echo $this->lang->line('date')?></th><th><?php echo $this->lang->line('action')?></th></tr>
</thead>
<tbody>
<?php foreach ($messages as $msg){?>
<tr>
<td><input type='checkbox' name='id[]' value='<?php echo $msg->id;?>' /></td>
<td><?php echo humanize($msg->user_name);?></td>
<?php 
	$proposed_date = (!is_null($msg->proposed_date1))?$msg->proposed_date1 . ' s/d ' . $msg->proposed_date2:'';
?>
<td><?php echo $msg->content . ' ' . Internal_message::get_client_name($msg->obj_id,$msg->obj_type) . ' ' . $proposed_date;?></td>
<td class='centered'><?php echo Common::sql_to_human_datetime($msg->create_date);?></td>
<td class='centered'><?php echo anchor(base_url() . 'index.php/' . $msg->followuplink . '/type/edit/msg_id/' . $msg->id . '/id/' . $msg->obj_id . '/survey_id/','Follow up');?></td>
</tr>
<?php }?>
</tbody>
</table>
<?php echo form_close();?>