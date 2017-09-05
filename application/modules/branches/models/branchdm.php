<?php
class Branch extends DataMapper{
	/*var $has_many = array(
	'user',
	'branch_preference',
	'client_site',
	'backbone','survey_site');
	*/
	public $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function get_branches(){
		$branches = new Branch();
		$branches->get();
		$out = array();
		foreach ($branches as $branch){
			$out[$branch->id] = $branch->name;
		}
		return $out;
	}
	
	function get_user_branches($id){
		$user = new User();
		$user->where('id',$id)->get();
		$out = array();
		foreach ($user->branch as $branch){
			$out[$branch->id] = $branch->name;
		}
		return $out;
	}

	function get_combo_data(){
		$objs = new Branch();
		$objs->get();
		$out = array();
		foreach($objs as $obj){
			$out[$obj->id] = $obj->name;
		}
		return $out;
	}

	function populate(){
		$obj = new Branch();
		$obj->get();
		return $obj;
	}
}
