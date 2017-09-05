<?php
class Medias extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library(array('common'));
	}
	function index(){
		$this->common->check_login();
		$uri = $this->uri->uri_to_assoc();
		if(isset($uri['random_string'])){
			$identifier = 'random_string';
			$identifier_value = $uri['random_string'];
		}
		if(isset($uri['id'])){
			$identifier = 'id';
			$identifier_value = $uri['id'];
		}
		$filenames = get_filenames('./uploads');
		$data = array(
			'filenames'=>$filenames,
			'identifier'=>$identifier,
			'identifier_value'=>$identifier_value
		);
		$this->load->view('index',$data);
	}
	function add(){
		$this->load->view('add');
	}
	function remove(){
		$uri = $this->uri->uri_to_assoc();
		unlink('./uploads/' . $uri['pic']);
		redirect(base_url() . 'index.php/medias/index/' . $uri['identifier'] . '/' . $uri['identifier_value']);
	}
	function upload(){
		$config['upload_path']	= './uploads/';
		$config['allowed_types']= 'jpg|jpeg|png|gif|bmp';
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload()){
			echo $this->upload->display_errors();
			echo 'error upload';
		}
		else{
			$params = $this->input->post();
			redirect(base_url() . 'index.php/medias/index/' . $params['identifier'] . '/' . $params['identifier_value']);
		}
	}
}