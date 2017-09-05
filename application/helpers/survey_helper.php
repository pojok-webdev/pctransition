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
	$query = "select distinct a.id,case when d.alias is null then d.name else concat(d.name,' (',d.alias,')')  end clientname,e.resume,a.direction,f.username,e.create_date screate_date,a.address,a.execution_date,a.survey_request_id,g.name branch ";
	$query.= "from survey_sites a ";
	$query.= "left outer join client_sites b on b.id=a.client_site_id ";
	$query.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
	$query.= "left outer join clients d on d.id=b.client_id ";
	$query.= "left outer join survey_requests e on e.id=a.survey_request_id ";
	$query.= "left outer join users f on f.id=d.sale_id ";
	$query.= "left outer join branches g on g.id=c.branch_id ";
	$query.= "where a.active='1' and c.branch_id in $brnc";
	$obj = $ci->db->query($query);
	return $obj->result();	
}
function sales_get_surveysite(){
	$ci = & get_instance();
	$userbranch = getuserbranches();
	//$userbrancharr = implode(",",$userbranch);
	$id = $ci->session->userdata["user_id"];
	$arr = array();
	$users = getsubordinates($id,$arr);
	$userarr = implode(",",$users);
		
	$brnc = "(".implode(",",$userbranch).")";
	$query = "select distinct a.id,case when d.alias is null then d.name else concat(d.name,' (',d.alias,')')  end clientname,e.resume,a.direction,f.username,f.id userid,e.resume eresume,e.create_date screate_date,a.address,a.execution_date,a.survey_request_id from survey_sites a left outer join client_sites b on b.id=a.client_site_id ";
	$query.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
	$query.= "left outer join clients d on d.id=b.client_id ";
	$query.= "left outer join survey_requests e on e.id=a.survey_request_id ";
	$query.= "left outer join users f on f.id=d.sale_id ";
	$query.= "where c.branch_id in $brnc ";
	//$query.= "or d.sale_id = " . $ci->session->userdata["user_id"];
	$query.= "and d.sale_id in (".$userarr.") ";
	$obj = $ci->db->query($query);
	return $obj->result();	
}
function getsalesselected($client_site_id){
	$query = "select b.id, b.name ,b.marketingmail from clientsitesales a left outer join branches b on b.id=a.branch_id where client_site_id=".$client_site_id;
	$ci = & get_instance();
	$result = $ci->db->query($query);
	$arr = array();
	foreach($result->result() as $res){
		$arr[$res->id] = $res->name;
	}
	return $arr;
}
function getsalesselectedbysurveysiteid($survey_site_id){
	$query = "select client_site_id from survey_sites where id=".$survey_site_id;
	$ci = & get_instance();
	$result = $ci->db->query($query);
	$obj = $result->result()[0];
	return getsalesselected($obj->client_site_id);
}
function getmarketingmailarray($client_site_id){
	$query = "select b.marketingmail from clientsitesales a left outer join branches b on b.id=a.branch_id where client_site_id=".$client_site_id;
	$ci = & get_instance();
	$result = $ci->db->query($query);
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