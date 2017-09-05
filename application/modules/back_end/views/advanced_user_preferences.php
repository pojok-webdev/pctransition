<script type='text/javascript'>
$(document).ready(function(){
	$('#C').click(function(){
		$('.C').attr('checked',this.checked);
	});
	$('#R').click(function(){
		$('.R').attr('checked',this.checked);
	});
	$('#U').click(function(){
		$('.U').attr('checked',this.checked);
	});
	$('#D').click(function(){
		$('.D').attr('checked',this.checked);
	});
	
});
</script>
<form action='<?php echo base_url() . 'index.php/back_end/advanced_user_preference_handler'?>' method='post'>
<input type='hidden' name='user_id' value='<?php echo $user_id; ?>' />
Advanced setting for <strong><?php echo humanize($user_preferences['username']);?></strong>:
<input type='hidden' name='username' value='<?php echo $user_preferences["username"]?>' />
<table class='padi_table'>
<thead>
  <tr>
    <th>Nama</th>
    <th><input type=checkbox name='C' id='C' />C</th><th><input type=checkbox name='R' id='R' />R</th><th><input type=checkbox name='U' id='U' />U</th><th><input type=checkbox name='D' id='D' />D</th>
  </tr>
</thead>
<tbody>
<?php foreach ($modules as $module){?>
<tr>
<td><?php echo $module->name;?></td>
<?php
$c_checked = (isset($user_preferences['c'][$module->id]))?(($user_preferences['c'][$module->id]=='1')?"'checked'=>'checked'":''):'';
$r_checked = (isset($user_preferences['r'][$module->id]))?(($user_preferences['r'][$module->id]=='1')?"'checked'=>'checked'":''):'';
$u_checked = (isset($user_preferences['u'][$module->id]))?(($user_preferences['u'][$module->id]=='1')?"'checked'=>'checked'":''):'';
$d_checked = (isset($user_preferences['d'][$module->id]))?(($user_preferences['d'][$module->id]=='1')?"'checked'=>'checked'":''):'';
?>
<td><?php echo form_checkbox('c[' . $module->id . ']',$module->id,$c_checked,'class="C"');?></td>
<td><?php echo form_checkbox('r[' . $module->id . ']',$module->id,$r_checked,'class="R"');?></td>
<td><?php echo form_checkbox('u[' . $module->id . ']',$module->id,$u_checked,'class="U"');?></td>
<td><?php echo form_checkbox('d[' . $module->id . ']',$module->id,$d_checked,'class="D"');?></td>
</tr>
<?php }?>
</tbody>
</table>
<input name='save' value=<?php echo $this->lang->line('save');?> type='submit' />
<input name='close' value=<?php echo $this->lang->line('close');?> type='submit' />
</form>