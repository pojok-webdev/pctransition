<?php
class Troubleshoot_images extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function getbyid(){
		$id = $this->uri->segment(3);
		$obj = new Troubleshoot_image();
		$obj->where('id',$id)->get();
		echo '{"img":"'.$obj->img.'","name":"'.$obj->name.'","description":"'.$obj->description.'"}';
	}
	function switch_order(){
		$id1 = $this->uri->segment(3);
		$id2 = $this->uri->segment(4);
		$obj = new Troubleshoot_image();
		$order1 = $obj->select("roworder")->where('id',$id1)->get();
		$roworder1 = $order1->roworder;
		$obj = new Troubleshoot_image();
		$order2 = $obj->select("roworder")->where('id',$id2)->get();
		$roworder2 = $order2->roworder;
		$obj = new Troubleshoot_image();
		$obj->where('id',$id1)->update(array('roworder'=>$roworder2));
		$obj = new Troubleshoot_image();
		$obj->where('id',$id2)->update(array('roworder'=>$roworder1));
		echo $obj->check_last_query();
	}
	function update(){
		$params = $this->input->post();
		$obj = new Troubleshoot_image();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
}
