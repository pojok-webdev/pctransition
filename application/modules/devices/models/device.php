<?php
class Device extends CI_Model{
	var $has_one = array('devicetype');
	var $has_many = array('survey_device','surveypackagedetail');
	var $ci;
	function __construct(){
		parent::__construct();
		$this->ci = & get_instance();
	}
	function add($params){
		$keys = array();
		$vals = array();
		$sql = "";
		foreach($params as $key => $val ){
			array_push($keys,$key);
			array_push($vals,$val);
		}
		$keystring = "('" . implode("','",$keys) . "')";
		$valstring = "('" . implode("','",$vals) . "')";
		$sql = "insert into devices ";
		$sql.= " " . $keystring . " " ;
		$sql.= " values " ;
		$sql.= " " . $valstring . " " ;
		$que = $this->ci->db->query($sql);
		return $this->ci->db->insert_id();
	}
	function edit($params){
		$arr = array();
		foreach($params as $key=>$val){
			array_push($arr,"".$key."='".$val."'");
		}
		$sql = "update devices ";
		$sql.= "set " . implode(",",$arr) . "";
		$sql.= "where ";
		$sql.= "id='".$params["id"]."'";
		$ci = & get_instance();
		$ci->db->query($sql);
	}
	function populate($active='1'){
		$sql = "select * from devicetypes ";
		if(!empty($active)){
			$sql.= "where active='".$active."' ";
		}
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
	function get_combo_data($first_data="Pilihlah",$devicetype = null){
		$ci = & get_instance();
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$sql = "select * from devices ";
		$sql.= "where active='1' ";
		if($devicetype!=null){
			$sql.="and devicetype='".$devicetype."' ";
		}
		$sql.= "order by name asc ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		foreach ($res as $client){
			$out[$client->id] = $client->name;
		}
		return $out;
	}
	function remove($id){
		$sql = "delete from devices ";
		$sql.= "where id=".$id;
		$ci = & get_instance();
		$ci->db->query($sql);
		return $sql;
	}
	function get_combo_data_device($deviceid,$first_data=''){
		$ci = & get_instance();
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$sql = "select * from devices ";
		$sql.= "where active='1' ";
		$sql.= "and devicetypeid=".$deviceid." ";
		if($devicetype!=null){
			$sql.="and devicetype='".$devicetype."' ";
		}
		$sql.= "order by name asc ";
		$que = $ci->db->query($sql);
		$res = $que->result();
		foreach ($res as $client){
			$out[$client->id] = $client->name;
		}
		return $out;
	}
}
