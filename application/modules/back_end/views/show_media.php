<link rel='stylesheet' href='<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/css/back-end.css' />
<link rel='stylesheet' href='<?php echo base_url();?>fancybox/jquery.fancybox-1.3.4.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.5.1.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>fancybox/jquery.fancybox-1.3.4.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('.fance').fancybox();
});
</script>
<?php
echo form_open_multipart('back_end/media_handler/field/' . $field);
echo form_upload('userfile','gambar');
echo form_submit('upload','Upload');
echo form_close();
echo '<table class="tabel">';
echo '<thead><tr><th>' . $this->lang->line('name') . '</th><th colspan=3>' . $this->lang->line('action') . '</th></tr></thead>';
foreach ($filenames as $f){
	echo '<tr><td>' . $f . '</td>';
	echo '<td>' . anchor(base_url() . 'index.php/back_end/media_handler/type/use/field/' . $field . '/image/' . $f,$this->lang->line('use')) . '</td>';
	echo '<td>' . anchor(base_url() . 'media/images/' . $f,'Preview','class="fance"') . '</td>';
	echo '<td>' . anchor(base_url() . 'index.php/back_end/media_handler/type/remove/field/' . $field . '/image/' . $f,$this->lang->line('delete')) . '</td></tr>';
}
echo '</table>';
