<?php
class Paps extends CI_Controller{
	var $setting;
	var $mpath;
	var $alertcount;
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/aps/';
		$this->lang->load('padi',$this->setting['language']);
	}
	function add(){
		$params = $this->input->post();
		echo Pap::add($params);
	}
	
	function getJSON(){
		$id = $this->uri->segment(3);
		$aps = Pap::getbyid($id);
		echo '{"btstower_id":"'.$aps->btstower_id.'","name":"'.$aps->name.'","ipaddr":"'.$aps->ipaddr.'","description":"'.$aps->description.'"}';
	}
	function getplus(){
		$arr = array();
		foreach(Pap::get_combo_data_plus() as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}	
	function get(){
		$arr = array();
		foreach(Pap::get_combo_data() as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
    function index(){
        $this->common->check_login();
        $this->data['objs'] = Pap::populate();
        $this->data['btses'] = Pbtstower::get_combo_data();
        $this->data['menuFeed'] = 'ap';
        $this->load->view('adm/aps', $this->data);
    }
	function show_aps(){
		$obj = new Ap();
		Common::show_object($obj, 'show_aps', 'aps');
	}
	function ap_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$ap_data = array('ap_src'=>$params['cari']);
			$this->session->set_userdata($ap_data);
			redirect($this->mpath . 'show_aps/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = $this->mpath . 'ap_execute';
				$data['query'] = 'delete from aps where id in (' . $items . ')'; 
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	function ap_execute(){
		$this->execute_action('aps', $this->mpath . 'show_ap/page');
	}
	function entry_ap(){
		Common::check_authentication();
			$uri = $this->uri->uri_to_assoc();
			$data = array('view_data'=>'entry_ap','btses'=>Pbtstower::get_combo_data());
			switch($uri['type']){
				case 'add':
					$data['id'] = '';
					$data['name'] = '';
					$data['bts'] = '';
					$data['type'] = 'add';
					$data['active'] = TRUE;
					break;
				case 'edit':
                    $obj = Pap::getbyid($uri["id"]);
//					$obj = new Ap();
//					$obj->where('id',$uri['id'])->get();
					$data['id'] = $obj->id;
					$data['name'] = $obj->name;
					$data['bts'] = $obj->btstower_id;
					$data['type'] = 'edit';
					$data['active'] = ($obj->active=='1')?TRUE:FALSE;
					break;
			}			
			$this->load->view('common/backendindex',$data);		
	}
	function entry_ap_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$aktif = (isset($params['aktif']))?'1':'0';
			$obj = new Ap();
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Add access point (' . $params['name'] . ')');
					$obj->name = $params['name'];
					$obj->btstower_id = $params['bts'];
					$obj->active = $params['active'];
					$obj->save();
					break;
				case 'edit':
					$this->access_log->insert_log('Edit Access Point (' . $params['name'] . ')');
					$obj->where('id',$params['id'])->update(array('name'=>$params['name'],
					'btstower_id'=>$params['bts'],'active'=>$params['active']));
					break;
			}
		}
		redirect($this->mpath . 'show_aps/page');
	}
	function get_name_by_bts(){
		$bts_id = $this->uri->segment(3);
		$arr = array();
		
		foreach(Pap::get_name_by_bts($bts_id) as $key=>$val){
			array_push($arr,'"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
	function get_name_by_btsname(){
		$params = $this->input->post();
		$arr = array();
		//$objs = new Ap();
		//$objs->where_related_btstowers('name',$params['btsname'])->get();
		$sql = "select id,name from aps a left outer join btstowers b on b.id=a.btstower_id ";
		$sql.= "where b.name='".$params["btsname"]."'";
		$ci = & get_instance();
		$que = $ci->db->query($sql);
		$objs = $que->result();
		foreach($objs as $obj){
			array_push($arr,'"' . $obj->id . '":"' . $obj->name . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
	function update(){
		$params = $this->input->post();
		echo Pap::update($params);
	}
}
