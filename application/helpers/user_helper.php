<?php
function getgroups(){
	$sql = "select id,name,description from groups ";
	$ci = & get_instance();
	$que = $ci->db->query($sql);
	$arr = array();
	foreach($que->result() as $obj){
		$arr[$obj->id] = $obj->name;
	}
	return $arr;
}
function getbranches(){
	$sql = "select id,name,abbr,marketingmail,tsmail from branches ";
	$ci = & get_instance();
	$que = $ci->db->query($sql);
	$arr = array();
	foreach($que->result() as $obj){
		$arr[$obj->id] = $obj->name;
	}
	return $arr;
}
function getuserbranches(){
	$ci = & get_instance();
	$arr = array();
	$query = "select branch_id from branches_users where user_id = ".$ci->session->userdata["user_id"];
	$result = $ci->db->query($query);
	foreach($result->result() as $res){
		array_push($arr,$res->branch_id);
	}
	return $arr;
}
function getfieldbyusername($username,$field){
	$ci = & get_instance();
	$sql = "select $field from users where username='".$username."' ";
	$que = $ci->db->query($sql);
	$obj = $que->result();
	return $obj[0]->$field;
}
function getuserchildren($user_id){
	$ci = & get_instance();
	$sql = "select a.id spvid,c.id memberid from users a left outer join supervisors_users b on b.supervisor_id=a.id ";
	$sql.= "left outer join users c on c.id=b.user_id ";
	$sql.= "where a.id = " . $user_id;
	$query = $ci->db->query($sql);
	$arr = array();
	foreach($query->result() as $res){
		array_push($arr,$res->memberid);
	}
	array_push($arr,$user_id);
	return $arr;
}
function getusernamebyid($id){
	$ci = & get_instance();
	$sql = "select username from users where id=".$id." ";
	$query = $ci->db->query($sql);
	return $query->result()[0]->username;
}
function getsubordinates($user_id,&$arr){
	$sql = "select a.id,c.id sid from users a left outer join supervisors_users b on b.user_id=a.id ";
	$sql.= "left outer join users c on c.id=b.supervisor_id ";
	$sql.= "where c.id = ".$user_id." ";
	$ci = & get_instance();
	$que = $ci->db->query($sql);
	$res = $que->result();
	if(!in_array($user_id,$arr)){
		array_push($arr,$user_id);
	}
	foreach($res as $r){
		getsubordinates($r->id,$arr);
	}
	return $arr;
}
function getuserbybranch($brancharray = array("1","2","3","4")){
	$desc = "FUNGSI INI MENGHASILKAN ARRAY USER SESUAI DENGAN CABANG YANG TERDAPAT PADA ARRAY INPUT \n\n";
	$desc.= "STATUS : DIGUNAKAN DI : modules/rpt/controllers/rpt \n\n";
	$ci = & get_instance();
	$strbranch = "'".implode("','",$brancharray)."'";
	$sql = "select a.user_id from branches_users a ";
	$sql.= "where a.branch_id in (".$strbranch.")";
	$query = $ci->db->query($sql);
	$arr = array();
	foreach($query->result() as $res){
		array_push($arr,$res->user_id);
	}
	return $arr;
}
function getsalesmails($user_id){
	$desc = "FUNGSI INI MENGHASILKAN ARRAY MILIS MARKETING CABANG YANG TERASOSIASI DENGAN USER TERTENTU BERDASARKAN ID USER \n\n";
	$desc.= "STATUS: ZOMBIE\n\n";
	$sql = "select a.id,c.marketingmail from users a ";
	$SQL.= "left outer join branches_users b on b.user_id=a.id ";
	$sql.= "left outer join branches c on c.id=b.branch_id ";
	$sql.= "where a.id=".$user_id;
	$ci = & get_instance();
	$que = $ci->db->query($sql);
	$objs = $que->result();
	$arr = array();
	foreach($objs as $branch){
		echo $branch->marketingmail . "\n";
		array_push($arr,$branch->marketingmail);
	}
	return $arr;
}
function getsupervised($userid,$level){
	$desc = "FUNGSI INI MENGHASILKAN DAFTAR USER YANG DISUPERVISI OLEH USER DENGAN ID $userid \n\n";
	$desc.= "STATUS : DIPERGUNAKAN DI : modules/controllers/users dan modules/controllers/clients\n\n";
	if($level>0){
		$ci = & get_instance();
		$query = "select a.id,a.username from users a ";
		$query.= "left outer join supervisors_users b on b.user_id=a.id ";
		$query.= "where b.supervisor_id=".$userid."";
		$result = $ci->db->query($query);
		foreach($result->result() as $res){
			echo $res->id." ".$res->username." level: ".$level." spv: ".$userid."\n";
			getsupervised($res->id,$level - 1);
		}
	}
}
function checkissupervisor($spv,$usr){
	$desc = "FUNGSI INI MENGHASILKAN TRUE JIKA $spv MERUPAKAN SUPERVISOR DARI $usr , SEBALIKNYA AKAN MENGHASILKAN FALSE \n\n";
	$desc.= "STATUS : DIPERGUNAKAN DI :modules/controllers/clients\n\n";
	$ci = & get_instance();
	$query = "select * from users a left outer join supervisors_users b on b.supervisor_id = a.id ";
	$query.= "left outer join users c on c.id=b.user_id where a.id=$spv and b.user_id=$usr";
	$result = $ci->db->query($query);
	$res = $result->result();
	echo "Result count ".$result->num_rows()."\n";
	if ($result->num_rows()>0){
		echo "iya ";
		return true;
	}
	echo "bukan";
	return false;
}
function checkissupervised($usr,$spv,$counter){
	$desc = "FUNGSI INI MENGHASILKAN TRUE JIKA $usr DISUPERVISI OLEH $spv \n";
	$desc.= "STATUS : DIPERGUNAKAN DI : modules/controllers/clients\n\n";
	$ci = & get_instance();
	$query = "select a.id spvid,c.id usrid,c.username usrname from users a ";
	$query.= "right outer join supervisors_users b on b.supervisor_id = a.id ";
	$query.= "left outer join users c on c.id=b.user_id where a.id=$spv";
	$result = $ci->db->query($query);
	$res = $result->result();
	$found = false;
	foreach($res as $obj){
		if($usr === $obj->usrid){
			$found = true;
		}
	}	
	if ($found){
		return true;
	}else{
		foreach($res as $obj){
			return checkissupervised($usr,$obj->usrid,$counter);
		}
	}
}
function getuserssupervised($id){
	$desc = "FUNGSI INI MENGEMBALIKAN ARRAY SEMUA USER YANG DISUPERVISI OLEH USER DENGAN ID $id \n\n";
	$desc.= "STATUS : DIGUNAKAN OLEH: client_helper, modules/controllers/clients \n\n";
	$ci = & get_instance();
	$query = "select a.id spvid,c.id usrid,c.username usrname from users a ";
	$query.= "right outer join supervisors_users b on b.supervisor_id = a.id ";
	$query.= "left outer join users c on c.id=b.user_id where a.id='".$id."'";
	$result = $ci->db->query($query);
	$res = $result->result();
	$arr = array();
	foreach($res as $obj){
		if(!empty($obj->usrid)){
			array_push($arr,$obj->usrid);
			$arr = array_merge($arr, getuserssupervised($obj->usrid));
		}
	}
	$tx = implode(",",$arr);
	return $arr;
}
function welcomemail($username,$email,$password){
	$ci = & get_instance();
	$subject = $username;
	$mailpurpose = 'Reminder';
	$bodytext = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
	$bodytext .= '<html xmlns="http://www.w3.org/1999/xhtml">';
	$bodytext .= '<head>';
	$bodytext .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$bodytext .= '</head>';
	$bodytext .= '<body yahoo bgcolor="white">';
	$bodytext .= '<table width="100%" bgcolor="white" border="0" cellpadding="0" cellspacing="0">';
	$bodytext .= '<tr>';
	$bodytext .= '<td>';
	$bodytext .= '<table class="content" align="center" cellpadding="10" cellspacing="0" border="0" width="60%">';
	$bodytext .= '<thead>';
	$bodytext .= '<tr>';
	$bodytext .= '<td style="background-color:#FFCC00">';
	$bodytext .= '<img src="'.base_url().'img/aquarius/logo.png" alt="PadiApp" title="PadiApp"/>';
	$bodytext .= '</td>';
	$bodytext .= '</tr>';
	$bodytext .= '</thead>';
	$bodytext .= '<tbody>';
	$bodytext .= '<tr>';
	$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
	$bodytext .= '<font color="black">';
	$bodytext .= 'Dear <span style="font-family: verdana,times, serif; font-size:14pt; font-style:bold;color:#003366"><u>';
	$bodytext .= $username ;
	$bodytext .= '</u></span>,  Akun <i><b>PadiApp</b></i> anda adalah sebagai berikut:.<br />';
	$bodytext .= 'Login : '. $email .' <br /> ';
	$bodytext .= 'Password : '. $password .' <br /> ';
	$bodytext .= 'Tautan Aplikasi : https://database.padinet.com <br /> ';
	$bodytext .= '</font>';
	$bodytext .= '</td>';
	$bodytext .= '</tr>';
	$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
	$bodytext .= '<td style="text-align:center;font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
	$bodytext .= '<font color="black">';
	$bodytext .= '<a href='.$ci->config->item('baseurl').' style="text-decoration:none;padding:5px 10px;color:white;background-color:#000;">Akses PadiApp &raquo;</a>';
	$bodytext .= '</font>';
	$bodytext .= '</td>';
	$bodytext .= '</tr>';
	$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
	$bodytext .= '<td align="center" style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
	$bodytext .= '<font color="black">';
	$bodytext .= '</font>';
	$bodytext .= '</td>';
	$bodytext .= '</tr>';
	$bodytext .= '<tr bgcolor="#FFFFFF" color="white">';
	$bodytext .= '<td style="font-family:Arial, Helvetica, sans-serif;font-size:13px;">';
	$bodytext .= '<font color="black">';
	$bodytext .= 'PadiApp - Dev';
	$bodytext .= '</font>';
	$bodytext .= '</td>';
	$bodytext .= '</tr>';
	$bodytext .= '</tbody>';
	$bodytext .= '<tfoot>';
	$bodytext .= '<tr>';
	$bodytext .= '<td align="center" style="background-color:#FFCC00">';
	$bodytext .= '<p style="font-family: arial,times,serif;font-style: italic;font-size:10px;">';
	$bodytext .= 'By PadiApp 2016</p>';
	$bodytext .= '</td>';
	$bodytext .= '</tr>';
	$bodytext .= '</tfoot>';
	$bodytext .= '</table>';
	$bodytext .= '</td>';
	$bodytext .= '</tr>';
	$bodytext .= '</table>';
	$bodytext .= '</html>';	
	return $bodytext;	
}
