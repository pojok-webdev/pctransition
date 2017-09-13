<?php
class Survey_site extends CI_Model{
	//var $has_one = array('survey_request','client_site');
	var $has_one = array('survey_request','client_site','branch');
	var $has_many = array('survey_image','survey_material','survey_device','survey_bts_distance','survey_site_distance','survey_resume','survey_ba');
	var $ci;
	var $id;
	function __construct($id = null){
		parent::__construct();
		$this->ci = & get_instance();
		$this->id = $id;
	}	
	function get_survey_sites($survey_id){
		$sql = "select * from survey_sites where survey_request_id=".$survey_id." ";
		$sql.= "where active='1' ";
		$sql.= "order by create_date asc ";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_images($site_id){
		$sql = "select * from survey_images ";
		$sql.= "where survey_site_id=".$site_id." ";
		$que = $this->ci->db->query($sql);

		$objs = new Survey_image();
		$objs->where('survey_site_id',$site_id)->get();
		$arr = array();
		for($c=0;$c<ceil($que->num_rows()/2);$c++){
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
	function get_survey_site_by_id(){
		$sql = "select * from survey_sites ";
		$sql.= "where survey_id=".$this->id;
		$que = $this->ci->db->query($sql);
		return $que->result();
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
//			$obj->where('active',$active)->get();
			$sql = "select * from survey_sites ";
			$sql.= "where active='1' ";
		}
		else{
			$sql = "select * from survey_sites a ";
			$sql.= "left outer join client_sites b on b.id=a.survey_site_id ";
			$sql.= "where active='1' ";
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
