<?php
class Install_routers extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Install_router();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Install_router();
		$obj->where('id',$params["id"])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}	
	function entry(){
		$uri = $this->uri->uri_to_assoc();
		switch ($uri['type']){
			case 'add':
				$this->load->view('index',$data);
				break;
			case 'edit':
				$this->load->view('index',$data);
				break;
		}
		$this->load->view('index',$data);
	}
	function getjsonrouter(){
		$id = $this->uri->segment(3);
		$obj = new Install_router();
		$obj->where('id',$id)->get();
		echo '{"milikpadinet":"'.$obj->milikpadinet.'","tipe":"'.$obj->tipe.'","macboard":"'.$obj->macboard.'","ip_public":"'.$obj->ip_public.'","ip_private":"'.$obj->ip_private.'","user":"'.$obj->user.'","password":"'.$obj->password.'","location":"'.$obj->location.'","barcode":"'.$obj->barcode.'","serialno":"'.$obj->serialno.'"}';
	}
	function update(){
		$params = $this->input->post();
		$obj = new Install_router();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
