<?php
class Fbs extends CI_Controller{
	var $ionuser;
	function __construct(){
		parent::__construct();
		if ($this->ion_auth->logged_in()) {
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
	}
	function index(){
		$data = array('menuFeed'=>'Fbs');
		$this->load->view('Sales/fbs/fbs',$data);
	}
	function get(){
		$arr = array();$arr2 = array();
		$objs = new Fb();
		$objs->get();
		$fields = $this->db->list_fields('fbs');
		foreach($objs as $obj){			
			foreach($fields as $field){
				array_push($arr, '"' . $field . '":"' . $obj->$field . '"'); 
			}
			$str = implode(',',$arr);
			array_push($arr2,'{'.$str.'}');
		}
		$str2 = implode(',',$arr2);
		echo '{"obj":['.$str2.']}';
	}
	function isexist($client_site_id){
		$obj = new Fb();
		$obj->where('completed','0')->where('client_site_id',$client_site_id)->get();
		if($obj->result_count()>0){
			return true;
		}
		return false;
	}
	function saveupdate(){
		$params = $this->input->post();
		$keys = array();$vals = array();$pair = array();
		foreach($params as $key=>$val){
			array_push($keys,$key);
			array_push($vals,$val);
			array_push($pair,"".$key." = '".$val."'");
		}
		$sql = "insert into fbs ";
		$sql.= "(".implode(",",$keys).")";
		$sql.= "values ";
		$sql.= "('".implode("','",$vals)."')";
		$sql.= "on duplicate key update ".implode(",",$pair);
		$this->db->query($sql);
		echo $sql;		
	}
	function save($params){
		$obj = new Fb();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}
	function update($params){
		$obj = new Fb();
		//$obj->where('client_id',$params['client_id'])->where('id',$params['id'])->update($params);
		$obj->where('id',$params['id'])->update($params);
		echo $obj->check_last_query();
	}
}

