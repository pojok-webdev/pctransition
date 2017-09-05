<?php
class Calendars extends CI_Controller{
	var $user;
	function __construct(){
		parent::__construct();
		$this->load->model(array(
			'calendar',
			'Users/user',
			'Preferences/preference'
		));
		$this->load->library(array(
			'form_validation','backups','url_validation'
		));
		$this->user = new User();
		$this->user->where('id',$this->session->userdata['id'])->get();
		$this->lang->load('padi',$this->user->preference->language);
	}
	function index(){
		$this->common->check_login();
		$url = $this->uri->uri_to_assoc();
		$curmonth=(isset($url['month']))?$url['month']:1;
		$cal = new Calendar();
//		$cal->set_events($this->follow_up->get_array($curmonth));
//		$cal->set_day_color(21, 'gold');
		$filter=form_open('calendars/filter_handler');
		$filter.=form_dropdown('months',$cal->months, $curmonth);
		$curyear=(isset($url['year']))?$url['year']:1;
		$filter.=form_dropdown('years',$cal->years, $curyear);
		$filter.=form_submit('filter','Filter');
		$filter.=form_close();
//		$query = 'select count(id)cnt from clients';
//		$query.= ' where month(follow_up)=' . $url['month'] . ' and year(follow_up)=' . $url['year'];
//		$result = $this->db->query($query);
//		$cnts = $result->result();
//		$cnt = $cnts[0]->cnt;
		$header_data = array('param_info'=>$filter,'param_header'=>'Calendar');
		$data = array('calendar'=>$cal,'url'=>$url);
//		$data = array('calendar'=>$cal,'url'=>$url,'cnt'=>$cnt);
		$footer_data = array('param_menu'=>anchor(
			'front_end/logout','logout','class="button"'
		) . anchor('questions',humanize($this->lang->line('new_client')),'class="button"'
		) . anchor('reports/show_common_report','Report','class="button"'
		) . anchor('months/index/year/' . $url['year'] . '/month/' . $url['month'],'Months','class="button"')
		);

		$this->load->view('common/header',$header_data);
		$this->load->view('index',$data);		
		$this->load->view('common/footer',$footer_data);
	}
	function filter_handler(){
		$params = $this->input->post();
		redirect('calendars/index/month/' . $params['months'] . '/year/' . $params['years']);
	}
	function properties_handler(){
		$this->common->check_login();
		$url = $this->uri->uri_to_assoc();
		$params = $this->input->post();
		if(isset($params['set_page'])){
			redirect(base_url() . 'index.php/hosting_packages/index/perpage/' . $params['row_per_page'] . '/search/all/order/asc/orderby/name/page/');
		}
		if(isset($params['find'])){
			if(trim($params['search']=='')){
				$search = 'all';
			}
			else 
			{
				$search = $params['search'];
			}
			redirect(base_url() . 'index.php/hosting_packages/index/perpage/' . $params['row_per_page'] . '/search/' . $search . '/order/asc/orderby/name/page/');
		}
	}
	function add(){
		$this->common->check_login();
		$url = $this->uri->uri_to_assoc();
		$hosting_packages = new Hosting_package();
		$hosting_packages->get(); 
		$header_data = array(
			'param_title'=>$this->user_preference->get_application_name(),
			'param_header'=>$this->user_preference->get_application_name(),
			'param_sub_header'=>'Add hosting_package'
		);
		$data = array(
			'hosting_packages'=>$hosting_packages,
			'param_navigators'=>$this->navigators->get_navigators(),
			'url'=>$url,
			'statuses'=>array(0=>'Not Active',1=>'Active'),'status_id'=>1,
		);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('hosting_packages/add',$data);
		$this->load->view('common/footer',$footer_data);
	}
	function add_handler(){
		$this->common->check_login();
		$url = $this->uri->uri_to_assoc();
		$params = $this->input->post();
		$navigators = new Navigators(); 
		if(isset($params['save'])){
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('description','description','required');
			if($this->form_validation->run()==FALSE){
				
				$header_data = array(
					'param_title'=>$this->user_preference->get_application_name(),
					'param_header'=>$this->user_preference->get_application_name(),
					'param_sub_header'=>'Add User hosting_package(Please complete the boxes)');
				$data = array(
					'name'=>$params['name'],
					'description'=>$params['description'],
					'url'=>$url
				);
				$footer_data = array(
					'param_menu'=>$this->menus->get_bottom_menus()
				);
				$this->load->view('common/header',$header_data);
				$this->load->view('hosting_packages/add',$data);
				$this->load->view('common/footer',$footer_data);
			}
			else
			{
				$hosting_package = new Hosting_package();
				$hosting_package->name = $params['name'];
				$hosting_package->description = $params['description'];
				$hosting_package->save();
				redirect('hosting_packages/index/perpage/' . $params['perpage'] . '/search/all/order/asc/orderby/name/page');
			}
		}
		if(isset($params['close'])){
			redirect('hosting_packages/index/perpage/' . $params['perpage'] . '/search/all/order/asc/orderby/name/page');
		}
	}
	function edit(){
		$this->common->check_login();
		$url = $this->uri->uri_to_assoc();
		$hosting_packages = new Hosting_package();
		$hosting_packages->where('id',$url['id'])->get(); 
		$header_data = array(
			'param_title'=>$this->user_preference->get_application_name(),
			'param_header'=>$this->user_preference->get_application_name(),
			'param_sub_header'=>'Edit hosting_package');
		$data = array(
			'name'=>$hosting_packages->name,
			'singkatan'=>$hosting_packages->singkatan,
			'id'=>$hosting_packages->id,
			'param_navigators'=>$this->navigators->get_navigators(),
			'statuses'=>array(0=>'Not Active',1=>'Active'),
			'url'=>$url
		);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('hosting_packages/edit',$data);
		$this->load->view('common/footer',$footer_data);
	}
	function edit_handler(){
		$this->common->check_login();
		$params = $this->input->post();
		if(isset($params['save'])){
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('description','description','required');
			if($this->form_validation->run()==FALSE){
				$hosting_packages = new Hosting_package();
				$hosting_packages->get(); 
				$navigators = new Navigators();
				$header_data = array(
					'param_title'=>$this->user_preference->get_application_name(),
					'param_header'=>$this->user_preference->get_application_name(),
					'param_sub_header'=>'Edit User hosting_packages (Please complete the boxes)');
				$data = array(
					'hosting_packages'=>$hosting_packages,
					'param_navigators'=>$navigators->get_navigators(),
					'id'=>$params['id'],
					'name'=>$params['name'],
					'description'=>$params['description']
				);
				$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
				$this->load->view('common/header',$header_data);
				$this->load->view('hosting_packages/edit',$data);
				$this->load->view('common/footer',$footer_data);
			}
			else
			{
				$hosting_packages = new Hosting_package();
				$hosting_packages->where('id',$params['id'])->update(array(
					'name'=>$params['name'],
					'description'=>$params['description']
				)
				);
				redirect('hosting_packages/index/perpage/3/search/all/order/asc/orderby/name/page');
			}
			}
		if(isset($params['close'])){
			redirect('hosting_packages/index/perpage/3/search/all/order/asc/orderby/name/page');
		}
	}
	function backups(){
		$this->common->check_login();
		$header_data = array(
			'param_title'=>$this->user_preference->get_application_name(),
			'param_header'=>$this->user_preference->get_application_name(),
			'param_sub_header'=>'Hosting Packages (Table Dump)'
		);
		$data = array(
			'dump_text'=>$this->backups->do_backup('hosting_packages'),
			'menus'=>$this->menus->get_menus()
		);
		$footer_data = array('param_menu'=>$this->menus->get_bottom_menus());
		$this->load->view('common/header',$header_data);
		$this->load->view('hosting_packages/backup',$data);
		$this->load->view('common/footer',$footer_data);
	}
}
