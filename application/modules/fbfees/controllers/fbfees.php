<?php
class Fbfees extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function getfees(){
		$params = $this->input->post();
		$id = $this->uri->segment(3);
		$objs = new Fbfee();
		/*switch($params['feetype']){
			case 'other':
				$objs->where('client_site_id',$params['client_site_id'])->where_not_in('name',array('setup'))->get();			
			break;
			case 'setup':
				$objs->where('client_site_id',$params['client_site_id'])->get();
			break;
		}*/
		$objs->where('client_id',$params['client_id'])->get();
		$arr = array();
		foreach($objs as $obj){
			array_push($arr, '"'.$obj->name.'":{"dpp":"'.$obj->dpp.'","ppn":"'.$obj->ppn.'"}');
		}
		echo '{'.implode(',',$arr).'}';
	}
	function saveupdate(){
		$params = $this->input->post();
		/*
		$obj = new Fbfee();
		$obj->where('client_id',$params['client_id'])->where('name',$params['name'])->get();
		if($obj->result_count()>0){
			echo $this->update($params);
		}else{
			echo $this->save($params);
		}*/
		$sql = "insert into fbfees (client_id,name,dpp,ppn) values (".$params['client_id'].",'".$params['name']."',".$params['dpp'].",".$params['ppn'].") ";

		$sql.= "on duplicate key update  dpp=".$params['dpp'].",ppn=".$params['ppn']."";
		$this->db->query($sql);
		echo $sql;
	}
	function save($params){
		$obj = new Fbfee();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function update($params){
		$obj = new Fbfee();
		//$obj->where('fb_id',$params['fb_id'])->update($params);
		$obj->where('client_id',$params['client_id'])->where('name',$params['name'])->update($params);
		echo $obj->check_last_query();
	}
}
