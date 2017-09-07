<?php
function getroles(){
	$obj = new Picrole();
	$obj->get();
	return $obj;
}
function getrolescombodata(){
	$objs = new Picrole();
	$objs->get();
	$out = array();
	foreach($objs as $obj){
		$out[$obj->id] = $obj->name;
	}
	return $out;
}
/*function getsalescombodata(){
	$ci = & get_instance();
	$sql = "select from users a ";
	$sql.= "left outer join groups_users b on b.user_id=a.id ";
	$sql.= "left outer join groups c on c.id=b.group_id ";
	$sql.= "where a.active='1' ";
	$sql.= "and c.id=3 ";
	$que = $ci->db->query($sql);
	$out = array();
	foreach($que->result() as $obj){
		$out[$obj->id] = $obj->username;
	}
	return $out;
}*/
function getbusinessfieldcombodata(){
	$objs = new Business_field();
	return $objs->get_combo_data();	
}
function getbranchescombodata(){
	$objs = new Branch();
	return $objs->get_combo_data();
}
function getclientbyid($id){
	$client = new Client($id);
	return $client->get_obj_by_id();
}
function getspeedcombodata(){
	$speed = new Speed();
	return $speed->get_combo_data();
}
function getoperatorcombodata(){
	$operator = new Operator();
	return $operator->get_combo_data("Sales","Pilihlah");
}
function getservicecombodata(){
	$service = new Service();
	return $service->get_combo_data();
}
function getusercombodatabygroup(){
	$obj = new User();
	return $obj->get_combo_data_by_group();
}
function getproblemcombodata(){
	$obj = new Problem();
	return $obj->get_combo_data();
}
function getdurations(){
	$obj = new Duration();
	return $obj->get_combo_data();
}
function populate($status=array('9'),$active=array('1'),$user=null){
	$userbranch = getuserbranches();
	$ci = & get_instance();
	
	if(is_null($user)){
		$query = "select a.id,a.name,a.address,d.username usrname,a.alias,a.phone_area,a.phone,e.pic from clients a ";
		$query.= "left outer join client_sites b on b.client_id=a.id ";
		$query.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
		$query.= "left outer join users d on d.id=a.sale_id ";
		$query.= "left outer join (select id,client_id,prole,name pic from pics where prole='PEMOHON') e on e.client_id=a.id ";
		$query.= "where c.branch_id in (".implode(",",$userbranch).") ";
	}
	else{
		$query = "select a.id,a.name,a.address,d.username usrname,a.alias,a.phone_area,a.phone,e.pic from clients a ";
		$query.= "left outer join client_sites b on b.client_id=a.id ";
		$query.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
		$query.= "left outer join users d on d.id=a.sale_id ";
		$query.= "left outer join (select id,client_id,prole,name pic from pics where prole='PEMOHON') e on e.client_id=a.id ";
		$query.= "where c.branch_id in (".implode(",",$userbranch).") and a.user_id=".$user." ";
	}
	$result = $ci->db->query($query);
	//echo $query;
	return $result->result();
	//return $obj;
}

function adm_populate(){
	$userbranch = getuserbranches();
	$branches = implode($userbranch,",");
	$ci = & get_instance();
	$query = "select a.id,a.name,b.id userid,b.username,a.address,a.phone_area,a.phone from clients a left outer join users b on b.id=a.user_id where branch_id in ($branches)";
	//$client = new Client();
	//$client->query($query);
	$res = $ci->db->query($query);
	
	return $res->result();
}
function sales_populate($active="1",$status="1",$hide="0"){
	$ci = & get_instance();
	$userbranch = getuserbranches();
	$branches = implode($userbranch,",");
	$id = $ci->session->userdata["user_id"];
	$teams = getuserssupervised($id);
	array_push($teams,$id);
	$supervised = implode(",",$teams);
	$query = "select distinct a.id,case when alias is null then a.name else concat(a.name,' (',a.alias,')')  end name,b.id userid,b.username,c.username sales,a.address,a.phone_area,a.phone,d.pic from clients a ";
	$query.= "left outer join users b on b.id=a.user_id ";
	$query.= "left outer join users c on c.id=a.sale_id ";
	$query.= "left outer join (select id,client_id,prole,name pic from pics where prole='PEMOHON') d on d.client_id=a.id ";
	$query.= "where a.sale_id in (".$supervised.") and a.active='".$active."' and a.status='".$status."' and a.hide='".$hide."' ";
	$res = $ci->db->query($query);
	
	return $res->result();
}
function saveamhistory($params){
	$ci = & get_instance();
	
	$query = "insert into amhistories ";
	$query.= "(client_id,user_id,username,displacementdate,description,createuser) ";
	$query.= "values (".$params['client_id'].",".$params['user_id'].",'".$params['username']."','".$params['displacementdate']."','".$params['description']."','".$params['createuser']."') ";
	$ci->db->query($query);
}
