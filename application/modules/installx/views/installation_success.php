<?php
	echo '<div class="common_form">';
	echo $this->lang->line('installation_success') . '<br />';
	echo '</div>';
	echo '<div class="page_control">';
	echo anchor('back_end','Back End','class="button"');
	echo anchor('front_end','Front End','class="button"');
	echo '</div>';