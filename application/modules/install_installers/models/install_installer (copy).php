<?php
class Install_installer extends DataMapper{
	var $has_one = array('install_request');
	function __construct(){
		parent::__construct();
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
		$inst->install_request_id = $install_id;
		$inst->name = User::get_name_by_id($installer_name);
		$inst->user_name = $this->session->userdata['username'];
		$inst->save();
	}
	
	function get_ts_aray_by_installer_id($id){
		$inst = new Install_installer();
		$inst->where('install_request_id',$id)->get();
		$out = array();
		foreach ($inst as $ins){
			array_push($out,array('id'=>User::get_id_by_user($ins->name),'name'=>$ins->name));
		}
		return $out;
	}
	
	function get_tses_by_install_request($install_id){
		$installers = new Install_installer();
		$installers->where('install_request_id',$install_id)->get();
		return $installers;
	}
	
	function remove_installer($array){
		$query = 'delete from install_installers where id in (' . $array . ')';
		$result = $this->db->query($query);
	}
}