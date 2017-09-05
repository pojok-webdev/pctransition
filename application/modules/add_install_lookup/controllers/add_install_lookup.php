<?php 
class Add_install_lookup extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	
	function copy_survey_install(){
		$params = $this->input->post();
		$survey = new Survey_request();
		$survey->where('id',$params['survey_id'])->get();		
		$install = new Install_request();
		$install->survey_request_id = $params['survey_id'];
		$install->client_id = $survey->client_id;
		$install->service_id = $survey->service_id;
		$install->pic_name = $survey->pic_name;
		$install->pic_position = $survey->pic_position;
		$install->pic_phone_area = $survey->pic_phone_area;
		$install->pic_phone = $survey->pic_phone;
		$install->pic_email = $survey->pic_email;
		$install->username = $this->session->userdata['username'];
		$install->save();
		$install_request_id = $this->db->insert_id();
		$ssite = new Survey_site();
		$ssite->where('survey_request_id',$params['survey_id'])->get();
		
		$isite = new Install_site();
		$isite->install_request_id = $install_request_id;
		$isite->client_site_id = $ssite->client_site_id;
		$isite->address = $ssite->address;
		$isite->city = $ssite->city;
		$isite->pic = $ssite->pic;
		$isite->pic_position = $ssite->pic_position;
		$isite->pic_phone_area = $ssite->pic_phone_area;
		$isite->pic_phone = $ssite->pic_phone;
		$isite->pic_email = $ssite->pic_email;
		$isite->user_name = $this->session->userdata['username'];
		$isite->save();
		echo $install_request_id;
	}
}
