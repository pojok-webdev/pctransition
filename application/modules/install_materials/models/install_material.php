<?php
class Install_material extends DataMapper{
	var $has_one = array("install_site");
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Install_material();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function remove($id){
		$obj = new Install_material();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
