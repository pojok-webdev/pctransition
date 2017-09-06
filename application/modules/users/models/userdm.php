<?php
class User extends DataMapper{
	var $has_one = array('preference','supervisor'=>array('class'=>'user','other_field'=>'user'));
	var $has_many = array('branch',
	'client'=>array('class'=>'client','join_self_as'=>'sale','join_other_as'=>'client','other_field'=>'user'),
	'Commodities/commodity','grade','maintenance_request','group',
	'user'=>array('class'=>'user','other_field'=>'supervisor'),'module','survey_request','install_request','troubleshoot_implementer');
	function __construct(){
		parent::__construct();
	}
	function associate_supervisor_user($supervisor_id,$user_id,$identifier = 'id'){
		$user = new User();
		$user->where($identifier,$user_id)->get();
		$spv = new User();
		$spv->where($identifier,$supervisor_id)->get();
		$spv->save($user);
		return $user->check_last_query();
	}
	function drop_user_group($id){
		$user = new User();
		$user->where('id',$id)->get();
		$group = new Group();
		$group->get();
		$user->delete($group->all);
		return $user->check_last_query();
	}
	function drop_user_branch($user_id,$branch_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		$branch = new Branch();
		$branch->where('id',$branch_id)->get();
		$user->delete($branch);
		return $user->check_last_query();
	}
	function edit($params){
		$obj = new User();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	function get_last_update(){
		$user = new User();
		$user->order_by('createdate','desc')->get(1,0);
		return $user->create_date;
	}
	function is_member_of($user_id,$group_id){
		$user = new User();
		$user->where('id',$user_id);
		$user->where_related_group('id',$group_id)->get();
		if($user->result_count()>0){
			return true;
		}
		return false;
	}
	function is_member_of_branch($user_id,$branch_id){
		$user = new User();
		$user->where('id',$user_id);
		$user->where_related_branch('id',$branch_id)->get();
		if($user->result_count()>0){
			return true;
		}
		return false;
	}
	function is_member_of_role($user_id,$role_id){
		$ci = & get_instance();
		$sql = "select * from roles_users where role_id=$role_id and user_id=$user_id ";
		$query = $ci->db->query($sql);
		if($query->num_rows>0) {
			return true;
			
		}
		return false;
	}
	function is_member_of_grade($user_id,$grade_id){
		$user = new User();
		$user->where('id',$user_id);
		$user->where_related_grade('id',$grade_id)->get();
		if($user->result_count()>0){
			return true;
		}
		return false;
	}
	function email_is_exist($email){
		$user = new User();
		$user->where('email',$email)->get();
		if($user->count()>0){
			$out['username'] = $user->username;
			$out['id'] = $user->id;
			$out['email'] = $user->email;
			$out['salt'] = $user->salt;
			return $out;
		}
		else
		{
			echo 'False';
			return FALSE;
		}
	}
	function get_by_email($email){
		$user = new User();
		$user->where('email',$email)->get();
		return $user;
	}
	function get_group_name($user_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		return $user->group->name;
	}
	function get_group_id($user_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		return $user->group->id;
	}
	function get_preferences($user_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		$out = array();
		foreach ($user->group->group_preference as $preference){
			array_push($out, $preference);
		}
		return $out;
	}
	function get_user_preferences($id){
		$user = new User();
		$user->where('id',$id)->get();
		$user->module->include_join_fields()->get();
		$out = array('username'=>$user->username);
		foreach ($user->module as $module){
			$out['c'][$module->id] = $module->join_c;
			$out['r'][$module->id] = $module->join_r;
			$out['u'][$module->id] = $module->join_u;
			$out['d'][$module->id] = $module->join_d;
		}
		return $out;
	}
	function get_user_by_group($group_name){
		$users = new User();
		$users->where('active','1')->where_related_group('name',$group_name)->order_by('username','asc')->get();
		return $users;
	}
	function get_combo_data($first_row = ''){
		$users = new User();
		$users->order_by('username','asc')->get();
		$out = array();
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach ($users as $user){
			$out[$user->id] = $user->username;
		}
		return $out;
	}
	function get_combo_data_by_group($group_name,$first_row = ''){
		$users = new User();
		$users->where_related_group('name',$group_name)->order_by('username','asc')->get();
		$out = array();
		if($first_row!=''){
			$out[0] = $first_row;
		}
		foreach ($users as $user){
			$out[$user->id] = $user->username;
		}
		return $out;
	}
	function get_name_by_id($id){
		$user = new User();
		$user->where('id',$id)->order_by('username','asc')->get();
		return $user->username;
	}
	function get_id_by_user($username){
		$user = new User();
		$user->where('username',$username)->order_by('username','asc')->get();
		return $user->id;
	}
	function get_branchs_by_id($id){
		$user = new User();
		$user->where('id',$id)->get();
		return $user->branch->id;
	}
	function get_email_by_id($user_id){
		$user = new User();
		$user->where('id',$user_id)->order_by('username','asc')->get();
		return $user->email;
	}
	function get_users(){
		$users = new User();
		$users->order_by('username','asc')->get();
		return $users;
	}
	function get_user_by_id($id){
		$obj = new User();
		$obj->where('id',$id)->order_by('username','asc')->get();
		return $obj;
	}
	function populate(){
		$obj = new User();
		$obj->where('status','1')->order_by('username','asc')->get();
		return $obj;
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
		$obj = new User();
		$obj->where('id',$params['id'])->update($params);
		return $obj->check_last_query();
	}
	function add_group($user_id,$group_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		$group = new Group();
		$group->where('id',$group_id)->get();
		$group->save($user);
		return $user->check_last_query();
	}
	function remove_group($user_id,$group_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		$group = new Group();
		$group->where('id',$group_id)->get();
		$user->delete($group);
		return $user->check_last_query();
	}
	function add_role($user_id,$role_id){
		$ci = & get_instance();
		$sql = "insert into roles_users (role_id,user_id) values ($role_id,$user_id) ";
		$ci->db->query($sql);
		return $sql;
	}
	function remove_role($user_id,$role_id){
		$ci = & get_instance();
		$sql = "delete from roles_users where role_id=$role_id and user_id=$user_id ";
		$ci->db->query($sql);
		return $sql;
	}
	function add_branch($user_id,$branch_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		$branch = new Branch();
		$branch->where('id',$branch_id)->get();
		$branch->save($user);
		return $user->check_last_query();
	}
	function add_user_grade($user_id,$grade_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		$grade = new Grade();
		$grade->where('id',$grade_id)->get();
		$grade->save($user);
		return $user->check_last_query();
	}
	function remove_user_grade($user_id,$grade_id){
		$user = new User();
		$user->where('id',$user_id)->get();
		$grade = new Grade();
		$grade->where('id',$grade_id)->get();
		$user->delete($grade);
		return $user->check_last_query();
	}
}
