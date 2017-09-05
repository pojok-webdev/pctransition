<?php
class Install_installer extends DataMapper{
	var $has_one = array('install_site');
	function __construct(){
		parent::__construct();
	}
	function add($officer_name,$site_id){
		$obj = new Install_installer();
		$obj->install_site_id = $site_id;
		$obj->name = $officer_name;
		$obj->save();
		return $this->db->insert_id();
	}
	function remove($officer_name,$site_id){
		$obj = new Install_installer();
		$obj->where('install_site_id',$site_id)->where('name',$officer_name)->get();
		$obj->delete();
		return $obj->check_last_query();
	}
	function get_combo_data(){
		$inst = new Install_installer();
		$inst->get();
		$out = array();
		foreach ($inst as $ins){
			$out[$ins->id] = $ins->name;
		}
		return $out;
	}
	function save_installer($install_id,$installer_name){
		$inst = new Install_installer();
		$inst->install_site_id = $install_id;
		$inst->name = User::faceget_name_by_id($installer_name);
		$inst->user_name = $this->session->userdata['username'];
		$inst->save();
	}
	function get_ts_aray_by_installer_id($id){
		$inst = new Install_installer();
		$inst->where('install_site_id',$id)->get();
		$out = array();
		foreach ($inst as $ins){
			array_push($out,array('id'=>User::get_id_by_user($ins->name),'name'=>$ins->name));
		}
		return $out;
	}
	function get_tses_by_install_site($site_id){
		$installers = new Install_installer();
		$installers->where('install_site_id',$site_id)->get();
		return $installers;
	}
	function remove_installer($array){
		$query = 'delete from install_installers where id in (' . $array . ')';
		$result = $this->db->query($query);
	}
}
