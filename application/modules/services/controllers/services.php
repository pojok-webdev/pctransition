<?php
class Services extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function getJSON(){
		$arr = array();
		$objs = new Service();
		if($this->uri->total_segments()==3){
			$objs->where('id',$this->uri->segment(3))->get();
		}else{
			$objs->get();
		}
		foreach($objs as $obj){
			array_push($arr,'"' . $obj->name . '":"' . $obj->name . '"');
		}
		$out = implode(",",$arr);
		echo '{' . $out . '}';
	}
	function get_total_segment(){
		echo $this->uri->total_segments();
	}
}
