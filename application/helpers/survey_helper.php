<?php
function get_ts(){
	$ci = & get_instance();
	$id = $ci->session->userdata["user_id"];
	$obj = new User();
	$obj->where("id",$id)->get();
	return $obj;
}
function ts_get_surveysite(){
	$ci = & get_instance();
	$userbranch = getuserbranches();
	$brnc = "(".implode(",",$userbranch).")";
	$sql = "select distinct a.id,case when d.alias is null then d.name else concat(d.name,' (',d.alias,')')  end clientname,e.resume,a.direction,f.username,e.create_date screate_date,a.address,a.execution_date,a.survey_request_id,g.name branch ";
	$sql.= "from survey_sites a ";
	$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
	$sql.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
	$sql.= "left outer join clients d on d.id=b.client_id ";
	$sql.= "left outer join survey_requests e on e.id=a.survey_request_id ";
	$sql.= "left outer join users f on f.id=d.sale_id ";
	$sql.= "left outer join branches g on g.id=c.branch_id ";
	$sql.= "where a.active='1' and c.branch_id in $brnc";
	$obj = $ci->db->query($sql);
	return $obj->result();	
}
function sales_get_surveysite(){
	$survey = new Survey();
	return $survey->get_surveysites();
}
function getsalesselected($client_site_id){
	$sql = "select b.id, b.name ,b.marketingmail from clientsitesales a left outer join branches b on b.id=a.branch_id where client_site_id=".$client_site_id;
	$ci = & get_instance();
	$result = $ci->db->query($sql);
	$arr = array();
	foreach($result->result() as $res){
		$arr[$res->id] = $res->name;
	}
	return $arr;
}
function getsalesselectedbysurveysiteid($survey_site_id){
	$sql = "select client_site_id from survey_sites where id=".$survey_site_id;
	$ci = & get_instance();
	$result = $ci->db->query($sql);
	$obj = $result->result()[0];
	return getsalesselected($obj->client_site_id);
}
function getmarketingmailarray($client_site_id){
	$sql = "select b.marketingmail from clientsitesales a left outer join branches b on b.id=a.branch_id where client_site_id=".$client_site_id;
	$ci = & get_instance();
	$result = $ci->db->query($sql);
	$arr = array();
	foreach($result->result() as $res){
		array_push($arr,$res->marketingmail);
	}
	return $arr;
}
function getuserrole($user_id){
	$ci = & get_instance();
	$sql = "select b.username,a.email from roles_users a ";
	$sql.= "left outer join users b on b.id=a.user_id ";
	$sql.= "left outer join roles c on c.id=a.role_id ";
	$sql.= "where a.user_id = " . $user_id;
	$result = $ci->db->query($sql);
	return $result->result()[0]->email;
}
function get_position_combodata(){
	$obj = new Position();
	return $obj->get_combo_data();
}
function get_client_combo_data(){
	$obj = new Client();
	return $obj->get_combo_data();
}
function get_service_combo_data(){
	$obj = new Service();
	return $obj->get_combo_data();
}
function get_branch_combo_data(){
	$obj = new Branch();
	return $obj->get_combo_data();
}
function get_pap_combo_data(){
	$obj = new Pap();
	return $obj->get_combo_data();
}
function get_devicetype_combo_data(){
	$obj = new Devicetype();
	return $obj->get_combo_data();
}
function get_materialtype_combo_data(){
	$obj = new Materialtype();
	return $obj->get_combo_data();
}
function get_pbtstower_combo_data(){
	$obj = new Pbtstower();
	return $obj->get_combo_data();
}
function get_device_combo_data(){
	$obj = new Device();
	return $obj->get_combo_data();
}

