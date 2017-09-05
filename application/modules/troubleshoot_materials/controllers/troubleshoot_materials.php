<?php
class Troubleshoot_materials extends CI_Controller{
	function save(){
		$params = $this->input->post();
		$obj = new Troubleshoot_material();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function delete(){
		$params = $this->input->post();
		$obj = new Troubleshoot_material();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
}
