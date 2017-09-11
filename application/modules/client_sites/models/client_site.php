<?php
class Client_site extends CI_Model{
	var $ci;
/*	var $has_one = array('survey_request','install_site','client','maintenance','branch','install_request','ticket');
	var $has_many = array(
		'fb',
		'fbpic',
		'altergrade',
		'branch',
		'clientservice',
		'maintenance_request',
		'site_antenna',
		'site_router',
		'site_device',
		'site_apwifi',
		'site_wireless_radio',
		'site_pccard',
		'site_pic',
		'troubleshoot_request',
		'site_switch',
		'trial',
		'clientsitesale',
		'survey_site'
	);*/
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
		$sql = "insert into client_sites ";
		$sql.= " " . $keystring . " " ;
		$sql.= " values " ;
		$sql.= " " . $valstring . " " ;
		$que = $this->ci->db->query($sql);
		return $this->ci->db->insert_id();
	}
	function get_client_sites($client_id){
		$sql = "select * from client_sites ";
		$sql.= "where active='1' ";
		$sql.= "and client_id='".$client_id."' ";
		$sql.= "order by create_date asc ";
		$objs = new Client_site();
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_client_sites_by_survey_request($request_id){
		$sql = "select * from client_sites ";
		$sql.= "where active='1' ";
		$sql.= "and survey_request_id='".$request_id."' ";
		$sql.= "order by create_date asc ";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_client_sites_total($client_id){
		$sql = "select count(id) total from client_sites ";
		$sql.= "where active='1' and client_id='".$client_id."' ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res->total;
	}
	function get_combo_data($client_id=null,$first_data=''){
		$out = array();
		if($first_data!=''){
			$out[0] = $first_data;
		}
		$sql = "select id,name from client_sites ";
		$sql.= "where active='1' ";
		$sql.= "and client_id='".$client_id."'";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach ($que->result() as $res){
			$out[$res->id] = $res->name . " - " . $res->address;
		}
		return $out;
	}
	function has_modified($id){
		$sql = "select id,name from client_sites ";
		$sql.= "where id='".$id."' ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		if($res[0]->modified=='0'){
			return false;
		}
		return true;
	}
	function populate($client_id=null){
		if($client_id!=null){
			$sql = "select a.id,a.address,a.city,a.active,a.fbcomplete,b.name,c.username sales, ";
			$sql.= "pic_name,pic_phone_area,pic_phone,c.id client_user_id ";
			$sql.= "from client_sites a ";
			$sql.= "left outer join clients b on b.id=a.client_id ";
			$sql.= "left outer join users c on c.id=b.sale_id ";
			$sql.= "where a.active='1' ";
			$sql.= "and a.client_id='".$client_id."' ";
			$sql.= "group by a.id,a.address,a.city,a.active,a.fbcomplete,b.name,c.username ";
			$sql.= "order by id asc ";
		}else{
			$sql = "select a.id,a.address,a.city,a.active,a.fbcomplete,b.name,c.username sales, ";
			$sql.= "pic_name,pic_phone_area,pic_phone,c.id client_user_id ";
			$sql.= "from client_sites a ";
			$sql.= "left outer join clients b on b.id=a.client_id ";
			$sql.= "left outer join users c on c.id=b.sale_id ";
			$sql.= "where a.active='1' ";
			$sql.= "group by a.id,a.address,a.city,a.active,a.fbcomplete,b.name,c.username ";
			$sql.= "order by id asc ";
		}
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function populatebyid($id=null){
		if($id!=null){
			$sql = "select id,name from client_sites ";
			$sql.= "where id='".$id."' ";
		}else{
			$sql = "select id,name from client_sites ";
		}
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_obj_by_id($id){
		$sql = "select id,name from client_sites ";
		$sql.= "where id='".$id."' ";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_combo_data_address($first_data=''){
		$sql = "select a.id,b.name,b.address from client_sites a ";
		$sql.= "left outer join clients b on b.id=a.client_id ";
		$sql.= "where active='1' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach ($que->result() as $res){
			$out[$res->id] = $res->name . ', ' . $res->address;
		}
		return $out;
	}
	function save($params){
		$keys = array();$vals = array();
		foreach($params as $key=>$val){
			array_push($keys,$key);
			array_push($vals,$val);
		}
		$ci = & get_instance();
		$sql = "insert into client_sites ";
		$sql.= "(".implode(",",$keys).") ";
		$sql.= "values ";
		$sql.= "('".implode("','",$vals)."')";
		$ci->db->query($sql);
		return $ci->db->insert_id();
	}
}
