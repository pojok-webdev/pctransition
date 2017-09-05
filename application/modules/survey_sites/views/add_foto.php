<link rel='stylesheet' href='<?php echo base_url();?>css/jquery.fancybox-1.3.4.css' />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery.fancybox-1.3.4.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('.fancy').fancybox();
	$('a#inline').fancybox();
	$('a.inline').fancybox();
});
</script>
<?php
echo form_open_multipart(base_url() . 'index.php/survey_sites/add_foto_handler');
echo form_hidden('survey_id',$survey_id);
echo form_hidden('id',$id);
echo form_input(array('name'=>'userfile','type'=>'file'));
echo form_submit(array('name'=>'save','value'=>'save'));
echo form_close();

echo anchor(base_url() . 'index.php/survey_sites/add_ts_client_site/type/edit/survey_id/' . $survey_id . '/id/' . $id,'Back to client site') . '<br />';

$c = 0;
foreach ($files as $file){
	echo '<a class="inline" href="#' . $c . '"><img src=' . base_url() . 'media/surveys/' . $file . ' /></a>';
	echo '<div style="display:none">';
	echo '<div id="' . $c . '">';
	echo '<img src=' . base_url() . 'media/surveys/' . $file . ' /><br />';
	echo '<a href="' . base_url() . 'index.php/survey_sites/use_foto/survey_id/' . $survey_id . '/id/' . $id . '/name/' . $file . '" class="button">Pakai</a>';
	echo '<a href="' . base_url() . 'index.php/survey_sites/remove_foto/survey_id/' . $survey_id . '/id/' . $id . '/name/' . $file . '" class="button">Hapus</a>';
	echo '</div>';
	echo '</div>';
	$c++;
}
?>
<br />
<div style="display:none">
<div id="data">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
</div></div>
