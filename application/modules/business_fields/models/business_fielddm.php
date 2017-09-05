<?php
class Business_field extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function get_fields(){
		$fields = new Business_field();
		$fields->where('active','1')->order_by('name','asc')->get();
		return $fields;
	}
	
	function get_fields_total(){
		$field = new Business_field();
		return $field->result_count();
	}
	
	function get_combo_data($first_row = ''){
		$fields = new Business_field();
		$fields->where('active','1')->order_by('createdate','asc')->get();
		$out = array();
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach($fields as $field){
			$out[$field->name] = $field->name;
		}
		return $out;
	}
}
