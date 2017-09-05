<?php
echo form_open('back_office/add_handler');
echo $files . '<br />';
echo form_label('name','Name',array('class'=>'label_float_long'));
echo form_input(array('name'=>'name','id'=>'name')) . '<br />';
echo form_label('title','Title',array('class'=>'label_float_long'));
echo form_input('title') . '<br />';
echo '<div class="page_control">';
echo anchor('back_office/index/' . $this->uri->segment(3),'Upload','class="button"');
echo form_submit(array('name'=>'save','class'=>'button','value'=>'Save'));
echo form_submit(array('name'=>'remove','class'=>'button','value'=>'Remove'));
echo form_submit(array('name'=>'close','class'=>'button','value'=>'Close')) . '<br />';
echo '</div>';
echo form_close();
?>
<div id='preview'></div>