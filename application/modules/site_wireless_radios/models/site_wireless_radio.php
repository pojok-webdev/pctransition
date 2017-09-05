<?php
class Site_wireless_radio extends DataMapper{
	var $has_one = array('client_site');
	function __construct(){
		parent::__construct();
	}
	
	function add($params){
		$obj = new Site_wireless_radio();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function edit($params){
		$obj = new Site_wireless_radio();
		$out='';
		/*foreach($params as $key=>$val){
			$out.=$key . ' => ' . $val . '<br />';
		}*/
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
		//return $out;
	}
	
	function remove($id){
		$obj = new Site_wireless_radio();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	
	function populate(){
		$obj = new Site_wireless_radio();
		$obj->get();
		return $obj;
	}
}
