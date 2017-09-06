<?php
function ticket_save($params){
	$ci = & get_instance();
	$obj = new Ticket();
	foreach($params as $key=>$val){
		$obj->$key = $val;
	}
	$obj->save();
	return $ci->db->insert_id();
}
function getstatistics(){
	$sql = "select a.clientname,count(a.clientname) total from tickets a ";
	$sql.= "group by a.clientname";
	$ticket = new Ticket();
	$ticket->query($sql);
	return $ticket;
}
function ticket_populate2(){
	$ci = & get_instance();
	$userbranches = implode(",",getuserbranches());
	$sql = "select distinct a.id,a.kdticket,a.create_date,a.createuser,a.status,case a.status when '0' then 'open' when '1' then 'close' end ticketStatus,case a.status when '0' then '-' when '1' then ticketend end ticketEnd,a.clientname,a.reporterphone,a.requesttype,a.parentid,b.id cid,c.id backboneid,d.id btsid,e.id dcid,f.id ptpid,reporter,i.trid,j.hastroubleshoot,date_format(ticketstart,'%d/%m/%Y %H:%i:%s') ticketstart,case a.status when '0' then '00/00/0000 00:00:00' when '1' then date_format(ticketend,'%d/%m/%Y %H:%i:%s') end ticket_end";

	$sql .= ',concat(case when ticketend is null then datediff(now(),ticketstart) when ticketend="0000-00-00 00:00:00" then datediff(now(),ticketstart) else datediff(ticketend,ticketstart) end," hari ",';

	$sql.= 'time_format(case when ticketend is null then timediff(now(),ticketstart) when ticketend="0000-00-00 00:00:00" then timediff(now(),ticketstart) else timediff(ticketend,ticketstart) end,"%H") % 24, ';

	$sql.= 'time_format(case when ticketend is null then timediff(now(),ticketstart) when ticketend="0000-00-00 00:00:00" then timediff(now(),ticketstart) else timediff(ticketend,ticketstart) end,"  jam %i menit %s detik")) duration3 ';
	
	$sql.=" from tickets a ";
	$sql.="left outer join (select distinct a.id from client_sites a left outer join branches_client_sites b on b.client_site_id=a.id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) b on b.id=a.client_site_id ";
	$sql.="left outer join (select distinct a.id from backbones a left outer join backbones_branches b on b.backbone_id=a.id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) c on c.id=a.backbone_id ";
	$sql.="left outer join (select distinct a.id from btstowers a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) d on d.id=a.btstower_id ";
	$sql.="left outer join (select distinct a.id from datacenters a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) e on e.id=a.datacenter_id ";
	$sql.="left outer join (select distinct a.id from ptps a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) f on f.id=a.ptp_id ";
	$sql.="left outer join (select distinct a.id from cores a left outer join branches b on b.id=a.branch_id where b.id in (".$userbranches.") ) g on g.id=a.core_id ";
	$sql.="left outer join (select distinct a.id from aps a left outer join btstowers b on b.id=a.btstower_id left outer join branches c on c.id=b.branch_id where c.id in (".$userbranches.") ) h on h.id=a.ap_id ";
	$sql.="left outer join (select count(id) trid,ticket_id from troubleshoot_requests where status='0' group by ticket_id ) i on i.ticket_id=a.id ";
	$sql.="left outer join (select count(id) hastroubleshoot,ticket_id from troubleshoot_requests group by ticket_id) j on j.ticket_id=a.id ";
	$sql.="where b.id is not null or c.id is not null or d.id is not null or e.id is not null or f.id is not null or g.id is not null or h.id is not null ";
	$sql.= "order by create_date desc limit 0,2000 ";
//	$obj = new Ticket();
	$que = $ci->db->query($sql);
	return $que->result();
//	$obj->query($sql);
//	return $obj;
}
function getservices($ticket_id){
	$sql = "select distinct b.name from tickets a left outer join clientservices b on a.client_site_id=b.client_site_id where a.id=".$ticket_id;
	$objs = new Ticket();
	$objs->query($sql);
	$arr = array();
	foreach($objs as $obj){
		array_push($arr,$obj->name);
	}
	return implode(",",$arr);
}
function ticket_populate($status=null){
	$objs = new Ticket();
	$userbranch = getuserbranches();
	if($status !== null){
		$objs->where('status',$status);
		$objs->where_in_related("client_site/branch","id",$userbranch);
		$objs->order_by('create_date','asc')->get();
		return $objs;
	}
	$objs->where_in_related("client_site/branch","id",$userbranch)->order_by('create_date','asc')->get();
	return $objs;
}
function ticket_update($params){
	$obj = new Ticket();
	if($params['status']==='1'){
		$params['ticketend'] = $obj->currentdatetime();
	}
	$obj->where('id',$params['id'])->update($params);
	return $obj->check_last_query();
}
function ticket_gettickets(){
	$ticket = new Ticket();
	$ticket->where('status','0')->get();
	return $ticket;
}
function ticket_getticket($id){
	$ticket = new Ticket();
	$ticket->where('id',$id)->get();
	return $ticket;
}
function ticket_get_ticket_by_client($type,$id){
	$ticket = new Ticket();
	$ticket->where('requesttype',$type)->where('client_id',$id)->get();
	return $ticket;		
}
function getclients(){
	$userbranch = getuserbranches();
	$clients = new Client();
	$clients->where('active','1')->where_in_related("client_site/branch","id",$userbranch)->order_by('name','asc')->get();
	return $clients;
}
function getclientsites(){
	$ci = & get_instance();
	$userbranch = getuserbranches();
	$query = "select a.id,b.id client_site_id,a.name,a.address,c.branch_id from clients a left outer join client_sites b on a.id=b.client_id ";
	$query.= "left outer join branches_client_sites c on c.client_site_id=b.id ";
	$result = $ci->db->query($query);
	$clients = $result->result();
	return $clients;
}
