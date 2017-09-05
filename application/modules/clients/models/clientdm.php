<?php
class Client extends DataMapper{

	var $has_many = array(
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

	function __construct(){
		parent::__construct();
	}
	function add($params){
		$obj = new Client();
		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		return $this->db->insert_id();
	}

	function edit($params){
		$obj = new Client();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	function get_clients(){
		$clients = new Client();
		$clients->where('active','1')->order_by('name','asc')->get();
		return $clients;
	}

	function get_clients_total(){
		$client = new Client();
		$client->where('active','1')->get();
		return $client->result_count();
	}

	function get_combo_data($first_data='',$status=array('9'),$active=array('1'),$user=null){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$clients = new Client();
		$clients->where_in('active',$active)->get();
		foreach ($clients as $client){
			$out[$client->id] = $client->name;
		}
		return $out;
	}

	function get_combo_data_address($first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$clients = new Client();
		$clients->where('active','1')->get();
		foreach ($clients as $client){
			$out[$client->id] = $client->name . ', ' . $client->address;
		}
		return $out;
	}

	function get_combo_data_sites($clientid,$first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$clients = new Client_site();
		$clients->where('active','1')->where('client_id',$clientid)->get();
		foreach ($clients as $client){
			$out[$client->id] = $client->address;
		}
		return $out;
	}

	function get_obj_by_id($id){
		$obj = new Client();
		return $obj->where('id',$id)->get();
	}

	function populate($status=array('9'),$active=array('1'),$user=null){
		$obj = new Client();
		if(is_null($user)){
			$obj->where_in('status',$status)->where_in('active',$active)->where("hide","0")->get();
		}
		else{
			$obj->where_in('status',$status)->where_in('active',$active)->where_in_related_user('id',$user)->where("hide","0")->get();
		}
		return $obj;
	}

	function populate_array(){
		$out = array();
		$objs = new Client();
		$objs->get();
		foreach($objs as $obj){
			array_push($out,array($obj->name,$obj->address,$obj->city,$obj->business_field,$obj->phone));
		}
		return $out;
	}
	function populateprospects($param = 'all'){
		$obj = new Client();
		switch($param){
			case 'open':
				$obj->where_in('status',array('1','2','3','4','5','6','7','8','9','p'))->where_related_survey_request('id',NULL)->get();
			break;
			case 'closed':
				$sql = "select * from clients a left outer join survey_requests b on b.client_id=a.id where a.status in ('1','2','3','4','5','6','7','8','9','p') and b.id is not null ";
				$obj->query($sql);
			break;
			case 'all':
				$obj->where_in('status',array('1','2','3','4','5','6','7','8','9','p'))->get();
			break;
		}
		return $obj;		
	}
	function populateClientSurvey($param = 'all',$user = NULL){
		$obj = new Client();
		$thisuser = implode(",",$user);
		switch($param){
			case 'open':
				$query = "select distinct a.id,a.name,a.status,a.business_field,a.address,a.city,c.username,c.id userid from clients a left outer join survey_requests b on b.client_id =a.id left outer join users c on c.id=a.sale_id  where status in ('1','2','3','4','5','6','7','8','9','p') and b.id = null and c.id in (".$thisuser.")";
				$result = $this->db->query($query);
				$obj = $result->result();

//				$obj->where('active','0')->where_in('status',array('1','2','3','4','5','6','7','8','9','p'))->where_related_survey_request('id',NULL)->where_in_related_user('id',$user)->get();
//				$obj->where_in('status',array('1','2','3','4','5','6','7','8','9','p'))->where_related_survey_request('id',NULL)->where_in_related_user('id',$user)->get();
			break;
			case 'closed':
//				$sql = "select * from clients a left outer join survey_requests b on b.client_id=a.id where a.status in ('1','2','3','4','5','6','7','8','9','p') and a.active='0' and b.id is not null ";
				$obj->where('active','0')->where_in('status',array('1','2','3','4','5','6','7','8','9','p'))->where_related('survey_request','id !=',null)->get();
				$obj->query($sql);
			break;
			case 'all':
				$query = "select distinct a.id,a.name,a.status,a.business_field,a.address,a.city,c.username,c.id userid from clients a left outer join survey_requests b on b.client_id =a.id left outer join users c on c.id=a.sale_id  where a.status in ('1','2','3','4','5','6','7','8','9','p') and c.id in (".$thisuser.")";
				$result = $this->db->query($query);
				$obj = $result->result();
//				$obj->where('active','0')->where_in('status',array('1','2','3','4','5','6','7','8','9','p'))->where_in_related_user('id',$user)->get();
//				$obj->where_in('status',array('1','2','3','4','5','6','7','8','9','p'))->where_in_related_user('id',$user)->get();
			break;
		}
		return $obj;
	}
	function hactivedate(){
		$sql = 'select id,activedate,period1,date_format(activedate,"%d/%c/%Y") hactivedate from clients where id ='.$this->id;
		$query = $this->db->query($sql);
		$result = $query->result()[0];
		return $result->hactivedate;
	}
	function hperiod1(){
		$sql = 'select id,activedate,period1,date_format(period1,"%d/%c/%Y") hperiod1 from clients where id ='.$this->id;
		$query = $this->db->query($sql);
		$result = $query->result()[0];
		return $result->hperiod1;
	}
	function hperiod2(){
		$sql = 'select id,activedate,period1,date_format(period2,"%d/%c/%Y") hperiod2 from clients where id ='.$this->id;
		$query = $this->db->query($sql);
		$result = $query->result()[0];
		return $result->hperiod2;
	}
}
