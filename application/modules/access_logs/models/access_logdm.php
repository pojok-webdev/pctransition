<?php
class Access_log extends DataMapper{
	var $obj;
	function __construct(){
		parent::__construct();
		$this->obj = & get_instance();
	}
	
	function insert_log($action){
		$access_log = new Access_log();
		$access_log->user_name = $this->obj->session->userdata['username'];
		$access_log->action = $action;
		$access_log->ipaddr = $_SERVER["REMOTE_ADDR"];
		$access_log->save();
	}
	
	function get_last_login_by_username($user_name){
		$access_log = new Access_log();
		$access_log->where('user_name',$user_name)->order_by('create_date','desc')->get(1,1);
		return $access_log->create_date;
	}
}