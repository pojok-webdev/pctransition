<?php
function getclient_sites($sale_id = null){
	$query = "select a.id sid,b.name,a.address ";
	$query.= "from client_sites a ";
	$query.= "left outer join clients b ";
	$query.= "on a.client_id=b.id ";
	if ($sale_id !== null) {
		$query.= "where b.sale_id = $sale_id ";
	}
	$ci = & get_instance();
	$result = $ci->db->query($query);
	$arr = array();
	foreach($result->result() as $cs){
		$arr[$cs->sid] = $cs->name . " - " . $cs->address;
		//echo $cs->sid . " " . $cs->name . $cs->address . "<br />";
	}
	return $arr;
}
