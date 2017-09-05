<?php
class Site_switches extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('sites');
	}
	function get_by_site_id(){
		$params = $this->input->post();
		echo sitehlp_getjson('Site_switch','site_switches','client_site_id',$params['client_site_id'],$params['ioflag']);
	}
	function post_obj_by_id(){
		$params = $this->input->post();
		$id = $params['id'];
		$objs = new Site_switch();
		$objs->where('id',$id)->get();
		$arr = array();
		$fields = $this->db->list_fields('site_switches');
		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $objs->$field . '"');
		}
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
	function update(){
		$params = $this->input->post();
		$obj = new Site_switch();
		$obj->where('id',$params['id'])->update($params);
	}
}
