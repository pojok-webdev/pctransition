<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/css/back-end.css" />
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-1.5.1.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>fancybox/jquery.fancybox-1.3.4.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('a.fance').fancybox();
});
</script>
<?php
echo '<h1>' . $this->lang->line('pictures') . '</h1>';
echo '<div class="content_isi">';
echo form_open_multipart('back_end/upload_cover_file');
echo form_hidden('identifier',$identifier);
echo form_hidden('identifier_value',$identifier_value);
//echo form_hidden('ori_image',$ori_image);
echo form_upload('userfile','gambar1');
echo form_submit(array('name'=>'upload','value'=>'upload'));
echo form_submit('cancel','cancel');
echo form_close();

echo '<table class="tabel">';
echo '<thead>';
echo '<tr><th>' . $this->lang->line('name') . '</th><th colspan=3>' . $this->lang->line('action') . '</th></tr>';
echo '</thead>';
foreach ($filenames as $f){
echo '<tr>';
echo '<td>' . $f . '</td>';
echo '<td><a class="fance" href="' . base_url() . 'media/magazines/cover/' . $f . '">' . $this->lang->line('preview') . '</a></td>';
echo '<td>' . anchor('back_end/entry_magazine/type/edit/identifier/' . $identifier . '/identifier_value/' . $identifier_value . '/image_type/pic/image/' . $f . '/page/0',$this->lang->line('use')) . '</td>';
//echo '<td>' . anchor('back_end/remove_magazine/identifier/' . $identifier . '/identifier_value/' . $identifier_value . '/pic/' . $f . '/image/' . $ori_image,$this->lang->line('delete'),'class="text_link"') . '</td>';
echo '</tr>';
}
echo '</table>';
echo '</div>';
?>
