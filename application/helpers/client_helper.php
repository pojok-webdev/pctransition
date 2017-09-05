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
function getsalescombodata(){
	$objs = new User();
	$objs->where('active','1')->where_related('group','id','3')->get();
	$out = array();
	foreach($objs as $obj){
		$out[$obj->id] = $obj->username;
	}
	return $out;
}
function getbranchescombodata(){
	$objs = new Branch();
	$objs->where('active','1')->get();
	$out = array();
	foreach($objs as $obj){
		$out[$obj->id] = $obj->name;
	}
	return $out;
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
