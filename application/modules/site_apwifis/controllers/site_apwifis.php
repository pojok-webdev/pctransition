<?php
class Site_apwifis extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('sites');
	}
	function get_by_id(){
		$id = $this->uri->segment(3);
		$objs = new Site_apwifi();
		$objs->where('id',$id)->get();
		$arr = array();
		$fields = $this->db->list_fields('site_apwifis');
		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $objs->$field . '"'); 
		}
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
	function post_by_id(){
		$params = $this->input->post();
		$id = $params['id'];
		$objs = new Site_apwifi();
		$objs->where('id',$id)->get();
		$arr = array();
		$fields = $this->db->list_fields('site_apwifis');
		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $objs->$field . '"'); 
		}
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
	function remove(){
		$params = $this->input->post();
		echo Site_apwifi::remove($params['id']);
	}	
	function update(){
		$params = $this->input->post();
		echo Site_apwifi::edit($params);
	}
	function get_by_site_id(){
		$params = $this->input->post();
		echo sitehlp_getjson('Site_apwifi','site_apwifis','client_site_id',$params['client_site_id'],$params['ioflag']);
	}	
}
