<?php
class Alterexecutors extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function get_by_id(){
		$params = $this->input->post();
		$obj = new Alterexecutor();
		$obj->where('id',$params['id'])->get();
		echo '{"milikpadinet":"'.$obj->milikpadinet.'","tipe":"'.$obj->tipe.'","macboard":"'.$obj->macboard.'","ip_public":"'.$obj->ip_public.'","ip_private":"'.$obj->ip_private.'","user":"'.$obj->user.'","password":"'.$obj->password.'","location":"'.$obj->location.'"}';
		
	}
	
	function get_obj_by_id(){
		$id = $this->uri->segment(3);
		$objs = new Alterexecutor();
		$objs->where('id',$id)->get();
		$arr = array();
		$fields = $this->db->list_fields('site_routers');
		
		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $objs->$field . '"'); 
		}
		$str = implode(',',$arr);
		echo '{' . $str . '}';
	}
		
	function remove(){
		$params = $this->input->post();
		$obj = new Alterexecutor();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
	}

	function update(){
		$params = $this->input->post();
		echo Alterexecutor::edit($params);
	}
}
