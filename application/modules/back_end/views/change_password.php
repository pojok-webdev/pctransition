<?php
echo form_open('back_office/change_password_handler');
echo form_label('Old Password','old_password',array('class'=>'label_float_long'));
echo form_password('old_password','','class="text_long"') . '<br />';
echo form_label('New Password','new_password',array('class'=>'label_float_long'));
echo form_password('new_password','','class="text_long"') . '<br />';
echo form_label('New Password again','new_password2',array('class'=>'label_float_long'));
echo form_password('new_password2','','class="text_long"') . '<br />';
echo '<div class="page_control">';
echo form_submit('Save','save','class="button"');
echo form_submit('Close','close','class="button"');
echo '</div>';
echo form_close();