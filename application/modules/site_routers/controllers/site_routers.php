<?php
class Site_routers extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('sites');
	}
	function get_by_id(){
		$params = $this->input->post();
		$obj = new Site_router();
		$obj->where('id',$params['id'])->get();
		$fields = $this->db->list_fields('site_routers');
		$arr = array();
		foreach($fields as $field){
			array_push($arr,'"'.$field.'":"'.$obj->$field.'"');
		}
		echo '{'.implode(',',$arr).'}';
		//echo '{"milikpadinet":"'.$obj->milikpadinet.'","tipe":"'.$obj->tipe.'","macboard":"'.$obj->macboard.'","ip_public":"'.$obj->ip_public.'","ip_private":"'.$obj->ip_private.'","user":"'.$obj->user.'","password":"'.$obj->password.'","location":"'.$obj->location.'"}';
	}
	function get_obj_by_id(){
		$id = $this->uri->segment(3);
		$objs = new Site_router();
		$objs->where('id',$id)->get();
		$arr = array();
		$fields = $this->db->list_fields('site_routers');

		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $objs->$field . '"');
		}
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
	function get_by_site_id(){
		$params = $this->input->post();
		echo sitehlp_getjson('Site_router','site_routers','client_site_id',$params['client_site_id'],$params['ioflag']);
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Site_router();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}
	function update(){
		$params = $this->input->post();
		echo Site_router::edit($params);
	}
}
