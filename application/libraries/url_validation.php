<?php
class Url_validation {
	var $obj ;
	var $arr;
	var $arr2;
	var $common_report1;
	var $common_report2;
	function __construct(){
		$this->obj = & get_instance();
		$this->arr = array('perpage'=>'','search'=>'','order'=>'','orderby'=>'','page'=>'');
		$this->arr2 = array('perpage','search','order','orderby','page');
		$this->common_report1 = array('date1'=>'','date2'=>'','service'=>'','telemarketer'=>'','city'=>'','status'=>'');
		$this->common_report2 = array('date1','date2','service','telemarketer','city','status');
	}
	function is_validated(){
		$url = $this->obj->uri->uri_to_assoc();
		$keys = array_keys($url);
		$output = array_intersect_key($this->arr, $url);
		if(array_keys($output)==$this->arr2){
			return true;
		}else{
			return false;
		}
	}
	function is_validated_common_report(){
		$url = $this->obj->uri->uri_to_assoc();
		$keys = array_keys($url);
		$output = array_intersect_key($this->common_report1, $url);
		if(array_keys($output)==$this->common_report2){
			return true;
		}else{
			return false;
		}
	}
	function validate(){
		redirect('back_office/index');
	}
}