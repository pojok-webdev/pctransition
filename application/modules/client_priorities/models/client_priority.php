<?php
class Client_priority extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function client_exist($client_id){
		$obj = new Client_priority();
		$obj->where('client_id',$client_id)->get();
		if($obj->result_count()>0){
			return true;
		}else{
			return false;
		}
	}
	
	function add($params){
		$obj = new Client_priority();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function drop($params){
		$obj = new Client_priority();
		$obj->where('client_id',$params['client_id'])->get();
		$obj->delete();
	}
}
