<?php
function get_trial($trial_id){
	$ci = & get_instance();
	$sql = "select a.id,a.client_site_id, a.startdate,a.enddate,c.name,b.address,b.city,a.cancel,a.extend,a.isjoin,a.status ";
	$sql.= "from trials a ";
	$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
	$sql.= "left outer join clients c on c.id=b.client_id ";
	$sql.= "where a.id=".$trial_id;
	$query = $ci->db->query($sql);
	return $query->result()[0];
}
function getservices($trial_id){
	$ci = & get_instance();
	$sql = "select a.id,a.name service ";
	$sql.= "from clientservices a ";
	$sql.= "right outer join trials b on b.client_site_id=a.client_site_id ";
	$sql.= "where b.id=".$trial_id;
	$query = $ci->db->query($sql);
	return $query->result()[0];	
}
function get_trials(){
	$ci = & get_instance();
	$query = "select c.name,b.address siteaddress,a.id,a.withtrial,a.trialdistance,a.trial_permanent,a.trial_periode1,a.trial_periode1exec,a.trial_periode2,a.trial_periode2exec,d.username,a.create_date ";
	$query.="from  install_requests a ";
	$query.="left outer join client_sites b on b.id=a.client_site_id ";
	$query.="left outer join clients c on c.id=b.client_id ";
	$query.="left outer join users d on d.id=c.user_id ";
	$query.="where withtrial='1'";
	$result = $ci->db->query($query);
	return $result->result();
}
function salesget_trials(){
	$ci = & get_instance();
	$query = "select a.id,a.trialtype,a.startdate,a.enddate,a.startexecdate,a.endexecdate,c.name clientname,";
	$query.="b.address siteaddress,d.id userid,d.username am,a.product,a.integer_part,a.fraction_part,";
	$query.="concat(a.product,'-',a.integer_part,' , ',a.fraction_part) prd,a.createdate, ";
	$query.="case when cancel='1' then 'dibatalkan' ";
	$query.="when extend='1' then 'diperpanjang' ";
	$query.="when isjoin='1' then 'telah join' ";
	$query.="else '' end status, ";
	$query.="datediff(now(),enddate)dtdiff ";
	$query.="from  trials a ";
	$query.="left outer join client_sites b on b.id=a.client_site_id ";
	$query.="left outer join clients c on c.id=b.client_id ";
	$query.="left outer join users d on d.id=c.user_id ";
	$result = $ci->db->query($query);
	return $result->result();
}
function getofficers($trialid){
	$ci = & get_instance();
	$query = "select a.id,a.username ";
	$query.="from  trialofficers a ";
	$query.="left outer join trials b on b.id=a.trial_id ";
	$query.="where b.id='".$trialid."'";
	$result = $ci->db->query($query);
	return $result->result();	
}
function getextendreasons($firstrow = null){
	$er = new Extendreason();
	$er->get();
	$arr = array();
	if(!is_null($firstrow)){
		array_push($arr,$firstrow);
	}
	foreach($er as $reason){
		array_push($arr,$reason->name);
	}
	return $arr;
}
