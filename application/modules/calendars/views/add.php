<link rel='alternate' type='text'>
<?php
$name = (isset($name))?$name:'';
$description = (isset($description))?$description:'';
echo form_open('hosting_packages/add_handler/perpage/3/search/all/order/asc/orderby/name/page');
echo form_hidden('perpage',$url['perpage']);
echo '<div class="common_form">';
echo form_label('Name','name',array('class'=>'text_float_medium'));
echo form_input('name',$name) . '<br />';
echo form_label('Desscription','description',array('class'=>'text_float_medium'));
echo form_input('description',$description) . '<br />';
echo '</div>';
echo '<div class="page_control">';
echo form_submit('save','Save','class="button"');
echo form_submit('close','Close','class="button"');
echo '</div>';
echo form_close();