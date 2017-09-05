<?php
class Btstower extends DataMapper{
//	var $table = 'btses';
	var $has_many = array('ap','survey_bts_distance','core','ptp');
	var $has_one = array();
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Btstower();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function edit($params){
		$obj = new Btstower();
		return $obj->where('id',$params['id'])->update($params);
	}
	
	function get_btses(){
		$btses = new Btstower();
		$btses->order_by('name','asc')->get();
		return $btses;
	}
	
	function get_combo_data($first_row = '',$branch_id = null){
		$btses = new Btstower();
		$out = array();
		if($first_row!=''){
			$out[0] = $first_row;
		}
		if(is_null($branch_id)){
			$btses->order_by('name','asc')->get();
		}else{
			$btses->where('branch_id',$branch_id)->order_by('name','asc')->get();
		}
		foreach ($btses as $bts){
			$out[$bts->id] = $bts->name;
		}
		return $out;
	}
	
	function populate(){
		$obj = new Btstower();
		$obj->order_by('name','asc')->where("active","1")->get();
		return $obj;
	}
}
