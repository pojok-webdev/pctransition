<?php
class Chat extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
}
