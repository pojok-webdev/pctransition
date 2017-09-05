<?php
class Install_images extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function remove(){
		$params = $this->input->post();
		echo Install_image::remove_image($params['id']);
	}
	function add(){
		$params = $this->input->post();
		$obj = new Install_image();
		foreach($params as $key => $val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function imageedit(){
		$obj = new Install_image();
		$obj->where('id',$this->uri->segment(3))->get();
		$data = array(
		'obj'=>$obj,
		'saveurl'=>base_url().'install_images/update'
		);
		$this->load->view('imageeditor/index2',$data);		
	}
	function switch_order(){
		$id1 = $this->uri->segment(3);
		$id2 = $this->uri->segment(4);
		$obj = new Install_image();
		$order1 = $obj->select("roworder")->where('id',$id1)->get();
		$roworder1 = $order1->roworder;
		$obj = new Install_image();
		$order2 = $obj->select("roworder")->where('id',$id2)->get();
		$roworder2 = $order2->roworder;
		$obj = new Install_image();
		$obj->where('id',$id1)->update(array('roworder'=>$roworder2));
		$obj = new Install_image();
		$obj->where('id',$id2)->update(array('roworder'=>$roworder1));
		echo $obj->check_last_query();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Install_image();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
