<?php
class Survey_bts_distances extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function addbtsdistance(){
		$params = $this->input->post();
		echo Survey_bts_distance::survey_bts_add($params);
	}

	function edit(){
		$params = $this->input->post();
		echo Survey_bts_distance::edit($params);
	}
	
	function get(){
		$id = $this->uri->segment(3);
		$obj = new Survey_bts_distance();
		$obj->where('id',$id)->get();
		echo '{"id":"'.$obj->id.'","btstower_id":"'.$obj->btstower_id.'","distance":"'.$obj->distance.'","los":"'.$obj->los.'","ap":"'.$obj->ap.'","obstacle":"'.$obj->obstacle.'","description":"'.$obj->description.'"}';
	}
}
