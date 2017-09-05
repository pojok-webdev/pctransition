<?php
function getpics($client_id){
	$ci = & get_instance();
	$query = "select distinct id,name,hp from pics where client_id = ".$client_id."";
	$result = $ci->db->query($query);
	$obj = $result->result();
	return $obj;
}
function getfollowups($client_id){
	$ci = & get_instance();
	$sql = "select * from clientfollowups where client_id=".$client_id;
	$query = $ci->db->query($sql);
	return $query->result();
}
function gettotalfollowups($client_id){
	$ci = & get_instance();
	$sql = "select count(id) total from clientfollowups where client_id=".$client_id;
	$query = $ci->db->query($sql);
	return $query->result()[0]->total;
}