<?php
class Internal_messages extends CI_Controller{
	var $setting;
	var $preference;
	var $mpath;
	function __construct(){
		parent::__construct();
		Common::get_preferences();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/internal_messages/';
		$this->lang->load('padi',$this->setting['language']);
	}
	
	function check_messages($recipient_type = null){
		$message = new Internal_message();
		if(!is_null($recipient_type)){
			$message->where('recipient',$this->session->userdata['id'])->where('hasread','0')->or_where('recipient_type',$recipient_type)->get();
		}
		else 
		{
			$message->where('recipient',$this->session->userdata['id'])->where('hasread','0')->get();
		}
		$this->alertcount = $message->result_count();
	}
	
	function show_messages(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$type = (isset($uri['type']))?$uri['type']:'';
		$messages = new Internal_message();
		switch (User::get_group_id($this->session->userdata['id'])){
			case 1:
				$router='';
				break;
			case 2:
				$router = 'entry_install_request';
				break;
			case 3:
				$router = 'ts_entry_install_request';
				break;
			case 4:
				$router = 'ts_entry_install_request';
				break;
			default:
				$router = '';
				break;
		}
		
		$hasread = (isset($uri['has_read']))?$uri['has_read']:'1';
		$has_read = ($hasread == '1')?'0':'1';
		
		$messages = Internal_message::get_messages($has_read);
		$data = array(
		'view_data'=>'show_messages',
		'messages'=>$messages,'has_read'=>$has_read,
		'has_read_label'=>($has_read=='0')?'Lihat yang sudah terbaca':'Lihat yang belum terbaca',
		'set_read_label'=>($has_read=='0')?'Set sudah dibaca':'Set belum dibaca',
		'alertcount'=>Common::check_messages(),
		'read_trigger'=>($has_read == '1')?'Sudah dibaca':'Belum dibaca',
		'router'=>$router);
		$this->load->view('common/backendindex',$data);		
	}

	function handler(){
		$params = $this->input->post();
		
		if(isset($params['set_read'])){
			if(count($params['id'])==0){}else{
				$ids = implode(',',$params['id']);
				echo $params['set_read'];
				if($params['set_read']=='Set sudah dibaca'){
					Internal_message::set_array_has_read($ids,'1');
				}else{
					Internal_message::set_array_has_read($ids,'0');
				}
			}
			redirect($this->mpath . 'show_messages/page');
		}
		
		if(isset($params['read_messages'])){
			redirect($this->mpath . 'show_messages/has_read/' . $params['has_read'] . '/');
		}
	}
	
}
