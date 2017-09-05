<?php
class App_log extends DataMapper{
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function create_log($description){
		$obj = new App_log();
		$obj->user = $this->session->userdata['username'];
		$obj->description = $description;
		$obj->ipaddr = $_SERVER["REMOTE_ADDR"];
		$obj->save();
	}
	
	function get_lastvisit($username){
		$obj = new App_log();
		$obj->where('user',$username)->order_by('createdate','desc')->get(1,1);
		return $obj->createdate;
	}
}
