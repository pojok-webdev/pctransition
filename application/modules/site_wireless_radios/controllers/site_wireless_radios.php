<?php
class Site_wireless_radios extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('sites');
	}
	function get_obj_by_id(){
		$id = $this->uri->segment(3);
		$objs = new Site_wireless_radio();
		$objs->where('id',$id)->get();
		$arr = array();
		$fields = $this->db->list_fields('site_wireless_radios');
		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $objs->$field . '"');
		}
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
	function post_obj_by_id(){
		$params = $this->input->post();
		$id = $params['id'];
		$objs = new Site_wireless_radio();
		$objs->where('id',$id)->get();
		$arr = array();
		$fields = $this->db->list_fields('site_wireless_radios');
		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $objs->$field . '"');
		}
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
	function remove(){
		$params = $this->input->post();
		echo Site_wireless_radio::remove($params['id']);
	}
	function update(){
		$params = $this->input->post();
		echo Site_wireless_radio::edit($params);
	}
	function get_by_site_id(){
		$params = $this->input->post();
		echo sitehlp_getjson('Site_wireless_radio','site_wireless_radios','client_site_id',$params['client_site_id'],$params['ioflag']);
	}
}
