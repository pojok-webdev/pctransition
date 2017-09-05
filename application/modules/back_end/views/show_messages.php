<table>
<thead>
<tr><th></th><th>Sender</th><th>Content</th><th>Date</th><th></th></tr>
</thead>
<tbody>
<?php foreach ($messages as $msg){?>
<tr>
<td><input type='checkbox' name='mail[]' /></td>
<td><?php echo humanize($msg->user_name);?></td>
<td><?php echo $msg->content . ', ' . $msg->proposed_date1 . ' s/d ' . $msg->proposed_date2?></td>
<td><?php echo $msg->create_date;?></td>
<td><?php echo anchor(base_url() . 'index.php/install_requests/entry_install_request/type/edit/msg_id/' . $msg->id . '/id/' . $msg->obj_id . '/survey_id/','ke request installasi');?></td>
</tr>
<?php }?>
</tbody>
</table>