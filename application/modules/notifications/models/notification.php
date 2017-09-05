<?php
class Notification extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_notifications(){
		$obj = new Notification();
		$obj->where('active','1')->order_by('name','asc')->get();
		return $obj;
	}
	
	function get_clients_total(){
		$obj = new Notification();
		$obj->where('active','1')->get();
		return $obj->result_count();
	}
}