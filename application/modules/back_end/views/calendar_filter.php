<?php
echo form_open(base_url() . 'index.php/back_end/calendar_filter_handler');
echo humanize($this->lang->line(Common::get_month_name($month))) . ', ';
echo $this->lang->line('month') .': ' . form_dropdown('month',$months, $month);
echo $this->lang->line('year') . ': ' . form_dropdown('year',$years, $year);
echo form_submit('Go','go');
echo form_close();