<?php
class Access_logs extends CI_Controller{
	var $mpath;
	var $setting;
	function __construct(){
		parent::__construct();
		$this->setting = Common::get_web_settings();
		$this->mpath = base_url() . 'index.php/access_logs/';
	}

	function show_access_log(){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$per_page = 10;
		$segment = ($uri['page']=='')?0:$uri['page'];
		$acl_src=(isset($this->session->userdata['acl_src']))?$this->session->userdata['acl_src']:'';
		$access_log = new Access_log();
		$access_log->like('action',$acl_src)->order_by('create_date','desc')->get($per_page,$segment);
		$total = $access_log->like('action',$acl_src)->count();
		$page_conf = $this->common->get_common_pagination_conf($this->mpath . 'show_access_log/page',4,$per_page,$total);
		$this->pagination->initialize($page_conf);
		$data = array(
			'view_data'=>'access_log',
			'access_logs'=>$access_log,
			'segment'=>$segment,
			'total'=>$total,
			'page'=>($segment/$per_page)+1,
			'page_count'=>ceil($total/$per_page)
		);
		$this->load->view('common/backendindex',$data);
	}

}
