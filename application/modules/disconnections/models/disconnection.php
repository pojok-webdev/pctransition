<?php
class Disconnection extends DataMapper{
	var $has_one = array('client');
	var $has_many = array('disconnection_operator');
	function __construct(){
		parent::__construct();
	}
	function get_obj_by_id($id){
		$obj = new Disconnection();
		$obj->where('client_id',$id)->get();
		return $obj;
	}
	function get_antennas_by_id($id){
		$ci = & get_instance();
		$sql = "select c.id,c.name,c.location,case when d.id is null then 'icon-remove' else 'icon-ok' end deviceclass  ";
		$sql.= "from clients a right outer join client_sites b on b.client_id=a.id ";
		$sql.= "right outer join site_antennas c on c.client_site_id=b.id ";
		$sql.= "left outer join withdrawals d on d.device_id=c.id ";
		$sql.= "where a.id = " . $id ;
		$res = $ci->db->query($sql);
		return $res->result();
	}
	function get_apwifi_by_id($id){
		$ci = & get_instance();
		$sql = "select c.id,c.tipe,c.macboard,c.location,case when d.id is null then 'icon-remove' else 'icon-ok' end deviceclass  ";
		$sql.= "from clients a right outer join client_sites b on b.client_id=a.id ";
		$sql.= "right outer join site_apwifis c on c.client_site_id=b.id ";
		$sql.= "left outer join withdrawals d on d.device_id=c.id ";
		$sql.= "where a.id = " . $id ;
		$res = $ci->db->query($sql);
		return $res->result();
	}
	function get_devices_by_id($id){
		$ci = & get_instance();
		$sql = "select c.id,c.name,c.devicetype,c.location,case when d.id is null then 'icon-remove' else 'icon-ok' end deviceclass ";
		$sql.= "from clients a right outer join client_sites b on b.client_id=a.id ";
		$sql.= "right outer join site_devices c on c.client_site_id=b.id ";
		$sql.= "left outer join withdrawals d on d.device_id=c.id ";
		$sql.= "where a.id = " . $id ;
		$res = $ci->db->query($sql);
		return $res->result();
	}
	function get_pccards_by_id($id){
		$ci = & get_instance();
		$sql = "select c.id,c.name,c.macaddress,c.description,case when d.id is null then 'icon-remove' else 'icon-ok' end deviceclass  ";
		$sql.= "from clients a right outer join client_sites b on b.client_id=a.id ";
		$sql.= "right outer join site_pccards c on c.client_site_id=b.id ";
		$sql.= "left outer join withdrawals d on d.device_id=c.id ";
		$sql.= "where a.id = " . $id ;
		$res = $ci->db->query($sql);
		return $res->result();
	}
	function get_pics_by_id($id){
		$ci = & get_instance();
		$sql = "select c.id,c.name,hp,position,case when d.id is null then 'icon-remove' else 'icon-ok' end deviceclass  ";
		$sql.= "from clients a right outer join client_sites b on b.client_id=a.id ";
		$sql.= "right outer join site_pics c on c.client_site_id=b.id ";
		$sql.= "left outer join withdrawals d on d.device_id=c.id ";
		$sql.= "where a.id = " . $id ;
		$res = $ci->db->query($sql);
		return $res->result();
	}
	function get_routers_by_id($id){
		$ci = & get_instance();
		$sql = "select c.id,c.tipe,c.macboard,c.location,case when d.id is null then 'icon-remove' else 'icon-ok' end deviceclass  ";
		$sql.= "from clients a right outer join client_sites b on b.client_id=a.id ";
		$sql.= "right outer join site_routers c on c.client_site_id=b.id ";
		$sql.= "left outer join withdrawals d on d.device_id = c.id ";
		$sql.= "where a.id = " . $id ;
		$res = $ci->db->query($sql);
		return $res->result();
	}
	function get_switches_by_id($id){
		$ci = & get_instance();
		$sql = "select c.id,c.name,c.mac,c.description,case when d.id is null then 'icon-remove' else 'icon-ok' end deviceclass  ";
		$sql.= "from clients a right outer join client_sites b on b.client_id=a.id ";
		$sql.= "right outer join site_switches c on c.client_site_id=b.id ";
		$sql.= "left outer join withdrawals d on d.device_id=c.id ";
		$sql.= "where a.id = " . $id ;
		$res = $ci->db->query($sql);
		return $res->result();
	}
	function get_wireless_radios_by_id($id){
		$ci = & get_instance();
		$sql = "select c.id,c.tipe,c.macboard,case when d.id is null then 'icon-remove' else 'icon-ok' end deviceclass  ";
		$sql.= "from clients a right outer join client_sites b on b.client_id=a.id ";
		$sql.= "right outer join site_wireless_radios c on c.client_site_id=b.id ";
		$sql.= "left outer join withdrawals d on d.device_id=c.id ";
		$sql.= "where a.id = " . $id ;
		$res = $ci->db->query($sql);
		return $res->result();
	}
	function populate($status='all'){
		$objs = new Disconnection();
		if($status=='all'){
			$objs->get();			
		}else{
			$objs->where('status',$status)->get();
		}
		return $objs;
	}
}
