<?php
class Install_wireless_radio extends DataMapper{
	var $has_one = array('install_site');
	function __construct(){
		parent::__construct();
	}

	function add_wr($params){
		$obj = new Install_wireless_radio();
		foreach ($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function get_wireless_radios($install_id){
		$radios = new Install_wireless_radio();
		$radios->where('install_request_id',$install_id)->order_by('tipe','asc')->get();
		return $radios;
	}
	
	function remove_radio($array){
		$query = 'delete from install_wireless_radios ';
		$query.= 'where id in (' . $array . ')';
		$result = $this->db->query($query);
	}

	function remove_rw($id){
		$obj = new Install_wireless_radio();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
}
