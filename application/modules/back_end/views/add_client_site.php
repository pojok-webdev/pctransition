<form action='<?php echo base_url();?>index.php/back_end/add_client_site_handler' method='post'>
<input type='hidden' name='id' value=<?php echo $uri['survey_id'];?>>
<table>
<tr>
<td><?php echo $this->lang->line('address');?></td><td>:</td><td><input type='text' name='address' /></td>
</tr><tr>
<td><?php echo $this->lang->line('city');?></td><td>:</td><td><input type='text' name='city' /></td>
</tr><tr>
<td><?php echo $this->lang->line('phone_area');?></td><td>:</td><td><input type='text' name='phone_area' /></td>
</tr><tr>
<td><?php echo $this->lang->line('phone');?></td><td>:</td><td><input type='text' name='phone' /></td>
</tr><tr>
<td><?php echo $this->lang->line('pic');?></td><td>:</td><td><input type='text' name='pic' /></td>
</tr><tr>
<td><?php echo $this->lang->line('position');?></td><td>:</td><td><input type='text' name='pic_position' /></td>
</table>
<input type='submit' name='save' value='<?php echo $this->lang->line('save');?>' />
<a href='<?php echo base_url()?>index.php/back_end/entry_ts_survey_request/type/edit/id/<?php echo $uri['survey_id'];?>'>Batal</a>
</form>