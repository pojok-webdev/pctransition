<?php
	class Install_resume extends DataMapper{
		var $has_one = array('install_site');
		function __construct(){
			 parent::__construct();
		 }
	}
?>
