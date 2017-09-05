<?php
class Alterexecutor extends DataMapper{
	var $has_one = array('altergrade');
	function __construct(){
		parent::__construct();
	}
	
	function get_names_by_altergrade_id($altergrade_id){
		$objs = new Alterexecutor();
		$objs->where('altergrade_id',$altergrade_id)->get();
		$out = '';
		foreach ($objs as $obj){
			$out .= $obj->name . ' - ';
		}
		return substr($out, 0,strlen($out)-2);
	}
	
	function add($params){
		$obj = new Alterexecutor();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
		//return mysql_insert_id();
	}
	
	function edit($params){
		$obj = new Alterexecutor();
		$obj->where('id',$params['id'])->update($params);
//		return $obj->check_last_query();
		return $params['id'];
	}
	
	function remove($params){
		$obj = new Alterexecutor();
		$obj->where('id',$params)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
