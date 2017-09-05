<script type='text/javascript'>
$(document).ready(function(){
	$('#select_all').click(function(){
		$('#dump_text').select();
	});
});
</script>
<?php
$menus = (isset($menus))?$menus:'';
echo $menus;
echo form_textarea('dump_text',$dump_text,'id="dump_text"') . '<br />';
echo '<div class="page_control">';
echo form_button(array('name'=>'select_all','id'=>'select_all','content'=>'Select All','class'=>'button'));
echo '</div>';