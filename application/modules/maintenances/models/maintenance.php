<?php
class Maintenance extends DataMapper{
	var $has_one = array('client_site');
	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Maintenance();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}

	function edit($params){
		$obj = new Maintenance();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}

	function getmaintenancename($type,$mtype){
		switch($type){
			case 'backbone':
			$obj = new Backbone();
			$obj->where('id',$mtype)->get();
			return $obj;
			break;
			case 'bts':
			$obj = new Btstower();
			$obj->where('id',$mtype)->get();
			return $obj;
			break;
			case 'datacenter':
			$obj = new Datacenter();
			$obj->where('id',$mtype)->get();
			return $obj;
			break;
		}
	}
	function get_combo_data(){
		$sql = "select a.id,client_site_id,nameofmtype,maintenance_type,c.name from maintenances a left outer join client_sites b on b.id=a.client_site_id  ";
		$sql.= "left outer join clients c on c.id=b.client_id ";
		$sql.= "where maintenance_type='pelanggan' ";
		$sql.= "union ";
		$sql.= "select a.id,client_site_id,nameofmtype,maintenance_type,b.name from maintenances a left outer join backbones b on b.id=a.backbone_id where maintenance_type='backbone' ";
		$sql.= "union ";
		$sql.= "select a.id,client_site_id,nameofmtype,maintenance_type,b.name from maintenances a left outer join btstowers b on b.id=a.bts_id where maintenance_type='bts' ";
		$sql.= "union ";
		$sql.= "select a.id,client_site_id,nameofmtype,maintenance_type,b.name from maintenances a left outer join datacenters b on b.id=a.datacenter_id where maintenance_type='datacenter' ";
		$ci = & get_instance();
		$q = $ci->db->query($sql);
		//echo $sql;
		$arr = array();
		foreach($q->result() as $res){
//			array_push($arr,$res->name);
			$arr[$res->id] = $res->name;
		}
		return $arr;
	}
	function get_obj_by_id($id){
		$obj = new Maintenance();
		$obj->where('id',$id)->get();
		return $obj;
	}
	function populate(){
		$obj = new Maintenance();
		$obj->get();
		return $obj;
	}
}
