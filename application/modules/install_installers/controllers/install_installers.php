<?php
class Install_installers extends CI_Controller{
	var $setting;
	var $user_info;
	function __construct(){
		parent::__construct();
	}
	function get_installers_by_site(){
		$id = $this->uri->segment(3);
		foreach(Install_installer::get_tses_by_install_site($id) as $installer){
			echo $installer->name . '<br />';
		}
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Install_installer();
		$obj->where("id",$params["id"])->get();
		$obj->delete();
	}
}
