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
function get_client_site_by_id($id){
	$obj = new Client_site($id);
	return $obj->get_obj_by_id()[0];
}
function getbusinessfieldcombodata($id){
	$obj = new Client_site();
	return $obj->getbusinessfieldcombodata($id);
}
function get_branch_combo_data(){
	$obj = new Client_site();
	return $obj->get_branch_combo_data();
}
function get_branches_handling($id){
	$obj = new Client_site($id);
	return $obj->get_branches_handling();
}
function get_service_combo_data($first_row="Pilihlah"){
	$obj = new Client_site();
	return $obj->get_service_combo_data($first_row);
}
function get_clientservices($id){
	$obj = new Client_site($id);
	return $obj->get_clientservices();
}
function getproducts(){
	$obj = new Pproduct();
	return $obj->getproducts();
}
function getbusiness(){
	$obj = new Pproduct();
	return $obj->business();	
}