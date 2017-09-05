<?php
class Alert extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Alert();
		foreach($params as $key => $val ){
			$obj->$key = $val;
		}
		$obj->save();
		return mysql_insert_id();
	}
	
	function populate($user){
		$obj = new Alert();
		$obj->where('status','1')->where('targetuser',$user)->get();
		return $obj;
	}
	
	function deactivealert($params){
		$obj = new Alert();
		$obj->where('id',$params['id'])->update('status','0');
		return 'ok';
	}
}
