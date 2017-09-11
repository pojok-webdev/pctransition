<?php
class Client extends CI_Model{
	var $ci;
	var $id;
/*	var $has_many = array(
	'install_request',
	'survey_request'=>array('join_other_as'=>'client'),
	'client_site','survey_client_distance',
	'maintenance_request',
	'neighbour'=>array('class'=>'client','other_field'=>'client'),
	'client'=>array('class'=>'client','other_field'=>'neighbour'),
	'pic','ticket'
	//'troubleshoot_request'
	);

	var $has_one = array(
	'db_pelanggan_client','user',
	'sale'=>array('class'=>'user','join_self_as'=>'client','join_other_as'=>'sale','other_field'=>'client'),
	'survey_site','service',"disconnection"
	);
*/
	function __construct($id = null){
		parent::__construct();
		$this->ci = & get_instance();
		$this->id = $id;
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
		$sql = "insert into clients ";
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
		$str = implode(",",$arr);
		$sql = "update clients set ".$str." ";
		$sql.= "where id='".$params["id"]."'";
		$this->ci->db->query($sql);
		return $sql;
	}
	function get(){
		$sql = "select a.*,b.username from clients a ";
		$sql.= "left outer join users b on b.id=a.sale_id ";
		$sql.= "where a.id='".$this->id."' ";
		$que = $this->ci->db->query($sql);
		return $que->result();		
	}
	function get_clients(){
		$sql = "select * from clients ";
		$sql.= "where active='1' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_clients_total(){
		$sql = "select count(id) total from clients ";
		$sql.= "where active='1' ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res[0]->total;
	}
	function get_combo_data($first_data='',$status=array('9'),$active=array('1'),$user=null){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$sql = "select * from clients ";
		$sql.= "where active='1' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		foreach ($res as $client){
			$out[$client->id] = $client->name;
		}
		return $out;
	}
	function get_combo_data_address($first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$sql = "select * from clients ";
		$sql.= "where active='1' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		foreach ($que->result() as $client){
			$out[$client->id] = $client->name . ', ' . $client->address;
		}
		return $out;
	}
	function get_combo_data_sites($clientid,$first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$sql = "select * from client_sites ";
		$sql.= "where active='1' ";
		$sql.= "and client_id='".$clientid."' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		foreach ($$que->result() as $client){
			$out[$client->id] = $client->address;
		}
		return $out;
	}
	function get_obj_by_id(){
		$ci = & get_instance();
		$sql = "select a.*,b.username from clients a ";
		$sql.= "left outer join users b on b.id=a.sale_id ";
		$sql.= "where a.active='1' ";
		$sql.= "and a.id='".$this->id."' ";
		$que = $ci->db->query($sql);
		return $que->result()[0];
	}
	function getpics(){
		$ci = & get_instance();
		$sql = "select * from pics ";
		$sql.= "where client_id='".$this->id."' ";
		$que = $ci->db->query($sql);
		return $que->result();
	}
	function getclientsites(){
		$ci = & get_instance();
		$sql = "select * from client_sites ";
		$sql.= "where client_id='".$this->id."' ";
		$que = $ci->db->query($sql);
		return $que->result();
	}
	function populate($status=array('9'),$active=array('1'),$user=null){
		$sql = "select a.* from clients a ";
		$sql.= "left outer join users b on b.id=a.user_id ";
		$sql.= "where active in (".$status.") ";
		$sql.= "and active in (".$active.") ";
		$sql.= "and b.id in (".$user.") ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function populate_array(){
		$out = array();
		$sql = "select * from clients ";
		$sql.= "where active='1' ";
		$sql.= "and id='".$clientid."' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		foreach($que->result() as $obj){
			array_push($out,array($obj->name,$obj->address,$obj->city,$obj->business_field,$obj->phone));
		}
		return $out;
	}
	function populateprospects($param = 'all'){
		switch($param){
			case 'open':
				$sql = "select * from clients a left outer join survey_requests b on a.id=b.client_id  ";
				$sql.= "where a.status in ('1','2','3','4','5','6','7','8','9','p') ";
				$sql.= "and survey_request_id is null ";
			break;
			case 'closed':
				$sql = "select * from clients a ";
				$sql.= "left outer join survey_requests b on b.client_id=a.id ";
				$sql.= "where a.status in ('1','2','3','4','5','6','7','8','9','p') and b.id is not null ";
			break;
			case 'all':
				$sql = "select * from clients ";
				$sql.= "where status in ('1','2','3','4','5','6','7','8','9','p') ";
			break;
		}
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function populateClientSurvey($param = 'all',$user = NULL){
		$thisuser = implode(",",$user);
		switch($param){
			case 'open':
				$sql = "select distinct a.id,a.name,a.status,a.business_field,a.address,a.city,c.username,c.id userid ";
				$sql.= "from clients a ";
				$sql.= "left outer join survey_requests b on b.client_id =a.id ";
				$sql.= "left outer join users c on c.id=a.sale_id  ";
				$sql.= "where status in ('1','2','3','4','5','6','7','8','9','p') ";
				$sql.= "and b.id = null and c.id in (".$thisuser.")";
			break;
			case 'closed':
				$sql = "select * from clients a ";
				$sql.= "left outer join survey_requests b on b.client_id=a.id ";
				$sql.= "where a.status in ('1','2','3','4','5','6','7','8','9','p') ";
				$sql.= "and a.active='0' and b.id is not null ";
			break;
			case 'all':
				$sql = "select distinct a.id,a.name,a.status,a.business_field,a.address,a.city,c.username,c.id userid ";
				$sql.= "from clients a ";
				$sql.= "left outer join survey_requests b on b.client_id =a.id ";
				$sql.= "left outer join users c on c.id=a.sale_id  ";
				$sql.= "where a.status in ('1','2','3','4','5','6','7','8','9','p') ";
				$sql.= "and c.id in (".$thisuser.")";
			break;
		}
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
	function hactivedate(){
		$sql = "select id,activedate,period1,date_format(activedate,'%d/%c/%Y') hactivedate from clients ";
		$sql.= "where id =".$this->id;
		$que = $this->ci->db->query($sql);
		$result = $que->result()[0];
		return $result->hactivedate;
	}
	function hperiod1(){
		$sql = 'select id,activedate,period1,date_format(period1,"%d/%c/%Y") hperiod1 from clients where id ='.$this->id;
		$que = $this->ci->db->query($sql);
		$res = $que->result()[0];
		return $res->hperiod1;
	}
	function hperiod2(){
		$sql = 'select id,activedate,period1,date_format(period2,"%d/%c/%Y") hperiod2 from clients where id ='.$this->id;
		$que = $this->ci->db->query($sql);
		$res = $que->result()[0];
		return $res->hperiod2;
	}
}
