<?php
	echo '<div class="general_form">';
	echo 'This step will restore dump files into tables ...<br />';
	echo form_open('install/handler');
	echo form_hidden('step','restore_dump');
	echo form_submit('Next','next','class="button"');
	echo form_close();
	echo '</div>';