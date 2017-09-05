<?php
class Install_wireless_radios extends CI_Controller{
	var $setting;
	var $preference;
	var $user_info;
	var $alertcount;
	var $mpath;
	function  __construct(){
		parent::__construct();
		Common::get_preferences();
		$this->setting = Common::get_web_settings();
		$this->lang->load('padi',$this->setting['language']);
		$this->mpath = base_url() . 'index.php/install_wireless_radios/';
	}
	function add(){
		$params = $this->input->post();
		echo Install_wireless_radio::add_wr($params);
	}
	function edit(){
		$params = $this->input->post();
		$obj = new Install_wireless_radio();
		echo $obj->where('id',$params['id'])->update($params);
	}
	function getjsonwirelessradio(){
		$id = $this->uri->segment(3);
		$obj = new Install_wireless_radio();
		$obj->where('id',$id)->get();
		$arr = array();
		foreach($this->db->list_fields('install_wireless_radios') as $field){
			array_push($arr,'"'.$field.'" : "'.$obj->$field.'"');
		}
		echo '{'.implode(",",$arr).'}';
	}
	function remove(){
		$params = $this->input->post();
		echo Install_wireless_radio::remove_rw($params["id"]);
	}
}
