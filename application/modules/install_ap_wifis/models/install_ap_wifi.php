<?php
class Install_ap_wifi extends DataMapper{
	var $has_one = array('install_site');
	function __construct(){
		parent::__construct();
	}
	
	function add_aw($params){
		$obj = new Install_ap_wifi();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function edit($params){
		$obj = new Install_ap_wifi();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	
	function remove_aw($id){
		$obj = new Install_ap_wifi();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
