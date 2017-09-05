<?php
class Survey_resumes extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function get(){
		$id = $this->uri->segment(3);
		$obj = new Survey_resume();
		$obj->where('id',$id)->get();
		echo '{"id":"'.$obj->id.'","survey_site_id":"'.$obj->survey_site_id.'","name":"'.$obj->name.'"}';
	}
	
	function update(){
		$params = $this->input->post();
		$obj = new Survey_resume();
		$obj->where('id',$params['id'])->update($params);
	}
}
