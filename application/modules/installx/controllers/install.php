<?php 
class Install extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->lang->load('padi','indonesia');
	}
	function index(){
		switch ($this->uri->segment(3)){
			case 'database_setting':
				$header_data = array('param_title'=>'Database Setting','param_header'=>'Database Setting');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/database_setting');
				$this->load->view('common/footer');
				break;
			case 'write_configuration':
				$header_data = array('param_title'=>'Write Configuration','param_header'=>'Write Configuration');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/write_configuration');
				$this->load->view('common/footer');
				break;
			case 'create_tables':
				$header_data = array('param_title'=>'Create Tables','param_header'=>'Create Tables');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/create_tables');
				$this->load->view('common/footer');
				break;
			case 'restore_dump':
				$header_data = array('param_title'=>'Restore Dump','param_header'=>'Restore Dump');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/restore_dump');
				$this->load->view('common/footer');
				break;
			case 'create_admin':
				$header_data = array('param_title'=>'Create Admin','param_header'=>'Create Admin');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/create_admin');
				$this->load->view('common/footer');
				break;
		}
	}
	function handler(){
		$params = $this->input->post();
		switch ($params['step']){
			case 'database_setting':
				if($this->database_setting()){
					if($this->write_database()){
						redirect('install/index/write_configuration');
					}
					else{
						echo 'database file should be writable ...';
					}
				}
				break;
			case 'write_configuration':
				if($this->write_library_autoload()){
					redirect('install/index/create_tables');
				}
				break;
			case 'create_tables':
				if($this->write_library_autoload()){
					if($this->create_tables()){
						redirect('install/index/restore_dump');
					}
				}
				break;
			case 'restore_dump':
				if($this->write_library_autoload()){
					if($this->restore_dump()){
						redirect('install/index/create_admin');
					}
				}
				break;
			case 'create_admin':
				$this->create_admin();
				if(!$this->write_model_autoload()){
					echo 'autoload file should be writable ...';
					break;
				}
				if(!$this->write_config()){
					echo 'config file should be writable ...';
					break;
				}
				$header_data = array('param_title'=>'Installation Success','param_header'=>'Installation Success');
				$this->load->view('common/header',$header_data);
				$this->load->view('install/installation_success');
				break;
		}
	}
	function write_database(){
		$params = $this->input->post();
		$data='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$active_group = \'default\';
		$active_record = TRUE;
		$db[\'default\'][\'hostname\'] = \'' . $params['server']. '\';
		$db[\'default\'][\'username\'] = \'' . $params['username'] . '\';
		$db[\'default\'][\'password\'] = \'' . $params['password'] . '\';
		$db[\'default\'][\'database\'] = \'' . $params['database'] . '\';
		$db[\'default\'][\'dbdriver\'] = \'mysql\';
		$db[\'default\'][\'dbprefix\'] = \'\';
		$db[\'default\'][\'pconnect\'] = TRUE;
		$db[\'default\'][\'db_debug\'] = TRUE;
		$db[\'default\'][\'cache_on\'] = FALSE;
		$db[\'default\'][\'cachedir\'] = \'\';
		$db[\'default\'][\'char_set\'] = \'utf8\';
		$db[\'default\'][\'dbcollat\'] = \'utf8_general_ci\';
		$db[\'default\'][\'swap_pre\'] = \'\';
		$db[\'default\'][\'autoinit\'] = TRUE;
		$db[\'default\'][\'stricton\'] = FALSE;';
		if(write_file('./application/config/database.php',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function write_config(){
		$data='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$config[\'base_url\']	= \'\';
		$config[\'index_page\'] = \'index.php\';
		$config[\'uri_protocol\']	= \'AUTO\';
		$config[\'url_suffix\'] = \'\';
		$config[\'language\']	= \'english\';
		$config[\'charset\'] = \'UTF-8\';
		$config[\'enable_hooks\'] = FALSE;
		$config[\'subclass_prefix\'] = \'MY_\';
		$config[\'permitted_uri_chars\'] = \'a-z 0-9~%.:_\-\';
		$config[\'allow_get_array\']		= TRUE;
		$config[\'enable_query_strings\'] = FALSE;
		$config[\'controller_trigger\']	= \'c\';
		$config[\'function_trigger\']		= \'m\';
		$config[\'directory_trigger\']	= \'d\'; // experimental not currently in use
		$config[\'log_threshold\'] = 0;
		$config[\'log_path\'] = \'\';
		$config[\'log_date_format\'] = \'Y-m-d H:i:s\';
		$config[\'cache_path\'] = \'\';
		$config[\'encryption_key\'] = \'padi internet\';
		$config[\'sess_cookie_name\']		= \'ci_session\';
		$config[\'sess_expiration\']		= 7200;
		$config[\'sess_expire_on_close\']	= FALSE;
		$config[\'sess_encrypt_cookie\']	= FALSE;
		$config[\'sess_use_database\']	= TRUE;
		$config[\'sess_table_name\']		= \'ci_sessions\';
		$config[\'sess_match_ip\']		= FALSE;
		$config[\'sess_match_useragent\']	= TRUE;
		$config[\'sess_time_to_update\']	= 300;
		$config[\'cookie_prefix\']	= "";
		$config[\'cookie_domain\']	= "";
		$config[\'cookie_path\']		= "/";
		$config[\'cookie_secure\']	= FALSE;
		$config[\'global_xss_filtering\'] = FALSE;
		$config[\'csrf_protection\'] = FALSE;
		$config[\'csrf_token_name\'] = \'csrf_test_name\';
		$config[\'csrf_cookie_name\'] = \'csrf_cookie_name\';
		$config[\'csrf_expire\'] = 7200;
		$config[\'compress_output\'] = FALSE;
		$config[\'time_reference\'] = \'local\';
		$config[\'rewrite_short_tags\'] = FALSE;
		$config[\'proxy_ips\'] = \'\';';
		if(write_file('./application/config/config.php',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function write_library_autoload(){
		$data ='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$autoload[\'packages\'] = array(APPPATH.\'third_party\');
		$autoload[\'libraries\'] = array(\'database\',\'datamapper\',\'pagination\',\'session\',\'common\',\'auth\',\'authentication\',\'email\');
		$autoload[\'helper\'] = array(\'url\',\'form\',\'date\',\'file\',\'directory\');
		$autoload[\'config\'] = array();
		$autoload[\'language\'] = array();
		$autoload[\'model\'] = array();';
		if(write_file('./application/config/autoload.php',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function write_model_autoload(){
		$data ='<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');
		$autoload[\'packages\'] = array(APPPATH.\'third_party\');
		$autoload[\'libraries\'] = array(\'database\',\'datamapper\',\'pagination\',\'session\',\'common\',\'auth\',\'authentication\',\'email\');
		$autoload[\'helper\'] = array(\'url\',\'form\',\'date\',\'file\',\'directory\');
		$autoload[\'config\'] = array();
		$autoload[\'language\'] = array();
		$autoload[\'model\'] = array();';
		if(write_file('./application/config/autoload.php',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	function database_setting(){
		$params = $this->input->post();
		if(mysql_connect($params['server'],$params['username'],$params['password'])){
			return TRUE;
		}
		else{
			return FALSE;
		}
		
	}
	function create_tables(){
		$db_prefix='';
		
		$query = 'drop table if exists ' . $db_prefix . 'ci_sessions; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop ci_sessions error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'ci_sessions ';
		$query.= '(session_id varchar(40) primary key default 0,ip_address varchar(16) default 0,user_agent varchar(100), last_activity int(10) unsigned default 0, user_data text)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table ci_sessions error ...<br />';
			return false;
		}
		
		$query = 'drop table if exists ' . $db_prefix . 'users; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop table users error <br />';
			return false;
		}
		$query = 'create table ' . $db_prefix . 'users ';
		$query.= '(id int primary key auto_increment,';
 		$query .='group_id int default 1,';
 		$query .='createdate timestamp,';
 		$query .='username varchar(40),';
 		$query .='email varchar(50),';
 		$query .='password varchar(40),';
 		$query .='salt varchar(40),'; 
 		$query .='status varchar(1) default "1")';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table users error <br />';
			return false;
		}

		$query = 'drop table if exists MGKBMKAS ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop MGKBMKAS error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table MGKBMKAS ';
			$query .='(IDMCABANG int primary key ,';
			$query .='IDMKAS int primary key,';
			$query .='KDKAS varchar(20), ';
			$query .='NMKAS varchar(50), ';
			$query .='TGLTSAKAS double, ';
			$query .='IDMUSERCREATE int(11), ';
			$query .='TGLCREATE timestamp, ';
			$query .='IDMCABANGMUSERUPDATE varchar(50), ';
			$query .='IDMUSERUPDATE int(11), ';
			$query .='TGLUPDATE timestamp, ';
			$query .='COUNTEREDIT int(11), ';
			$query .='AKTIF smallint(6), ';
			$query .='HAPUS smallint(6), ';
			$query .='KETERANGAN varchar(255) ';
			$query .=')';
			

			$result = $this->db->query($query);
			if(!$result){
				echo 'Create Positions error';
				return FALSE;
			} 
			
			
		}
		
		$query = 'drop table if exists preferences ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop preferences error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table preferences ';
			$query .='(id int primary key auto_increment,';
			$query .='user_id int, ';
			$query .='createdate timestamp,';
			$query .='language varchar(10) default "indonesia",';
			$query .='row_per_page varchar(2) default "10",';
			$query .='phone_area varchar(7) default "031",';
			$query .='application_name varchar(60) default "Telemarketing",';
			$query .='default_page varchar(60) default "calendars/index/month/1/year/2012",';
			$query .='theme_id int default 1';
			$query.= ')';
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create preferences error';
				return FALSE;
			} 
		}

		$query ='drop trigger if exists usr_pref ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop usr_pref error';
			return FALSE;
		}		
		else 
		{
			$query ='create trigger usr_pref ';
			$query.='after insert on users ';
			$query.='for each row ';
			$query.='begin ';
			$query.='insert into preferences (user_id) values (new.id);';
			$query.='end';
			$result=$this->db->query($query);
			if(!$result){
				echo 'Create trigger error';
				return FALSE;
			} 
		}
		
		$query = 'drop table if exists themes ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop themes error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table themes ';
			$query .='(id int primary key auto_increment,';
			$query .='createdate timestamp,';
			$query .='name varchar(30), ';
			$query .='description varchar(50)';
			$query.= ')';
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create themes error';
				return FALSE;
			} 
		}
		
		$query = 'drop table if exists ' . $db_prefix . 'modules; ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'drop modules error ...<br />';
			return false;
		}
		
		$query = 'create table ' . $db_prefix . 'modules ';
		$query.= '(id int primary key auto_increment,createdate timestamp,name varchar(50),state varchar(1) default 0 comment "status of this modul",chapter_description  text)';
		$result = $this->db->query($query);
		if(!$result){
			echo 'create table modules error ...<br />';
			return false;
		}
		$query = 'drop table if exists MGMRUMAH ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop MGMRUMAH error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table MGMRUMAH ';
			$query .='(IDMCABANG 	int primary key ,';
			$query .='id 		int primary key,';
			$query .='KDMRUMAH 		varchar(20),';
			$query .='NMMRUMAH 		varchar(50),';
			$query .='STATUS 		varchar(50),';
			$query .='TGLMULAI 		timestamp, ';
			$query .='IDMCABANGMPML int,';
			$query .='IDMPML 		int,';
			$query .='IDMCABANGMAGEN int,';
			$query .='IDMAGEN 		int,';
			$query .='ALAMAT 		varchar(255),';
			$query .='NOBLOK 		varchar(255),';
			$query .='KOTA 			varchar(255),';
			$query .='PROPINSI 		varchar(255),';
			$query .='TIPE 			varchar(255),';
			$query .='LT 			int,';
			$query .='LB 			int,';
			$query .='TINGKAT 		int,';
			$query .='HARGA 		double,';
			$query .='KTIDUR 		int,';
			$query .='KMANDI 		int,';
			$query .='SURAT 		varchar(255),';
			$query .='HADAP 		varchar(255),';
			
			$query .='LANTAI 		varchar(255),';
			$query .='PLT 			int,';
			$query .='LLT int,';
			$query .='PLB int,';
			$query .='LLB int,';
			$query .='LISTRIK int,';
			$query .='TELEPON int,';
			$query .='AIR varchar(255),';
			$query .='DBERSIH smallint,';
			$query .='DKOTOR smallint,';
			$query .='CARPORT int,';
			$query .='GARASI int,';

			$query .='RTAMU int,';
			$query .='RKELUARGA int,';
			$query .='RMAKAN int,';
			$query .='KTIDURPEMBANTU int,';
			$query .='KMANDIPEMBANTU int,';
			$query .='GAMBAR1 varchar(255),';
			$query .='GAMBAR2 varchar(255),';
			$query .='IDMUSERCREATE int,';
			$query .='TGLCREATE timestamp,';
			$query .='IDMCABANGMUSERUPDATE int,';
			$query .='IDMUSERUPDATE int,';
			$query .='TGLUPDATE timestamp,';
			$query .='COUNTEDIT int,';
			$query .='AKTIF smallint,';
			$query .='HAPUS smallint(1),';
			
			
			$query .='KETERANGAN varchar(255) default "1"';
			$query .=' )';
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create MGMRUMAH error';
				return FALSE;
			} 
			
			
		}
		$query = 'drop table if exists pics ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop PICs error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table pics ';
			$query .='(id int primary key auto_increment,';
			$query .='client_id int,';
			$query .='createdate timestamp,';
			$query .='name varchar(100), ';
			$query .='position varchar(15),';
			$query .='hp varchar(30),';
			$query .='email varchar(20)';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create PICs error';
				return FALSE;
			} 
		}
		
		$query = 'drop table if exists services ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop Services error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table services ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(100), ';
			$query .='abbreviation varchar(4),';
			$query .='username varchar(30),';
			$query .='createdate timestamp,';
			$query .='status enum("0","1") default "1")';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create Services error';
				return FALSE;
			} 
			
			
		}
		
		
		$query = 'drop table if exists operators ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop Services error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table operators ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(100), ';
			$query .='createdate timestamp';
			$query .=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create Operators error';
				return FALSE;
			} 
		}
		
		
		$query = 'drop table if exists business_fields ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop business_fields error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table business_fields ';
			$query .='(id int primary key auto_increment,';
			$query .='createdate timestamp,';
			$query .='name varchar(50),';
			$query .='status varchar(1) default "1"';
			$query .=' )';
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create business_fields error';
				return FALSE;
			} 
		}
		
		
		$query = 'drop table if exists categories ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop categories error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table categories ';
			$query .='(id int primary key auto_increment,';
			$query .='abbreviation varchar(1), ';
			$query .='createdate timestamp,';
			$query .='name varchar(100), ';
			$query .='status varchar(1) default "1" )';
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create categories error';
				return FALSE;
			} 
		}
		

		$query = 'drop table if exists branches ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop branches error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table branches ';
			$query .='(id int primary key auto_increment,';
			$query .='createdate timestamp,';
			$query .='name varchar(20), ';
			$query .='abbr varchar(10))';
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create branches error';
				return FALSE;
			} 
			
			
		}
		$query = 'drop table if exists applications ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop applications error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table applications ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(20), ';
			$query .='createdate timestamp)';
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create applications error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists medias ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop Medias error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table medias ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(50), ';
			$query .='createdate timestamp,';
			$query .='status enum("0","1") default "1")';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create Services error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists internet_speeds ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop Internet_Speeds error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table internet_speeds ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(50), ';
			$query .='createdate timestamp,';
			$query .='status enum("0","1") default "1")';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create Internet_speed error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists durations ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop durations error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table durations ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(50), ';
			$query .='createdate timestamp,';
			$query .='status enum("0","1") default "1")';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create durations error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists usage_periods ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop usage_periods error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table usage_periods ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(50), ';
			$query .='createdate timestamp,';
			$query .='status enum("0","1") default "1")';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create usage_periods error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists internet_users ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop internet_users error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table internet_users ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(50), ';
			$query .='createdate timestamp,';
			$query .='status enum("0","1") default "1")';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create internet_users error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists internet_fees ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop internet_fees error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table internet_fees ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(50), ';
			$query .='createdate timestamp,';
			$query .='status enum("0","1") default "1")';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create internet_fees error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists internet_problems ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop internet_problems error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table internet_problems ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(50), ';
			$query .='createdate timestamp,';
			$query .='status enum("0","1") default "1")';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create internet_problems error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists client_applications ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop client_applications error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table client_applications ';
			$query .='(id int primary key auto_increment,';
			$query .='client_id int,';
			$query .='createdate timestamp,';
			$query .='name varchar(50) ';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create client_applications error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists packages ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop packages error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table packages ';
			$query .='(id int primary key auto_increment,';
			$query .='name varchar(50), ';
			$query .='createdate timestamp';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create packages error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists client_priorities ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop client_priorities error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table client_priorities ';
			$query .='(id int primary key auto_increment,';
			$query .='client_id int,';
			$query .='createdate timestamp,';
			$query .='name varchar(50), ';
			$query .='priority smallint';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create client_priorities error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists implementation_targets ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop implementation_targets error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table implementation_targets ';
			$query .='(id int primary key auto_increment,';
			$query .='createdate timestamp,';
			$query .='name varchar(50) ';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create implementation_targets error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists budgets ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop budgets error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table budgets ';
			$query .='(id int primary key auto_increment,';
			$query .='createdate timestamp,';
			$query .='name varchar(50) ';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create budgets error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists follow_ups ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop follow_ups error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table follow_ups ';
			$query .='(id int primary key auto_increment,';
			$query .='client_id int,';
			$query .='createdate timestamp,';
			$query .='note text, ';
			$query .='follow_up_date datetime,';
			$query .='next_follow_up_date datetime,';
			$query .='followed_up varchar(1),';
			$query .='status varchar(1),';//NULL not yet, 1 prospect, 0 not prospected
			$query .='follow_up_user varchar(20),';
			$query .='telemarketer varchar(20)';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create follow_ups error';
				return FALSE;
			} 
		}
		$query = 'drop table if exists speeds ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop speeds error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table speeds ';
			$query .='(id int primary key auto_increment,';
			$query .='name text, ';
			$query .='createdate timestamp';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create speeds error';
				return FALSE;
			}
		}
		$query = 'drop table if exists groups ';
		$result = $this->db->query($query);
		if(!$result){
			echo 'Drop groups error';
			return FALSE;
		}		
		else 
		{
			$query = 'create table groups ';
			$query .='(id int primary key auto_increment,';
			$query .='name text, ';
			$query .='createdate timestamp';
			$query.=')';
			
			$result = $this->db->query($query);
			if(!$result){
				echo 'Create groups error';
				return FALSE;
			}
		}
		return TRUE;
	}
	function create_admin(){
		$params = $this->input->post();
		$this->auth->create_user($params['admin'],$params['password'],$params['email']);
	}
	function restore_dump(){
		$operators = array(
			'Telkom Speedy',
			'Dnet',
			'Data Utama',
			'Crossnet',
			'Radnet',
			'Indonet',
			'Uninet',
			'Hypernet',
			'Mitranet',
			'SCBDNet',
			'Laxo',
			'Indosat',
			'XL',
			'3',
			'Axis',
			'Esia',
			'Smartfren',
			'Universal',
			'Biznet',
			'Alusio',
			'Primanet',
			'Nusanet',
			'Telkomsel',
			'Centrin',
			'Fastnet',
			'Velonet',
			'Maxindo',
			'Icon+',
			'Jasatel'
		);
		foreach ($operators as $operator){
			$query = 'insert into operators (name) value ("'  . $operator . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $operator . ' error';
				return FALSE;
			}
		}
		$business_fields = array(
			'Badan Usaha',
			'Perorangan',
			'Wargame',
			'Institusi'
		);
		foreach ($business_fields as $business_field){
			$query = 'insert into business_fields (name,status) value ("'  . $business_field . '","1") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $business_field . ' error';
				return FALSE;
			}
		}
		$positions = array(
			'Pemilik',
			'Direktur',
			'Manajer',
			'Purchasing',
			'IT Dept',
			'Sekretaris'
		);
		foreach ($positions as $position){
			$query = 'insert into positions (name) value ("'  . $position . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $position . ' error';
				return FALSE;
			}
		}
		$applications = array(
			'Browsing',
			'Email',
			'Download',
			'FTP',
			'VOIP',
			'VPN',
			'CCTV',
			'Online Game',
			'Teleconference'
		);
		foreach ($applications as $application){
			$query = 'insert into applications (name) value ("'  . $application . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $application . ' error';
				return FALSE;
			}
		}
		$medias = array(
			'3G / CDMA Modems',
			'ADSL',
			'Wireless',
			'FO',
			'VSAT','Copper'
		);
		foreach ($medias as $media){
			$query = 'insert into medias (name) value ("'  . $media . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $media . ' error';
				return FALSE;
			}
		}
		$internet_speeds = array(
			'<=512 Kbps',
			'512 Kbps - 1 Mbps',
			'1 Mbps - 2 Mbps',
			'2 Mbps - 5 Mbps',
			'>5 Mbps'
		);
		foreach ($internet_speeds as $internet_speed){
			$query = 'insert into internet_speeds (name) value ("'  . $internet_speed . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $internet_speed . ' error';
				return FALSE;
			}
		}
		$durations = array(
			'<2 jam',
			'2 - 4 jam',
			'4 - 8 jam',
			'>8 jam'
		);
		foreach ($durations as $duration){
			$query = 'insert into durations (name) value ("'  . $duration . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $duration . ' error';
				return FALSE;
			}
		}
		$usage_periods = array(
			'OH',
			'Non OH',
			'24 jam'
		);
		foreach ($usage_periods as $usage_period){
			$query = 'insert into usage_periods (name) value ("'  . $usage_period . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $usage_period . ' error';
				return FALSE;
			}
		}
		$internet_users = array(
			'1 - 2',
			'3 - 5',
			'6 - 10',
			'11 - 20',
			'>20'
		);
		foreach ($internet_users as $internet_user){
			$query = 'insert into internet_users (name) value ("'  . $internet_user . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $internet_user . ' error';
				return FALSE;
			}
		}
		$internet_fees = array(
			'<350 rb',
			'350 - 500 rb',
			'500 - 750 rb',
			'750 rb - 1,5 jt',
			'>1,5 jt - 3 jt',
			'>3 - 5 jt',
			'>5 - 10 jt',
			'>10 jt'
		);
		foreach ($internet_fees as $internet_fee){
			$query = 'insert into internet_fees (name) value ("'  . $internet_fee . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $internet_fee . ' error';
				return FALSE;
			}
		}
		$internet_problems = array(
			'Kualitas link',
			'Support teknis',
			'Harga',
		);
		foreach ($internet_problems as $internet_problem){
			$query = 'insert into internet_problems (name) value ("'  . $internet_problem . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $internet_problem . ' error';
				return FALSE;
			}
		}
		
		$packages = array(
			'ADSL',
			'Community',
			'Biz','Enterprize','IIX','Local Loop','Mix','Hosting','Domain','Website','VSAT'
		);
		foreach ($packages as $package){
			$query = 'insert into packages (name) value ("'  . $package . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $package . ' error';
				return FALSE;
			}
		}
		$implementation_targets = array(
			'<1 mg',
			'>1mg - <1bln',
			'1 - 2 bln','3 - 6 bln','> 6bln'
		);
		foreach ($implementation_targets as $implementation_target){
			$query = 'insert into implementation_targets (name) value ("'  . $implementation_target . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $implementation_target . ' error';
				return FALSE;
			}
		}
		$budgets = array(
			'<350 rb',
			'350 - 500 rb',
			'500 - 750 rb','750rb - 1.5 jt','>1.5 jt - 3jt','>3 - 5 jt','>5 - 10 jt','>10 jt'
		);
		foreach ($budgets as $budget){
			$query = 'insert into budgets (name) value ("'  . $budget . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $budget . ' error';
				return FALSE;
			}
		}
		$speeds = array(
			'<512 kbps',
			'>512 kbps - 1 Mb',
			'>1 Mb - 2 Mb','>2 Mb - 5 Mb','>5 Mb'
		);
		foreach ($speeds as $speed){
			$query = 'insert into speeds (name) value ("'  . $speed . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $speed . ' error';
				return FALSE;
			}
		}
		$groups = array(
			'Administrators',
			'telemarketers',
			'sales'
		);
		foreach ($groups as $group){
			$query = 'insert into groups (name) value ("'  . $group . '") ';
			$result = $this->db->query($query);
			if(!$result){
				echo 'insert' . $group . ' error';
				return FALSE;
			}
		}
		return TRUE;
	}
	
}
