<?php
echo $message;
echo form_open($action);
echo form_hidden('query',$query);
echo form_submit('yes',$this->lang->line('yes'));
echo form_submit('no',$this->lang->line('no'));
echo form_close();