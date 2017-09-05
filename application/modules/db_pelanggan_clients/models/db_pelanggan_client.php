<?php
class Db_pelanggan_client extends DataMapper{
	var $has_one = array(
		'client'
	);
		var $table = 'db_pelanggan.clients';
	var $db_params = 'secondg';
	function __construct(){
		parent::__construct();
	}

	function  get_db_pelanggan_clients(){
//		$db2 = $this->load->database('secondg',TRUE);
		$client = new Client();
		$client->get();
		return $client;
	}
	
	function get_combo_data($first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$clients = new Db_pelanggan_client();
		$clients->where('active','1')->get();
		foreach ($clients as $client){
			$out[$client->id] = $client->name;
		}
		return $out;
	}
	
	function export($id){
		$dbp_client = new Db_pelanggan_client();
		$dbp_client->where('id',$id)->get();
		
		$client = new Client();
		$client->where('id',$id)->get();
		if($client->result_count()==0){
			$query ='insert into clients ';
			$query.='(id,name,client_id)';
			$query.='values';
			$query.='('  . $dbp_client->id . ',"'  . $dbp_client->name . '",'  . $dbp_client->id . ')';
			$result = $this->db->query($query);
//			$client->name = $dbp_client->name;
//			$client->id = $dbp_client->id;
//			$client->client_id = $dbp_client->id;
//			$client->save();
//			echo $client->check_last_query();
		}
		else{
			$client->where('id',$id)->update(array('name'=>$dbp_client->name));
		}
	}
}