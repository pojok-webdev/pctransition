<?php
function branchischecked($branchid,$brancharray){
	for($x=0;$x<=strlen($brancharray);$x++){
		if(substr($brancharray,$x,1)===$branchid){
			return "checked='checked'";
		}
	}
	return "";
}
function month_nth($n){
	$months = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
	return $months[$n-1];
}
function survey_per_month($month,$year,$branchesarray=array('1','2','3','4'),$ams=array()){
	$ci = & get_instance();
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$userbranch = implode(",",getuserbranches());
	$usrstr = "'" . implode("','",$ams) . "'";
	$query = "select day(survey_date)dt, count(day(survey_date)) jml  from survey_sites a left outer join branches_client_sites b on b.client_site_id=a.client_site_id left outer join client_sites c on c.id=a.client_site_id left outer join clients d on d.id=c.client_id where month(survey_date)='".$month."' and year(survey_date)='".$year."' and b.branch_id in (".$selectedbranches.") ";
	if(count($ams)>0){
		$query.= "and d.sale_id in (".$usrstr.") ";
	}
	$query.= "group by day(survey_date);";
	//echo $query;
	//echo 'Banyaknya ams ' . count($ams);
	$request = $ci->db->query($query);
	$out = array();
	foreach($request->result() as $result){
		$out[$result->dt] = $result->jml;
	}
	return $out;
}
function install_per_month($month,$year,$branchesarray=array('1','2','3','4'),$ams=array()){
	$ci = & get_instance();
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$usrstr = "'" . implode("','",$ams) . "'";
//	$userbranch = implode(",",getuserbranches());
	$query = "select dt,count(csi) jml from (select distinct  day(install_date)dt,a.client_site_id csi from install_sites a left outer join branches_client_sites b on b.client_site_id=a.client_site_id left outer join client_sites c on c.id=a.client_site_id left outer join clients d on d.id=c.client_id where month(install_date)='".$month."' and year(install_date)='".$year."' and b.branch_id in (".$selectedbranches.") ";
	if(count($ams)>0){
		$query.= "and d.sale_id in (".$usrstr.") ";
	}
	$query.= ")q group by dt;";
	$request = $ci->db->query($query);
	$out = array();
	foreach($request->result() as $result){
		$out[$result->dt] = $result->jml;
	}
	return $out;
}
function suspect_per_month($month,$year,$branchesarray=array('1','2','3','4'),$ams=array()){
	$ci = & get_instance();
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$usrstr = "'" . implode("','",$ams) . "'";
//	$userbranch = implode(",",getuserbranches());
	$query = "select dt,count(csi) jml from (select distinct  day(a.createdate)dt,a.id csi from suspects a left outer join users b on b.id=a.sale_id left outer join branches_users c on c.user_id=b.id where month(a.createdate)='".$month."' and year(a.createdate)='".$year."' and c.branch_id in (".$selectedbranches.") and b.id in (".$usrstr.") )q group by dt;";
	$request = $ci->db->query($query);
	$out = array();
	//echo $query;
	foreach($request->result() as $result){
		$out[$result->dt] = $result->jml;
	}
	return $out;
}
function prospect_per_month($month,$year,$branchesarray,$ams){
	$ci = & get_instance();
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$usrstr = "'".implode("','",$ams)."'";
//	$userbranch = implode(",",getuserbranches());
	$query = "select dt,count(csi) jml from (select distinct  day(a.prospectdate)dt,a.id csi from clients a left outer join users b on b.id=a.sale_id left outer join branches_users c on c.user_id=b.id where month(a.prospectdate)='".$month."' and year(a.prospectdate)='".$year."' and c.branch_id in (".$selectedbranches.") and a.status in ('1','2','3','4','5','6','7','8','9','p') and b.id in (".$usrstr.") )q group by dt;";
	$request = $ci->db->query($query);
	$out = array();
	//echo $query;
	foreach($request->result() as $result){
		$out[$result->dt] = $result->jml;
	}
	return $out;
}
function troubleshoot_per_month($month,$year,$branchesarray=array('1','2','3','4'),$ams=array()){
	$ci = & get_instance();
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$userbranch = implode(",",getuserbranches());
	$usrstr = "'".implode("','",$ams)."'";
	$query = "select day(request_date1)dt, count(day(request_date1)) jml  from troubleshoot_requests a left outer join branches_client_sites b on b.client_site_id=a.client_site_id left outer join client_sites c on c.id=b.client_site_id left outer join clients d on d.id=c.client_id where month(request_date1)='".$month."' and year(request_date1)='".$year."' and b.branch_id in (".$selectedbranches.") ";
	if(count($ams)>0){
		$query.= " and d.sale_id in (".$usrstr.") ";
	}
	$query.= " group by day(request_date1);";
	//echo $query;
	$request = $ci->db->query($query);
	$out = array();
	foreach($request->result() as $result){
		$out[$result->dt] = $result->jml;
	}
	return $out;
}
function maintenance_per_month($month,$year,$branchesarray=array('1','2','3','4'),$ams=array()){
	$ci = & get_instance();
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$userbranch = implode(",",getuserbranches());
	$usrstr = "'".implode("','",$ams)."'";
	$query = "select day(a.createdate)dt, count(day(a.createdate)) jml  from maintenancereports a ";
	$query.= "left outer join maintenances b on b.id=a.maintenance_id ";
	$query.= "left outer join branches_client_sites c on c.client_site_id=b.client_site_id ";
	$query.= "left outer join client_sites d on d.id=c.client_site_id ";
	$query.= "left outer join clients e on e.id=d.client_id ";
	$query.= "where month(a.createdate)='".$month."' ";
	$query.= "and year(a.createdate)='".$year."' ";
	$query.= "and c.branch_id in (".$selectedbranches.") ";
	if(count($ams)>0){
		$query.= " and d.sale_id in (".$usrstr.") ";
	}
	$query.= " group by day(a.createdate);";
	$request = $ci->db->query($query);
	$out = array();
	foreach($request->result() as $result){
		$out[$result->dt] = $result->jml;
	}
	return $out;
}
function suspectclientperday($survey_date,$branchesarray){
	$ci = & get_instance();
	$userbranch = implode(",",getuserbranches());
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$query = "select distinct  day(a.createdate)dt,a.id ,a.name from suspects a left outer join users b on b.id=a.sale_id left outer join branches_users c on c.user_id=b.id where date(a.createdate)='".$survey_date."' and c.branch_id in (".$selectedbranches.")";
	$request = $ci->db->query($query);
	//echo $query . "<br />";
	$out = array();
	foreach($request->result() as $result){
		array_push($out,array("id"=>$result->id,"name"=>$result->name));//$out[$result->id] = $result->name;
	}
	return $out;
}
function prospectclientperday($survey_date,$branchesarray){
	$ci = & get_instance();
	$userbranch = implode(",",getuserbranches());
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$query = "select distinct  day(a.prospectdate)dt,a.id,a.name from clients a left outer join users b on b.id=a.sale_id left outer join branches_users c on c.user_id=b.id where date(a.prospectdate)='".$survey_date."' and c.branch_id in (".$selectedbranches.") and a.status in ('1','2','3','4','5','6','7','8','9','p')";
	$request = $ci->db->query($query);
	//echo $query . "<br />";
	$out = array();
	foreach($request->result() as $result){
		array_push($out,array("id"=>$result->id,"name"=>$result->name));//$out[$result->id] = $result->name;
	}
	return $out;
}
function surveyclientperday($survey_date,$branchesarray){
	$ci = & get_instance();
	$userbranch = implode(",",getuserbranches());
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$query = "select a.id survey_id,c.id,d.name from survey_sites a left outer join branches_client_sites b on b.client_site_id=a.client_site_id left outer join client_sites c on c.id=a.client_site_id left outer join clients d on d.id=c.client_id where b.branch_id in (".$selectedbranches.") and date(survey_date)='$survey_date'";
	$request = $ci->db->query($query);
	//echo $query . "<br />";
	$out = array();
	foreach($request->result() as $result){
		array_push($out,array("id"=>$result->id,"name"=>$result->name,"survey_id"=>$result->survey_id));//$out[$result->id] = $result->name;
	}
	return $out;
}
function installclientperday($install_date,$branchesarray){
	$ci = & get_instance();
	$userbranch = implode(",",getuserbranches());
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$query = "select a.install_request_id install_id,c.id,d.name from install_sites a left outer join branches_client_sites b on b.client_site_id=a.client_site_id left outer join client_sites c on c.id=a.client_site_id left outer join clients d on d.id=c.client_id where b.branch_id in (".$selectedbranches.") and date(install_date)='$install_date'";
	$request = $ci->db->query($query);
	//echo $query . "<br />";
	$out = array();
	foreach($request->result() as $result){
		array_push($out,array("id"=>$result->id,"name"=>$result->name,"install_id"=>$result->install_id));
	}
	return $out;
}
function troubleshootclientperday($request_date,$branchesarray){
	$ci = & get_instance();
	$userbranch = implode(",",getuserbranches());
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$query = "select a.id troubleshoot_id,c.id,d.name from troubleshoot_requests a left outer join branches_client_sites b on b.client_site_id=a.client_site_id left outer join client_sites c on c.id=a.client_site_id left outer join clients d on d.id=c.client_id where b.branch_id in (".$selectedbranches.") and date(request_date1)='$request_date'";
	$request = $ci->db->query($query);
	$out = array();
	foreach($request->result() as $result){
		array_push($out,array("id"=>$result->id,"name"=>$result->name,"troubleshoot_id"=>$result->troubleshoot_id));
	}
	return $out;
}
function maintenanceclientperday($request_date,$branchesarray){
	$ci = & get_instance();
	$userbranch = implode(",",getuserbranches());
	$selectedbranches = "'".implode("','",$branchesarray)."'";
	$query = "select a.id maintenance_id,d.id,e.name from maintenancereports a ";
	$query.= "left outer join maintenances b on b.id=a.maintenance_id ";
	$query.= "left outer join branches_client_sites c on c.client_site_id=b.client_site_id ";
	$query.= "left outer join client_sites d on d.id=b.client_site_id ";
	$query.= "left outer join clients e on e.id=d.client_id ";
	$query.= "where c.branch_id in (".$selectedbranches.") and date(a.createdate)='$request_date'";
	$request = $ci->db->query($query);
	$out = array();
	foreach($request->result() as $result){
		array_push($out,array("id"=>$result->id,"name"=>$result->name,"maintenance_id"=>$result->maintenance_id));
	}
	return $out;
}
function getticketsolution($ticket_id){
	$ci = & get_instance();
	$query = "select description from ticket_followups where ticket_id=$ticket_id";
	//echo $query;
	$request = $ci->db->query($query);
	return $request->result();
}
function getticketdate($pticketdate){
	$date = substr($pticketdate,0,2);
	$mnth = substr($pticketdate,3,3);
	$year = substr($pticketdate,7,4);
	switch($mnth){
		case 'jan':
			$mnt = '01';
			break;
		case 'feb':
			$mnt = '02';
			break;
		case 'mar':
			$mnt = '03';
			break;
		case 'apr':
			$mnt = '04';
			break;
		case 'may':
			$mnt = '05';
			break;
		case 'jun':
			$mnt = '06';
			break;
		case 'jul':
			$mnt = '07';
			break;
		case 'aug':
			$mnt = '08';
			break;
		case 'sep':
			$mnt = '09';
			break;
		case 'oct':
			$mnt = '10';
			break;
		case 'nov':
			$mnt = '11';
			break;
		case 'dec':
			$mnt = '12';
			break;
	}
	return $year."-".$mnt."-".$date;
}
