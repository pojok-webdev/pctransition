<?php
class Install_file extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	
	function save_file($params){
		$upload_config['upload_path']	=	'./media/installs';
		$upload_config['allowed_types']	=	'pdf|doc|xls|docx|xlsx';
		$upload_config['max_size']		=	'1024';
		$upload_config['max_width']		=	'1024';
		$upload_config['max_height']	=	'768';
		$this->load->library('upload',$upload_config);
		if(!$this->upload->do_upload())
		{
			echo 'error';
		}
		else 
		{
			$upload_data = $this->upload->data();
			$upload_data['install_id'] = $params['install_id'];
			$upload_data['ftype'] = $params['ftype'];
			$upload_data['file_description'] = $params['file_description'];
			Install_file::insert_file($upload_data);
			
		}
		
	}
	
	function insert_file($params){
		$file = new Install_file();
		$file->name = $params['orig_name'];
		$file->install_request_id = $params['install_id'];
		$file->ftype = $params['ftype'];
		$file->description = $params['file_description'];
		$file->user_name = $this->session->userdata['username'];
		$file->save();
	}
	
	function get_files_by_ftype($install_id,$ftype){
		$files = new Install_file();
		$files->where('install_request_id',$install_id)->where('ftype',$ftype)->get();
		return $files;
	}
}