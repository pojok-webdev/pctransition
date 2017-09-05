<?php
class Client_application extends CI_Model{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
}
