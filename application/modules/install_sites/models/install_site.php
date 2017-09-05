<?php
class Install_site extends DataMapper{
	var $has_one = array('install_request','client_site');
	var $has_many = array('install_router','install_ap_wifi','install_wireless_radio','install_image','install_ba','install_installer','install_pccard','install_antenna','install_material','install_switch','install_resume');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Install_site();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	function get_obj_by_id($id){
		$obj = new Install_site();
		$obj->where('id',$id)->get();
		return $obj;
	}
	function get_obj_by_install_id($install_id){
		$obj = new Install_site();
		$obj->where('id',$install_id)->get();
		return $obj;
	}
	function populate($params = 'all'){
		$objs = new Install_site();
		if($params == 'all'){
			$objs->get();
		}else{
			$objs->where('status',$params)->get();
		}
		return $objs;
	}
	function remove_site($id){
		$obj = new Install_site();
		$obj->where('id',$id)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	function update_site($params){
		$obj = new Install_site();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
}
 
