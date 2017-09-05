<?php
/* padi_helper
 * WRITTEN by PUJI W PRAYITNO
 * 062015
 * mailto:puji@padi.net.id
 * */
function padi_checklogin(){
	$ci = & get_instance();
	if(!$ci->ion_auth->logged_in()){
		redirect(base_url() . 'index.php/adm/login');
	}
}
function padi_getjson($objclass,$objtbl,$filter=null,$id=null){
	$ci = & get_instance();
	$objs = new $objclass();
	if(is_null($filter) ){
		$objs->get();
	}else{
		$objs->where($filter,$id)->get();
	}
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
function setlastsession($sess,$path){
	$ci = & get_instance();
	session_start();
	$_SESSION["sess"] = $sess;
	$_SESSION["path"] = $path;
	$_SESSION["role"] = $ci->session->userdata['role'];
}
function get_hours_array(){
	$out_array = array();
	for($c=0;$c<=24;$c++){
		for($x=strlen($c);$x<2;$x++){
			$c='0' . $c;
		}
		$out_array[$c] = $c;
	}
	return $out_array;
}
function get_minutes_array($interfal=5){
	$out_array = array();
	$c=0;
	while ($c<60) {
		for($x=strlen($c);$x<2;$x++){
			$c='0' . $c;
		}
		$out_array[$c]=$c;
		$c+=$interfal;
	}
	return $out_array;
}
function padi_getrole(){
	$ci = & get_instance();
	$sql = "select c.name from roles_users a ";
	$sql .= "left outer join users b on b.id=a.user_id ";
	$sql .= "left outer join roles c on c.id=a.role_id ";
	$sql .= "where a.user_id = " . $ci->ionuser->id;
	$query = $ci->db->query($query);
	$results = $query->result();
	return $results;
}
function padi_isrole($role){
	$ci = & get_instance();
	$sql = "select count(c.name)res from roles_users a ";
	$sql .= "left outer join users b on b.id=a.user_id ";
	$sql .= "left outer join roles c on c.id=a.role_id ";
	$sql .= "where a.user_id = " . $ci->ionuser->id . " and c.name='".$role."'";
	$query = $ci->db->query($sql);
	//echo $sql;
	$results = $query->result();
	return $results[0]->res;
}
function padi_inrole($arr = array()){
	$roles = "'".implode("','",$arr)."'";
	$ci = & get_instance();
	$ionuser = $ci->ion_auth->user()->row();
	$sql = "select count(c.name)res from roles_users a ";
	$sql .= "left outer join users b on b.id=a.user_id ";
	$sql .= "left outer join roles c on c.id=a.role_id ";
	$sql .= "where a.user_id = " . $ionuser->id . " and c.name in(".$roles.")";
	$query = $ci->db->query($sql);
	//echo $sql;
	$results = $query->result();
	if($results[0]->res>0){
		return true;
	}
	return false;
}
function padi_sendmail($message,$to,$cc = null){
	$ci = & get_instance();
	$ci->email->initialize(mailConfig());
	$ci->email->from('support@padi.net.id','PadiApp');
	$ci->email->to($to);
	if($cc){
		$ci->email->cc($cc);
	}
	$ci->email->bcc($ci->config->item('developermail'));
	$ci->email->reply_to($ci->config->item('developermail'),"PadiApp");
	$ci->email->subject('PadiApp, Akun padiApp anda ');
	$ci->email->message($message);
	if ($ci->email->send()){
		echo "send mail sukses"." \n";
	}else{
		echo $ci->email->print_debugger();
	}
}
function _padi_sendmail($message,$to){
	$ci = & get_instance();
	$ci->email->initialize(mailConfig());
	$ci->email->from('support@padi.net.id','PadiApp');
	$ci->email->to(array($ci->config->item('tsmail')));
	$ci->email->cc($ci->config->item('marketingmail'));
	$ci->email->bcc($ci->config->item('developermail'));
	$ci->email->reply_to($ci->config->item('developermail'),"PadiApp");
	$ci->email->subject('PadiApp, Akun padiApp anda ');
	$ci->email->message($message);
	if ($ci->email->send()){
		echo "send mail sukses"." \n";
	}else{
		echo $ci->email->print_debugger();
	}
}
function getvariables(){
	$ci = & get_instance();
	switch($ci->config->item('role')){
		case 'home':
			$ci->config->set_item('chat_id','219513951');
			$ci->config->set_item("baseurl","http://teknis/");
			$ci->config->set_item("smtp_host","mail.fast.net.id");
			$ci->config->set_item('tsmail','puji@padi.net.id');
			$ci->config->set_item('marketingmail','puji@padi.net.id');
			$ci->config->set_item('developermail','puji@padi.net.id');
		break;
		case 'laptop':
			$ci->config->set_item('chat_id','219513951');
			$ci->config->set_item("baseurl","http://teknis/");
			$ci->config->set_item("smtp_host","mail.padi.net.id");
			$ci->config->set_item('tsmail','puji@padi.net.id');
			$ci->config->set_item('marketingmail','puji@padi.net.id');
			$ci->config->set_item('developermail','puji@padi.net.id');
		break;
		case 'padi-customer':
			$ci->config->set_item('chat_id','219513951');
			$ci->config->set_item("baseurl","http://padi-customer/");
			$ci->config->set_item("smtp_host","mail.padi.net.id");
			$ci->config->set_item('tsmail','puji@padi.net.id');
			$ci->config->set_item('marketingmail','puji@padi.net.id');
			$ci->config->set_item('developermail','puji@padi.net.id');
		break;
		case 'simulasi':
			$ci->config->set_item('chat_id','219513951');
			$ci->config->set_item("baseurl","http://simulasi.padinet.com/");
			$ci->config->set_item("smtp_host","mail.padi.net.id");
			$ci->config->set_item('tsmail','puji@padi.net.id');
			$ci->config->set_item('marketingmail','puji@padi.net.id');
			$ci->config->set_item('developermail','puji@padi.net.id');
		break;
		case 'database':
			$ci->config->set_item('chat_id','-1001056634600');
			$ci->config->set_item("baseurl","https://database.padinet.com/");
			$ci->config->set_item("smtp_host","mail.padi.net.id");
			$ci->config->set_item('tsmail','ts@padi.net.id');
			$ci->config->set_item('marketingmail','hunter@padi.net.id');
			$ci->config->set_item('developermail','puji@padi.net.id');
		break;
	}
}
function has_right_access($module_id,$user_id){
	$sql = "select count(*) cnt from rpts_viewers ";
	$sql.= "where rpt_id = " . $module_id . " " ;
	$sql.= "and user_id = " . $user_id ;
	$ci = & get_instance();
	$query = $ci->db->query($sql);
	$result = $query->result();
	if($result[0]->cnt > 0){
		return true;
	}
	return false;
}
