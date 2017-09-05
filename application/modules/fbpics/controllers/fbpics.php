<?php
class Fbpics extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	/*function save(){
		$params = $this->input->post();
		$obj = new Fbpic();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
	}*/
	function save($params){
		//$params = $this->input->post();
		$obj = new Fbpic();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return 'has been saved!'.$obj->check_last_query();
	}
	function saveupdate(){
		$params = $this->input->post();
		/*$obj = new Fbpic();
		$obj->where('id',$params['id'])->get();
		if($obj->result_count()>0){
			echo $this->update($params);
		}else{
			echo $this->save($params);
		}*/
		$sql = "insert into fbpics (client_id,nofb,name,role,position,idnum,phone,hp,email) ";
		$sql.= "values ";
		$sql.= "(";
		$sql.= $params['client_id'].",'";
		$sql.= $params['nofb']."','";
		$sql.= $params['name']."','";
		$sql.= $params['role']."','";
		$sql.= $params['position']."','";
		$sql.= $params['idnum']."','";
		$sql.= $params['phone']."','";
		$sql.= $params['hp']."','";
		$sql.= $params['email']."'";
		$sql.= ") ";

		$sql.= "on duplicate key update  role='".$params['role']."',name='".$params['name']."',position='".$params['position']."',idnum='".$params['idnum']."',phone='".$params['phone']."',hp='".$params['hp']."',email='".$params['email']."'";
		$this->db->query($sql);
		echo $sql;		
	}
	function update($params){
		$obj = new Fbpic();
		$obj->where('id',$params['id'])->update($params);
		return 'has been updated '.$obj->check_last_query();
	}
}
