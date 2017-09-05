<?php
class App_setting extends CI_Model{
	public $ci;
	function __construct(){
		parent::__construct();
		$ci = & get_instance();
	}
}