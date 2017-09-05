<?php
function get_ts(){
	$ci = & get_instance();
	$id = $ci->session->userdata["user_id"];
	$obj = new User();
	$obj->where("id",$id)->get();
	return $obj;
}
function ts_get_installsite(){
	$userbranch = getuserbranches();
	$obj = new Install_site();
	$ci = & get_instance();
	$sql = "select a.install_request_id,case when c.alias is null then c.name else concat(c.name,' (',c.alias,')')  end name,a.address,a.city,d.username,f.install_date,f.fix_install_date execdate,a.pic_name,a.pic_phone_area,a.pic_phone,g.name branch,a.status,f.create_date from install_sites a ";
	$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
	$sql.= "left outer join clients c on c.id=b.client_id ";
	$sql.= "left outer join users d on d.id=c.user_id ";
	$sql.= "left outer join branches_client_sites e on e.client_site_id=b.id ";
	$sql.= "left outer join install_requests f on f.id=a.install_request_id ";
	$sql.= "left outer join branches g on g.id=e.branch_id ";
	//$sql.= "where d.id in($userarr) and  e.branch_id in $brnc";
	//echo $obj->check_last_query();
	$que = $ci->db->query($sql);
	$obj = $que->result();
	return $obj;	
}
function sales_get_installsite(){
	$ci = & get_instance();
	$userbranch = getuserbranches();
	$brnc = "(".implode(",",$userbranch).")";
	$id = $ci->session->userdata["user_id"];
	$arr = array();
	$users = getsubordinates($id,$arr);
	$userarr = implode(",",$users);
	$obj = new Install_site();
	$sql = "select a.install_request_id,case when c.alias is null then c.name else concat(c.name,' (',c.alias,')')  end name,a.address,a.city,d.username,f.install_date,f.fix_install_date execdate,a.pic_name,a.pic_phone_area,g.name branch,a.status ";
	$sql.= "from install_sites a ";
	$sql.= "left outer join client_sites b on b.id=a.client_site_id ";
	$sql.= "left outer join clients c on c.id=b.client_id ";
	$sql.= "left outer join users d on d.id=c.user_id ";
	$sql.= "left outer join branches_client_sites e on e.client_site_id=b.id ";
	$sql.= "left outer join install_requests f on f.id=a.install_request_id ";
	$sql.= "left outer join branches g on g.id=e.branch_id ";
//	$sql.= "where d.id=c.sale_id";
	//$sql.= "where d.id=c.sale_id and  e.branch_id in $brnc";
	$sql.= "where d.id in($userarr) and  e.branch_id in $brnc";
	//echo $sql;
	$obj->query($sql);
	//$obj->where_in_related('client_site/client/user','id',$users)->get();
	//echo $obj->check_last_query();
	return $obj;	
}
function getresumetext($resume){
	//echo "RESUME : ".$resume."<BR />";
	switch($resume){
		case '0':
		$resume = 'Belum ada kesimpulan';
		break;
		case '1':
		$resume = 'Bisa dilaksanakan';
		break;
		case '2':
		$resume = 'Bisa dilaksanakan dg syarat';
		break;
		case '3':
		$resume = 'Tidak bisa dilaksanakan';
		break;
	}	
}
