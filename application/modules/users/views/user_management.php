<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>css/responsivetable/chriscoyyer.css' />
<div id='no-more-tables'>
<table>
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Status</th>
<th>Group</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($users as $user){?>
<tr>
<td data-title="Name"><?php echo $user->username;?></td>
<td data-title="Email"><?php echo $user->email;?></td>
<td data-title="Status"><?php echo $user->status;?></td>
<td data-title="Group"><?php echo $user->group->name;?></td>
<td data-title="Action">Edit</td>
</tr>
<?php }?>
</tbody>
</table>
</div>
