<?php
class Pics extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function remove(){
		$params = $this->input->post();
		$obj = new Pic();
		$obj->where('id',$params['id'])->get();
		$obj->delete();
		echo $obj->check_last_query();
	}
	function save(){
		$params = $this->input->post();
		$obj = new Pic();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		echo $this->db->insert_id();
	}
	function saveupdate(){
		$params = $this->input->post();
		$obj = new Pic();
		$obj->where('client_id',$params['client_id'])->where('prole',$params['prole'])->get();
		if($obj->result_count()>0){
			$this->update_();
		}else{
			$this->save();
		}
	}
	function getbyid(){
		$params = $this->input->post();
		$obj = new Pic();
		$obj->where('id',$params['id'])->get();
		echo '{"id":"'.$obj->id.'","client_id":"'.$obj->client_id.'","name":"'.$obj->name.'","phone_area":"'.$obj->phone_area.'","telp_hp":"'.$obj->telp_hp.'","position":"'.$obj->position.'","hp":"'.$obj->hp.'","hp2":"'.$obj->hp2.'","email":"'.$obj->email.'","address":"'.$obj->address.'","ktp":"'.$obj->ktp.'"}';
	}
	function getbyclientid(){
		$params = $this->input->post();
		$objs = new Pic();
		$objs->where('client_id',$params['client_id'])->get();
		$arr = array();
		$rolenum = 1;
		foreach($objs as $obj){
			switch($obj->prole){
				case 'PEMOHON':
				$rolenum = '1';
				break;
				case 'PENANGGUNG JAWAB':
				$rolenum = '2';
				break;
				case 'ADMINISTRASI':
				$rolenum = '3';
				break;
				case 'TEKNIS & INSTALASI':
				$rolenum = '4';
				break;
				case 'PENAGIHAN':
				$rolenum = '5';
				break;
				case 'SUPPORT':
				$rolenum = '6';
				break;
			}
			array_push($arr,'{"id":"'.$obj->id.'","client_id":"'.$obj->client_id.'","name":"'.$obj->name.'","phone_area":"'.$obj->phone_area.'","telp_hp":"'.$obj->telp_hp.'","position":"'.$obj->position.'","hp":"'.$obj->hp.'","hp2":"'.$obj->hp2.'","email":"'.$obj->email.'","address":"'.$obj->address.'","ktp":"'.$obj->ktp.'","prole":"'.$obj->prole.'","rolenum":"'.$rolenum.'"}');
		}
		echo '{"x":['.implode(',',$arr).']}';
	}
	function update(){
		$params = $this->input->post();
		$obj = new Pic();
		$obj->where("id",$params["id"])->update($params);
		echo $obj->check_last_query();
	}
	function update_(){
		$params = $this->input->post();
		$obj = new Pic();
		$obj->where("client_id",$params["client_id"])->where("prole",$params["prole"])->update($params);
		echo $obj->check_last_query();
	}
}
