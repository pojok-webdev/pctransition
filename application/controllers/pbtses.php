<?php
class Pbtses extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("pbtstower");
    }
    function btses(){
        $this->check_login();
        $this->data['objs'] = Btstower::populate();
        $this->data['branches'] = Branch::get_combo_data();
        $this->data['menuFeed'] = 'bts';
        $this->load->view('adm/btses', $this->data);
    }
    function btssave(){
        $this->load->model(pbtstower);
        $params = $this->input->post();
        echo pbtstower::add($params);
    }
    function feed(){
        $term = $_GET[ "term" ];
        $this->load->model("pbts");
        $objs = $this->pbts->getbts();
        $arr = array();
        foreach($objs as $obj){
            array_push($arr,array("label"=>$obj->name,"value"=>$obj->id));
        }
        $companies = $arr;
        $result = array();
        foreach ($companies as $company) {
            $companyLabel = $company[ "label" ];
            if ( strpos( strtoupper($companyLabel), strtoupper($term) )!== false ) {
                array_push( $result, $company );
            }
        }
        echo json_encode( $result );
    }	
    function index(){
        $this->common->check_login();
        $this->data['objs'] = Pbtstower::populate();
        $this->data['branches'] = Branch::get_combo_data();
        $this->data['menuFeed'] = 'bts';
        $this->load->view('adm/btses', $this->data);        
    }
	function add(){
        $this->load->model("pbtstower");
        $params = $this->input->post();
        echo pbtstower::add($params);
	}	
	function show_bts(){
		$btses = new Btstower();
		Common::show_object($btses, 'bts_management', 'btses');
	}
	function entry_bts(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$page = ($uri['page']=='')?$uri['page']:'0';
		$data = array('view_data'=>'entry_bts','page'=>$uri['page']);
		switch($uri['type']){
			case 'add':
				$data['id'] = '';
				$data['name'] = '';
				$data['description'] = '';
				$data['type'] = 'add';
				$data['aktif'] = TRUE;
				break;
			case 'edit':
				$bts = new Btstower();
				$bts->where('id',$uri['id'])->get();
				$data['id'] = $bts->id;
				$data['name'] = $bts->name;
				$data['description'] = $bts->description;
				$data['type'] = 'edit';
				$data['aktif'] = ($bts->aktif=='1')?TRUE:FALSE;
				break;
		}		
		$this->load->view('common/backendindex',$data);
	}
	function entry_bts_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['save_x'])){
			$bts = new Btstower();
			switch ($params['type']){
				case 'add':
					$this->access_log->insert_log('Entry bts (' . $params['name'] . ')');
					$bts->name = $params['name'];
					$bts->user_name = $this->session->userdata['username'];
					$bts->save();
					break;
				case 'edit':
					$this->access_log->insert_log('Edit bts (' . $params['name'] . ')');
					$bts->where('id',$params['id'])->update(array('name'=>$params['name']));
					break;
			}
		}
		redirect($this->mpath . 'show_bts/page');
	}
	function bts_handler(){
		Common::check_authentication();
		$params = $this->input->post();
		if(isset($params['btn_cari'])){
			$bts_data = array('bts_src'=>$params['cari']);
			$this->session->set_userdata($bts_data);
			redirect($this->mpath . 'show_bts/page');
		}
		if(isset($params['remove_x'])){
			if(isset($params['id'])){
				$data['view_data'] = 'confirmation';
				$items = implode(',',$params['id']);
				$data['action'] = base_url() . 'index.php/back_end/bts_execute';
				$data['query'] = 'delete from btstowers where id in (' . $items . ')'; 
				$data['message'] = 'Apakah akan menghapus item no ' . $items . ' ?';
				$this->load->view('common/backendindex',$data);
			}
		}
	}
	function bts_execute(){
		$this->execute_action('status', $this->mpath . 'show_status/page');
	}
	function get(){
		$arr = array();
		foreach(Btstower::get_combo_data() as $key=>$val){
			array_push($arr, '"' . $key . '":"' . $val . '"');
		}
		$out = implode(',',$arr);
		$out = '{' . $out . '}';
		echo $out;
	}
	function getJSONBts(){
		$id = $this->uri->segment(3);
		$arr = array();
        $sql = "select id,branch_id,name,location,description from btstowers ";
        $sql.= "where id=".$id;
        $que = $this->db->query($sql);
        $res = $que->result();
        $obj = $res[0];
		$out = '{"branch_id":"'.$obj->branch_id.'","name":"' . $obj->name . '","location":"' . $obj->location . '","description":"' . $obj->description . '"}';
		echo $out;
	}
    function remove(){
        $ci = & get_instance();
        $params = $this->input->post();
        $sql = "delete from btstowers ";
        $sql.= "where id = " . $params["id"];
        $que = $ci->db->query($sql);
    }
	function update(){
		$params = $this->input->post();
		echo Pbtstower::edit($params);
	}
}