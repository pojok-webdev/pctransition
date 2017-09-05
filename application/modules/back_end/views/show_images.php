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
echo form_open_multipart('back_end/upload_image');
echo form_upload('userfile','gambar1');
echo form_submit(array('name'=>'upload','value'=>'upload'));
echo form_close();
echo '<table class="pic">';
echo '<tbody>';
$c=1;
echo '<tr>';
foreach($filenames as $f){
	echo '<td>';
	echo '<img src=' . base_url() . '/media/images/' . $f . ' width=100 height=100 class="pic">';
	echo '<div><span class="button">';
	echo anchor('back_end/entry_news/image/' . $f,'Pakai');
	echo '</span><span class="button">';
	echo anchor('medias/remove/pic/' . $f,'Hapus','class="text_link"');
	echo '</span></div></td>';
	if($c%4==0){
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