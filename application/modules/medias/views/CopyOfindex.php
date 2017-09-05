<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.5.1.min.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('.pic').hover(function(){
		$('#pic_helper').css('display','block');
	});
	$('.pic').mouseout(function(){
		$('#pic_helper').css('display','none');
	});
});
</script>
<?php
echo form_open_multipart('medias/upload');
echo form_upload('userfile','gambar1');
echo form_submit(array('name'=>'upload','value'=>'upload'));
echo form_close();
echo 'random_string' . $random_string . '<br />';
echo '<table class="pic">';
echo '<tbody>';
$c=0;
echo '<tr>';
foreach($filenames as $f){
	echo '<td><img src=' . base_url() . '/uploads/' . $f . ' width=100 height=100 class="pic"><div><span class="button">' . anchor('properties/edit/random_string/' . $random_string . '/pic/' . $f,'pakai') . '</span><span class="button"><a href="x">hapus</a></span></div></td>';
	if($c%2==0){
		echo '</tr><tr>';
	}
	$c++;
}
echo '</tr>';
echo '</tbody>';
echo '</table>';
?>
<div id='pic_helper'>

</div>
<style type='text/css'>
#pic_helper{
	display:none;
}
.pic tbody td{
	border: 1px solid black;
}
.button{
	width: 50px;
	margin-left: 7px;
	margin-right: 7px;
	background: red;
}
</style>