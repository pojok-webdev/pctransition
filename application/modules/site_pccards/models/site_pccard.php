<?php
class Site_pccard extends DataMapper{
	var $has_one = array('client_site');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Site_pccard();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function edit($params){
		$obj = new Site_pccard();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	
	function remove($id){
		$obj = new Site_pccard();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	
	function populate(){
		$obj = new Site_pccard();
		$obj->get();
		return $obj;
	}
}
