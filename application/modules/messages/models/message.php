<?php
class Message extends DataMapper{
	var $has_many = array('reply'=>array('class'=>'message','other_field'=>'message'));
	var $has_one = array('message'=>array('class'=>'message','other_field'=>'reply'));
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Message();
		foreach($params as $key => $val ){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
	function clear_messages($user){
		$obj = new Message();
		$obj->where('targetuser',$user)->update('status','0');
	}
	function deactivemessage($params){
		$obj = new Message();
		$obj->where('id',$params['id'])->update('status','0');
		return 'ok';
	}
	function get_messages($user){
		$obj = new Message();
		$obj->where('targetuser',$user)->where('status','1')->get();
		return $obj->result_count();
	}
	function get_replies($ts){
		$obj = new Message();
		$obj->where('message_id',$ts)->where('status','1')->get();
		return $obj;
	}
	function populate($user = null){
		$obj = new Message();
		if($user==null){
			return $obj->get();
		}
		return $obj->where('targetuser',$user)->where('status','1')->where('message_id',NULL)->get();
	}
}
