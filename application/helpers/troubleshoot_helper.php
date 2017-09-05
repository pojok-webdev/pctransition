<?php
function test($params){
	$ci = & get_instance();
	$obj = new Ticket();
	foreach($params as $key=>$val){
		$obj->$key = $val;
	}
	$obj->save();
	return $ci->db->insert_id();
}
function ts_populate(){
	$userbranch = implode(",",getuserbranches());
	$query = "select x.*,i.name branch from troubleshoot_requests x left outer join tickets a on a.id=x.ticket_id ";
	$query.= "left outer join (select a.id,b.branch_id from client_sites a ";
	$query.= "left outer join branches_client_sites b on b.client_site_id=a.id where branch_id in (".$userbranch."))b  on b.id=a.client_site_id ";
	$query.= "left outer join (select a.id from backbones a ";
	$query.= "left outer join backbones_branches b on b.backbone_id=a.id where branch_id in (".$userbranch."))c  on c.id=a.client_site_id ";
	$query.= "left outer join (select a.id from datacenters a where branch_id in (".$userbranch."))d  on d.id=a.datacenter_id ";
	$query.= "left outer join (select a.id from btstowers a where a.branch_id in (".$userbranch."))e  on e.id=a.btstower_id ";
	$query.= "left outer join (select a.id from ptps a where a.branch_id in (".$userbranch."))f on f.id=a.ptp_id ";
	$query.= "left outer join (select a.id from cores a where a.branch_id in (".$userbranch."))g on g.id=a.core_id ";
	$query.= "left outer join (select a.id from aps a left outer join btstowers b on b.id=a.btstower_id where b.branch_id in (".$userbranch."))h on h.id=a.ap_id ";
	$query.= "left outer join branches i on i.id=b.branch_id  ";
	$query.= "where b.id is not null ";
	$query.= "or c.id is not null ";
	$query.= "or d.id is not null ";
	$query.= "or e.id is not null ";
	$query.= "or f.id is not null ";
	$query.= "or g.id is not null ";
	$query.= "or h.id is not null ";
	//echo $query;
	$objs = new Troubleshoot_request();
	$objs->query($query);
	return $objs;
/*	foreach($objs as $obj){
		echo $obj->id . "<br />";
	}*/
}
	function get_obj_by_id($id){
		$sql = "select a.id,a.client_site_id,b.kdticket,a.troubleshoottype,d.name clientname,a.nameofmtype,a.complaint,e.name servicename ,d.address clientaddress,d.city clientcity,a.activities,a.resume from troubleshoot_requests a ";
		$sql.= "left outer join (select id,kdticket from tickets) b on b.id=a.ticket_id ";
		$sql.= "left outer join (select id,client_id,service_id from client_sites) c on c.id=a.client_site_id ";
		$sql.= "left outer join (select id,name,address,city from clients) d on d.id=c.client_id ";
		$sql.= "left outer join services e on e.id=c.service_id ";
		
		$sql.= "where a.id=".$id;
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		return $que->result()[0];
//		$obj = new Troubleshoot_request();
//		$obj->where('id',$id)->get();
//		return $obj;
	}
	function get_ba_by_id($id){
		$sql = "select * from troubleshoot_bas where troubleshoot_request_id=".$id;
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		return array("result"=>$que->result(),"num_rows"=>$que->num_rows);
	}//troubleshoot_image
	function get_images_by_id($id){
		$sql = "select * from troubleshoot_images where troubleshoot_request_id=".$id." ";
		$sql.= "order by roworder asc";
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		return array("result"=>$que->result(),"num_rows"=>$que->num_rows);
	}//troubleshoot_officer
	function get_officer_by_id($id){
		$sql = "select * from troubleshoot_officers where troubleshoot_request_id=".$id." ";
//		$sql.= "order by roworder asc";
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		return array("result"=>$que->result(),"num_rows"=>$que->num_rows);
	}//troubleshoot_material
	function get_materials_by_id($id){
		$sql = "select * from troubleshoot_materials where troubleshoot_request_id=".$id." ";
//		$sql.= "order by roworder asc";
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		return array("result"=>$que->result(),"num_rows"=>$que->num_rows);
	}//troubleshoot_material