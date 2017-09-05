<form action='<?php echo base_url();?>index.php/back_end/add_member_handler' method='post'>
<input type='hidden' name='id' value=<?php echo $uri['spv'];?>>
<table class='padi_table'>
<thead><tr><th><input type='checkbox' id='select_all' /></th><th>Nama</th></tr></thead>
<?php
foreach ($objs as $obj){
	echo '<tr><td>' . form_checkbox('user_id[]',$obj->id) . '</td><td>' . $obj->username . '</td></tr>';
}
?>
</table>
<input type=submit name='use' value='Use' />
<a href='<?php echo base_url()?>index.php/back_end/entry_user/type/edit/id/<?php echo $uri['spv'];?>'>Batal</a>
</form>