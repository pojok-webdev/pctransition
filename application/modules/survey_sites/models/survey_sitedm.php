<?php
class Survey_site extends DataMapper{
	//var $has_one = array('survey_request','client_site');
	var $has_one = array('survey_request','client_site','branch');
	var $has_many = array('survey_image','survey_material','survey_device','survey_bts_distance','survey_site_distance','survey_resume','survey_ba');
	function __construct(){
		parent::__construct();
	}
	
	function get_survey_sites($survey_id){
		$objs = new Survey_site();
		$objs->where('active','1')->where('survey_request_id',$survey_id)->order_by('create_date','asc')->get();
		return $objs;
	}
	function get_images($site_id){
		$objs = new Survey_image();
		$objs->where('survey_site_id',$site_id)->get();
		$arr = array();
		for($c=0;$c<ceil($objs->result_count()/2);$c++){
			$myimages = new Survey_image();
			$myimages->where('survey_site_id',$site_id)->get(2,$c*2);
			$myarr = array();
			foreach ($myimages as $image){
				array_push($myarr, $image);
			}
			array_push($arr, $myarr);
		}
		return $arr;
	}
	function get_distance_report($site_id){
		$objs = new Survey_bts_distance();
		$objs->where('survey_site_id',$site_id)->get();
		return $objs;
	}
	
	function get_client_distance($site_id){
		$objs = new Survey_client_distance();
		$objs->where('site_id',$site_id)->get();
		return $objs;
	}
	
	function get_material_report($site_id){
		$objs = new Survey_material();
		$objs->where('survey_site_id',$site_id)->get();
		return $objs;
	}
	
	function get_device_report($site_id){
		$objs = new Survey_device();
		$objs->where('survey_site_id',$site_id)->get();
		return $objs;
	}
	
	function get_obj_by_id($id){
		$obj = new Survey_site();
		$obj->where('id',$id)->get();
		return $obj;
	}
	
	function get_other_sites($id){
		$objs = new Survey_site();
		$objs->where_related('survey_request/survey_site','id !=',$id)->get();
		$out = array();
		foreach($objs as $obj){
			$out[$obj->id] = $obj->address;
		}
		return $out;
	}
	
	function populate($active='1',$user_id=null){
		$obj = new Survey_site();

		if(is_null($user_id)){
			$obj->where('active',$active)->get();
		}
		else{
			$obj->include_related("client_site/client/user","username");
			$obj->include_related("client_site/client","name");
			$obj->include_related("survey_request","create_date");
			$obj->include_related("survey_request","resume");
			$obj->include_related("survey_request","id");
			$obj->where('active',$active)->where_in_related('client_site','sale_id',$user_id)->where_related("client_site/client","hide","0")->get();
		}
		//echo $obj->check_last_query();
		return $obj;
	}
	
	function saveimage($params){
		$obj = new Survey_image();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function add($params){
		$obj = new Survey_site();
		foreach($params as $key=>$val){
			$obj->$key =  $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	
	function site_update($params){
		$obj = new Survey_site();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
}
