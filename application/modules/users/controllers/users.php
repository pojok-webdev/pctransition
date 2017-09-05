<?php
class Users extends CI_Controller{
	var $ionuser;
	function __construct(){
		parent::__construct();
		if($this->ion_auth->logged_in()){
			$this->ionuser = $this->ion_auth->user()->row();
			$this->data['user'] = User::get_user_by_id($this->ionuser->id);
		}
		$this->load->model("puser");
		$this->load->helper('user');
		$this->load->helper('padi');
		$this->load->helper("mailing");
		$this->load->helper("role");
	}
	function associate_user_group(){
		$params = $this->input->post();
		echo User::add_group($params['user_id'],$params['group_id']);
	}
	function disassociate_user_group(){
		$params = $this->input->post();
		echo User::remove_group($params['user_id'],$params['group_id']);
	}
	function associate_user_role(){
		$params = $this->input->post();
		echo User::add_role($params['user_id'],$params['role_id']);
		//echo $params['user_id'] . " " . $params['role_id'];
	}
	function disassociate_user_role(){
		$params = $this->input->post();
		echo User::remove_role($params['user_id'],$params['role_id']);
	}
	function associate_user_branch(){
		$params = $this->input->post();
		echo User::add_branch($params['user_id'],$params['branch_id']);
	}
	function disassociate_user_branch(){
		$params = $this->input->post();
		echo User::drop_user_branch($params['user_id'],$params['branch_id']);
	}
	function associate_user_grade(){
		$params = $this->input->post();
		echo User::add_user_grade($params['user_id'],$params['grade_id']);
	}
	function disassociate_user_grade(){
		$params = $this->input->post();
		echo User::remove_user_grade($params['user_id'],$params['grade_id']);
	}
	function associate_supervisor_user(){
		$params = $this->input->post();
		if ($params["supervisor_id"]===0){
			$user = new User();
			$user->where("id",$params["user_id"])->get();
			$user->supervisor->delete();
			echo $user->check_last_query();
		}else{
			echo User::associate_supervisor_user($params['supervisor_id'],$params['user_id'],$params['identifier']);
		}
	}
	function check_login(){
		if(!$this->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	function delete_by_user_id(){
		$params = $this->input->post();
		echo User::drop_user_group($params['user_id']);
	}
	function edit(){
		$this->check_login();
		$data = array(
			'golongan'=>array('0'=>'Pilihlah','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5',),
			'obj'=>User::get_user_by_id($this->uri->segment(3)),
			'roles'=>getroles(),
			'menuFeed'=>'users'
		);
		$this->load->view('adm/user_edit',$data);
	}
	function get(){
		$params = $this->input->post();
		$obj = new User();
		$obj->where('id',$params['id'])->get();
		$arr = array();
		foreach($this->db->list_fields('users') as $field){
			array_push($arr,'"'.$field.'":"'.$obj->$field.'"');
		}
		echo '{'.implode(",",$arr).'}';
	}
	function save(){
		$params = $this->input->post();
		$obj = new User();
		$salt_length = 10;
		$oripass = $params['password'];
		$salt = substr(md5(uniqid(rand(), true)), 0, $salt_length);
		$params['password'] = $salt . substr(sha1($salt . $params['password']), 0, -$salt_length);

		foreach($params as $key=>$val){
			$obj->$key = $val;
		}
		$obj->save();
		
		$group = new Group();
		$group->where('id',$params['group_id'])->get();
		$branch = new Branch();
		$branch->where('id',$params['branch_id'])->get();
		$usr = new User();
		$usr->where('id',$this->db->insert_id())->get();
		$usr->save($group);
		$usr->save($branch);
		$this->sendmail($params['username'],$params['email'],$oripass);
		//$query = "insert into groups_users (group_id,user_id) values ($group_id,) ";
	}
	function update(){
		$params = $this->input->post();
		echo User::edit($params);
	}
	function updatepassword(){
		$params = $this->input->post();
		$this->load->model('ion_auth_model');
		$i = new Ion_auth_model();
		echo $i->reset_password($params['email'],$params['newpassword']);

	}
	function index(){
		$this->check_login();
		$data = array(
			'objs'=>Puser::populate(),
			'menuFeed'=>'users',
			'groups'=>getgroups(),
			'branches'=>getbranches(),
		);
		$this->load->view('adm/users',$data);
	}
	function nodeview(){
		$this->check_login();
		$data = array(
			'objs'=>User::populate(),
			'menuFeed'=>'users'
		);
		$this->load->view('adm/usersnodes',$data);
		//$this->load->view('adm/nodeview');
	}
	function dbUserJsonAutocomplete(){
		$user = puser::populate();
		$userarray = array();
		foreach($user as $usr){
			array_push($userarray,'"'.$usr->username.'":"'.$usr->username.'"');
		}
		echo "" . implode(",",$userarray) . "";
	}
	function dbUserJson(){
		$user = puser::populate();
		$userarray = array();
		foreach($user as $usr){
			array_push($userarray,'{"id":"'.$usr->username.'","group":"nodes"}');
			if($usr->supervisor->username!=NULL){
				array_push($userarray,'{"id":"'.$usr->username.'_'.$usr->supervisor->username.'","group":"edges","source":"'.$usr->supervisor->username.'","target":"'.$usr->username.'"}');
			}
		}
		echo "[" . implode(",",$userarray) . "]";
	}
	function userJson(){
		echo '['
				. '{"id":"sisca","group":"nodes"},'
				. '{"id":"felix","group":"nodes"},'
				. '{"id":"ketut","group":"nodes"},'
				. '{"id":"reinhard","group":"nodes"},'
				. '{"id":"ruri","group":"nodes"},'
				. '{"id":"naning","group":"nodes"},'
				. '{"id":"jami","group":"nodes"},'
				. '{"id":"amir","group":"nodes"},'
				. '{"id":"puji","group":"nodes"},'
				. '{"id":"arif","group":"nodes"},'
				. '{"id":"sisca_felix","source":"sisca","target":"felix","group":"edges"},'
				. '{"id":"sisca_ketut","source":"sisca","target":"ketut","group":"edges"},'
				. '{"id":"sisca_ruri","source":"sisca","target":"ruri","group":"edges"},'
				. '{"id":"sisca_naning","source":"sisca","target":"naning","group":"edges"},'
				. '{"id":"sisca_jami","source":"sisca","target":"jami","group":"edges"},'
				. '{"id":"sisca_reinhard","source":"sisca","target":"reinhard","group":"edges"},'
				. '{"id":"ketut_amir","source":"ketut","target":"amir","group":"edges"},'
				. '{"id":"jami_arif","source":"jami","target":"arif","group":"edges"},'
				. '{"id":"reinhard_puji","source":"reinhard","target":"puji","group":"edges"},'
				. '{"id":"ketut_reinhard","source":"ketut","target":"reinhard","group":"edges"}'
				. ']';
	}
	function singleUserJson(){
		$params = $this->input->post();
		$params["username"] = "puji";
		$usr = puser::getbyname($params['username']);
		//$usr->where('username',$params['username'])->get();
		$str = '';
		$arr = array();
		foreach($this->db->list_fields('users') as $field){
			echo "FIELD ".$field . "\n";
			array_push($arr,'"' . $field . '":"' . $usr->$field . '"');
		}
		array_push($arr,'"supervisor":"'.$usr->spv.'"');
		echo '{' . implode(',',$arr) . '}';
	}      
	function getsupervised(){
		$spv = $this->uri->segment(3);
		$query = "select a.id,a.username from users a left outer join supervisors_users b on b.user_id=a.id where b.supervisor_id=".$spv."";
		$result = $this->db->query($query);
		foreach($result->result() as $res){
			echo $res->id." ".$res->username."<br />";
		}
	}  
	function getsupervise(){
		$id = $this->uri->segment(3);
		getsupervised($id,3);
	}
	function sendmail($username,$email,$password){
		padi_sendmail(welcomemail($username,$email,$password),$email);
	}
}
