<?php
/*
 * WRITTEN by PUJI W PRAYITNO
 * 062015
 * mailto:puji@padi.net.id
 * */
function sitehlp_getjson($objclass,$objtbl,$filter,$id,$ioflag){
	$ci = & get_instance();
	$objs = new $objclass();
	$objs->where($filter,$id)->where('ioflag',$ioflag)->get();
	$arr = array();
	$arr2 = array();
	$fields = $ci->db->list_fields($objtbl);
	foreach($objs as $obj){
		foreach($fields as $field){
			array_push($arr, '"' . $field . '":"' . $obj->$field . '"'); 
		}
		$str = implode(',',$arr);
		array_push($arr2,'{'.$str.'}');
	}
	$str2 = implode(',',$arr2);
	return '{"obj":['.$str2.']}';
}
function sitehlp_getports($maxport=24){
	$arr = array();
	for($i=0;$i<=$maxport;$i++){
		array_push($arr,$i);
	}
	return $arr;
}
function gettsmails($site_id){
	//$site = new Client_site();
	//   $site->where("id",$site_id)->include_related("branch","tsmail")->get();
	//$site->where("id",$site_id)->get();
	$arr = array();
	$sql = "select tsmail from client_sites a ";
	$sql.= "left outer join branches_client_sites b on b.client_site_id=a.id ";
	$sql.= "left outer join branches c on c.id=b.branch_id "; 
	$sql.= "where a.id=".$site_id;
	$ci = & get_instance();
	$que = $ci->db->query($sql);
	$res = $que->result();
	foreach($res as $branch){
		echo "BRANCH TS MAIL ".$branch->tsmail;
		array_push($arr,$branch->tsmail);
	}
	//echo $site->check_last_query();
	return $arr;
}
function getticketmails($ticket_id){
	$query = "select a.id,a.clientname,brn,h.tsmail,h.marketingmail from ";
	$query.= "(select a.id,a.clientname,";
	$query.= "case when b.branch_id is not null then b.branch_id ";
	$query.= "when c.branch_id is not null then c.branch_id  ";
	$query.= "when d.branch_id is not null then d.branch_id  ";
	$query.= "when e.branch_id is not null then e.branch_id  ";
	$query.= "when f.branch_id is not null then f.branch_id  end brn ";
	//$query.= ",b.branch_id,c.branch_id,d.branch_id,e.branch_id,f.branch_id,g.branch_id ";
	$query.= "from tickets a ";
	$query.= "left outer join branches_client_sites b on b.client_site_id=a.client_site_id ";
	$query.= "left outer join backbones_branches c on c.backbone_id=a.backbone_id ";
	$query.= "left outer join datacenters d on d.id=a.datacenter_id ";
	$query.= "left outer join btstowers e on e.id=a.btstower_id ";
	$query.= "left outer join ptps f on f.id=a.ptp_id ";
	$query.= "left outer join cores g on g.id=a.core_id) a ";
	$query.= "left outer join branches h on h.id=a.brn ";
	$query.= "where a.id = ".$ticket_id." ";
	//echo $query."<br />";
	$site = new Client_site();
	//$site->where("id",$site_id)->include_related("branch","tsmail")->get();
	$site->query($query);
	$arr = array();
	foreach($site as $branch){
		//echo "BRANCH TS MAIL ".$branch->name."<br />";
		array_push($arr,$branch->tsmail);
	}
	//echo $site->check_last_query();
	return $arr;
}
