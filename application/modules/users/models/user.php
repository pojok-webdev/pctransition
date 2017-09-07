<?php
class User extends CI_Model{
	var $has_one = array('preference','supervisor'=>array('class'=>'user','other_field'=>'user'));
	var $has_many = array('branch',
	'client'=>array('class'=>'client','join_self_as'=>'sale','join_other_as'=>'client','other_field'=>'user'),
	'Commodities/commodity','grade','maintenance_request','group',
	'user'=>array('class'=>'user','other_field'=>'supervisor'),'module','survey_request','install_request','troubleshoot_implementer');
	var $ci;
	var $id;
	function __construct($id = null){
		parent::__construct();
		$this->ci = & get_instance();
		$this->id = $id;
	}
	function can_change_am(){
		$ci = & get_instance();
		$sql = "select can_change_am from users where id=" . $this->id;
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res[0]->can_change_am;
	}
	function associate_supervisor_user($supervisor_id,$user_id,$identifier = 'id'){
		$sql = "insert into supervisors_users (supervisor_id,user_id) ";
		$sql.= "values (".$supervisor_id.",".$user_id.")  ";
		$que = $this->ci->db->query($sql);
		return $this->ci->db->insert_id();
	}
	function drop_user_group($id){
		$sql = "delete from users  ";
		$sql.= "where id=".$id." ";
		$que = $this->ci->db->query($sql);
		$sql = "delete from groups_users  ";
		$sql.= "where user_id=".$id." ";
		$que = $this->ci->db->query($sql);
		return $sql;
	}
	function drop_user_branch($user_id,$branch_id){
		$sql = "delete from branches_users  ";
		$sql.= "where user_id=". $user_id ." and branch_id=" . $branch_id . " ";
		$que = $this->ci->db->query($sql);
		return $sql;
	}
	function edit($params){
		$arr = array();
		foreach($params as $key=>$val){
			array_push($arr,"'".$key."'='".$val."'");
		}
		$str = implode(",",$arr);
		$sql = "update users set ".$str." ";
		$sql.= "where id='".$params["id"]."'";
		$this->ci->query($sql);
		return 'ok';
	}
	function get_last_update(){
		$sql = "select createdate from users order by createdate desc limit 1,0 ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res[0]->createdate;
	}
	function is_member_of($user_id,$group_id){
		$sql = "select count(user_id) tot from groups_users ";
		$sql.= "where group_id=".$group_id." and user_id=".$user_id." ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		if($res[0]->tot>0){
			return true;
		}
		return false;
	}
	function is_member_of_branch($user_id,$branch_id){
		$sql = "select count(user_id) tot from branches_users ";
		$sql.= "where branch_id=" . $branch_id . " ";
		$sql.= "and user_id=" . $user_id . " ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		if($res[0]->tot>0){return true;}
		return false;
	}
	function is_member_of_role($user_id,$role_id){
		$sql = "select * from roles_users where role_id=$role_id and user_id=$user_id ";
		$query = $this->ci->db->query($sql);
		if($query->num_rows>0) {
			return true;			
		}
		return false;
	}
	function is_member_of_grade($user_id,$grade_id){
		$sql = "select * from grades_users where grade_id=$grade_id and user_id=$user_id ";
		$query = $this->ci->db->query($sql);
		if($query->num_rows>0) {
			return true;			
		}
		return false;
	}
	function email_is_exist($email){
		$out = array();
		$sql = "select * from users ";
		$sql.= "where email='".$email."'";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		if($que->num_rows()>0){
			$out['username'] = $res->username;
			$out['id'] = $res->id;
			$out['email'] = $res->email;
			$out['salt'] = $res->salt;
			return $out;
		}
		echo 'false';
		return false;
	}
	function get_by_email($email){
		$sql = "select * from users ";
		$sql.= "where email='".$email."'";
		$que = $this->ci->db->query($sql);
		return $que->result();
	}
	function get_group_name($user_id){
		$sql = "select c.name from users a ";
		$sql.= "left outer join groups_users b on b.user_id=a.id ";
		$sql.= "left outer join groups c on c.id=b.group_id ";
		$sql.= "where a.id='".$user_id."'";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res->name;
	}
	function getgroupsbyid($user_id){
		$sql = "select c.name from users a ";
		$sql.= "left outer join groups_users b on b.user_id=a.id ";
		$sql.= "left outer join groups c on c.id=b.group_id ";
		$sql.= "where a.id='".$user_id."'";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;		
	}
	function get_group_id($user_id){
		$sql = "select c.id groupid from users a ";
		$sql.= "left outer join groups_users b on b.user_id=a.id ";
		$sql.= "left outer join groups c on c.id=b.group_id ";
		$sql.= "where a.id='".$user_id."'";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res->groupid;
	}
	function get_preferences($user_id){
		$sql = "select d.name,d.label,d.url from users a ";
		$sql.= "left outer join groups_users b on b.user_id=a.id ";
		$sql.= "left outer join groups c on c.id=b.group_id ";
		$sql.= "left outer join group_preferences d on d.group_id=c.id ";
		$sql.= "where a.id='".$user_id."'";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res->groupid;
		$user = new User();
		$user->where('id',$user_id)->get();
		$out = array();
		foreach ($res as $preference){
			array_push($out, $preference);
		}
		return $out;
	}
	function get_user_preferences($id){
		$sql = "select a.username,b.c, b.r, b.u,b.d from users a ";
		$sql.= "left outer join modules_users b on b.user_id=a.id ";
		$sql.= "where a.id=" . $id . " ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		$out = array('username'=>$res->username);
		foreach ($res as $module){
			$out['c'][$module->id] = $module->c;
			$out['r'][$module->id] = $module->r;
			$out['u'][$module->id] = $module->u;
			$out['d'][$module->id] = $module->d;
		}
		return $out;
	}
	function get_user_by_group($group_name){
		$sql = "select a.* from users a ";
		$sql.= "left outer join groups_users b on b.user_id=a.id ";
		$sql.= "left outer join groups c on c.id=b.group_id ";
		$sql.= "where a.active='1' and c.name = '" . $group_name . "' ";
		$sql.= "order by username asc ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
	function get_combo_data($first_row = ''){
		$out = array();
		if($first_row!=''){
			$out[0] = $first_data;
		}
		$sql = "select a.id,b.name,b.address from users a ";
		$sql.= "where active='1' ";
		$sql.= "order by name asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach ($que->result() as $res){
			$out[$res->id] = $res->username;
		}
		return $out;
	}
	function get_combo_data_by_group($group_name,$first_row = ''){
		$out = array();
		if($first_row!=''){
			$out[0] = $first_row;
		}
		$sql = "select a.id,a.username,c.name from users a ";
		$sql.= "left outer join groups_users b on b .user_id=a.id ";
		$sql.= "left outer join groups c on c.id=b.group_id ";
		$sql.= "where a.active='1' and c.name='".$group_name."' ";
		$sql.= "order by username asc ";
		$que = $this->ci->db->query($sql);
		$out = array();
		foreach ($que->result() as $res){
			$out[$res->id] = $res->username;
		}
		return $out;
	}
	function get_name_by_id($id){
		$sql = "select username from users ";
		$sql.= "where id=".$id." order by username asc";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res[0]->username;
	}
	function get_id_by_user($username){
		$sql = "select id from users ";
		$sql.= "where username=".$username." order by username asc";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res[0]->id;
	}
	function get_branches_by_id($id){
		$sql = "select b.branch_id from users a ";
		$sql.= "left outer join branches_users b on b.user_id=a.id ";
		$sql.= "where a.id=".$id." ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res[0]->branch_id;
	}
	function get_email_by_id($user_id){
		$sql = "select email from users ";
		$sql.= "where id=".$user_id." ";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res[0]->email;
	}
	function get_users(){
		$sql = "select id from users ";
		$sql.= "order by username asc";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
	function get_user_by_id($id){
		$ci = & get_instance();
		$sql = "select id from users ";
		$sql.= "where id=".$id."";
		$que = $ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
	function populate(){
		$sql = "select id from users ";
		$sql.= "where status='1' order by username asc";
		$que = $this->ci->db->query($sql);
		$res = $que->result();
		return $res;
	}
	function set_preference($user_id,$module_id, $col, $col_val){
		$query = 'select * from modules_users where user_id=' . $user_id . ' ';
		$query.= 'and module_id=' . $module_id . ' ';
		echo $query;
		$result = $this->db->query($query);
		if($result->num_rows()>0){
			$query = 'update modules_users set ' . $col . '="' . $col_val . '",user_name="' . $this->session->userdata['username'] . '" ';
			$query.= 'where module_id=' . $module_id . ' and user_id=' . $user_id ;
		}else{
			$query = 'insert into modules_users (module_id,user_id, ' . $col . ',user_name) ';
			$query.= 'values (' . $module_id . ',' . $user_id . ',"' . $col_val . '","' . $this->session->userdata['username'] . '")';
		}
		$exec = $this->db->query($query);
	}
	function update_userpic($params){
		$arr = array();
		foreach($params as $key=>$val){
			array_push($arr,"'".$key."'='".$val."'");
		}
		$str = implode(",",$arr);
		$sql = "update users set ".$str." ";
		$sql.= "where id='".$params["id"]."'";
		$this->ci->db->query($sql);
		return $sql;
	}
	function add_group($user_id,$group_id){
		$sql = "insert into groups_users ";
		$sql.= "(group_id,user_id) ";
		$sql.= "values ";
		$sql.= "('".$group_id."','".$user_id."')";
		$this->ci->db->query($sql);
		return $sql;
	}
	function remove_group($user_id,$group_id){
		$sql = "delete from groups_users ";
		$sql.= "where group_id=" . $group_id . " ";
		$sql.= "and user_id=" . $user_id . " ";
		$this->ci->db->query($sql);
		return $sql;
	}
	function add_role($user_id,$role_id){
		$sql = "insert into roles_users (role_id,user_id) values ($role_id,$user_id) ";
		$this->ci->db->query($sql);
		return $sql;
	}
	function remove_role($user_id,$role_id){
		$sql = "delete from roles_users where role_id=$role_id and user_id=$user_id ";
		$this->ci->db->query($sql);
		return $sql;
	}
	function add_branch($user_id,$branch_id){
		$sql = "insert into branches_users ";
		$sql.= "(branch_id,user_id) ";
		$sql.= "values ";
		$sql.= "(".$branch_id.",".$user_id.") ";
		$this->ci->db->query($sql);
		return $this->ci->db->num_rows();
	}
	function add_user_grade($user_id,$grade_id){
		$sql = "insert into grades_users ";
		$sql.= "(grade_id,user_id) ";
		$sql.= "values ";
		$sql.= "(".$grade_id.",".$user_id.") ";
		$this->ci->db->query($sql);
		return $this->ci->db->num_rows();
	}
	function remove_user_grade($user_id,$grade_id){
		$sql = "delete from grades_users where grade_id=$grade_id and user_id=$user_id ";
		$this->ci->db->query($sql);
		return $sql;
	}
}
