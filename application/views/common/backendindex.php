<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('common/backend');?>
<?
//Set no caching
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?> 


</head>

<body>

<div id="content-left">

	<div id="logo"><img src="<?php echo base_url();?>themes/<?php echo $this->setting['theme'];?>/images/logo.png" /></div>
  <div class="arrowlistmenu">
   	<h3 class="menuheader"><a href="<?php echo base_url();?>index.php/back_end/index">Home</a></h3>
	<?php if($this->user_info['group']=='Administrators'){?>    
        <h3 class="menuheader expandable"><a href="#">Global Config</a></h3>
	        <ul class="categoryitems">
	        <li><a href="<?php echo base_url();?>index.php/back_end/web_setting">Web Setting</a></li>
	        <li><a href="<?php echo base_url();?>index.php/users/show_user_management/page">User Management</a></li>
	        <li><a href="<?php echo base_url();?>index.php/access_logs/show_access_log/page">Access Log</a></li>
	        </ul>
	<?php }?>
        <h3 class="menuheader expandable"><a href="#">Master Data</a></h3>
	        <ul class="categoryitems">
	        <li><a href="<?php echo base_url();?>index.php/btses/show_bts/page">BTS</a></li>
	        <li><a href="<?php echo base_url();?>index.php/aps/show_aps/page">Access Points</a></li>
	        <li><a href="<?php echo base_url();?>index.php/clients/show_clients/page"><?php echo $this->lang->line('client');?></a></li>
	        <li><a href="<?php echo base_url();?>index.php/group_preferences/show_group_preferences/page">Group Preferences</a></li>
	        <li><a href="<?php echo base_url();?>index.php/groups/show_groups/page">Groups</a></li>
	        <li><a href="<?php echo base_url();?>index.php/cities/show_city/page">Kota</a></li>
	        <li><a href="<?php echo base_url();?>index.php/devices/show_devices/page">Peralatan</a></li>
	        </ul>       
    <?php if(humanize($this->user_info['group'])=='Sales'){?>    
        <h3 class="menuheader expandable"><a href="#">Sales</a></h3>
		    <ul class="categoryitems">
		        <li><a href="<?php echo base_url();?>index.php/survey_requests/show_survey_requests/page"><?php echo $this->lang->line('survey_request');?></a></li>
		    </ul>
	<?php }?>
	<?php if($this->user_info['group']=='TS'){?>    
        <h3 class="menuheader expandable"><a href="#">TS</a></h3>
		    <ul class="categoryitems">
		        <li><a href="<?php echo base_url();?>index.php/survey_requests/show_ts_survey_requests/page"><?php echo $this->lang->line('survey_request');?></a></li>
		        <li><a href="<?php echo base_url();?>index.php/install_requests/show_ts_install_requests/page"><?php echo $this->lang->line('install_request');?></a></li>
		    </ul>
    <?php }?>
        <h3 class="menuheader expandable"><a href="#">Calendar</a></h3>
		    <ul class="categoryitems">
		        <li><a href="<?php echo base_url();?>index.php/back_end/show_calendar/page"><?php echo $this->lang->line('calendar');?></a></li>
		    </ul>
        <h3 class="menuheader expandable"><a href="#">Messages</a></h3>
		    <ul class="categoryitems">
		        <li><a href="<?php echo base_url();?>index.php/internal_messages/show_messages/type/install"><?php echo 'Messages';?></a></li>
		        <li><a href="<?php echo base_url();?>index.php/tickets/lists"><?php echo 'Tickets';?></a></li>
		    </ul>
        <h3 class="menuheader expandable"><a href="#">Help</a></h3>
		    <ul class="categoryitems">
		        <li><a href="<?php echo base_url();?>index.php/helps/show_help/page"><?php echo $this->lang->line('help');?></a></li>
		        <li><a href="<?php echo base_url();?>index.php/back_end/show_todo/page"><?php echo $this->lang->line('todo');?></a></li>
		    </ul>
        <h3 class="menuheader"><a href="<?php echo base_url();?>index.php/back_end/logout">Logout</a></h3>        
    </div>
</div>
<div id="content-right">
	<div id="header-text">Hello <a href="#"><?php echo humanize($this->session->userdata['username']) . ' (' . $this->user_info['group'] . ') ';?></a>, <?php echo $this->lang->line('welcome_to_administrator_page');?></div>
    <div id="main-content">
    <?php 
    switch ($view_data){
    	case 'home':
    		$this->load->view('home');
    		break;
    	case 'show_help':
    		switch ($type){
    			case 'user_konfigurasi':
    				$this->load->view('helps/user_konfigurasi');
    				break;
    			case 'sales_request_survey':
    				$this->load->view('helps/sales_request_survey');
    				break;
    			case 'ts_melakukan_survey':
    				$this->load->view('helps/ts_melakukan_survey');
    				break;
    			case 'sales_request_instalasi':
    				$this->load->view('helps/sales_request_instalasi');
    				break;
    			case 'ts_melakukan_instalasi':
    				$this->load->view('helps/ts_melakukan_instalasi');
    				break;
    			case 'penjadwalan_ulang_instalasi':
    				$this->load->view('helps/penjadwalan_ulang_instalasi');
    				break;
    			case 'installasi_uml':
    				$this->load->view('helps/installasi_uml');
    				break;
    			case 'survey_uml':
    				$this->load->view('helps/survey_uml');
    				break;
    			default:
    				$this->load->view('show_help');
    				break;
    		}
    		break;
    	case 'show_todo':
    		$this->load->view('show_todo');
    		break;
    	case 'clients':
    		$this->load->view('clients');
    		break;
    	case 'entry_client':
    		$this->load->view('entry_client');
    		break;
    	case 'add_client_site':
    		$this->load->view('add_client_site');
    		break;
    	case 'add_ts_client_site':
    		$this->load->view('add_ts_client_site');
    		break;
    	case 'survey_requests':
    		$this->load->view('survey_requests');
    		break;
    	case 'add_bts':
    		$this->load->view('add_bts');
    		break;
    	case 'add_survey_material':
    		$this->load->view('add_survey_material');
    		break;
    	case 'add_survey_device':
    		$this->load->view('add_survey_device');
    		break;
    	case 'ts_survey_requests':
    		$this->load->view('survey_ts_requests');
    		break;
    	case 'ts_install_requests':
    		$this->load->view('ts_install_requests');
    		break;
    	case 'entry_ts_install_request':
    		$this->load->view('entry_ts_install_request');
    		break;
    	case 'entry_installer':
    		$this->load->view('entry_installer');
    		break;
    	case 'survey_request_detail':
    		$this->load->view('detail_survey_request');
    		break;
    	case 'entry_survey_request':
    		$this->load->view('entry_survey_request');
    		break;
    	case 'entry_ts_survey_request':
    		$this->load->view('common/ckeditor');
    		$this->load->view('entry_ts_survey_request');
    		break;
    	case 'entry_surveyor':
    		$this->load->view('entry_surveyor');
    		break;
    	case 'entry_wireless_radio':
    		$this->load->view('entry_wireless_radio');
    		break;
    	case 'surveys':
    		$this->load->view('surveys');
    		break;
    	case 'entry_survey':
    		$this->load->view('entry_survey');
    		break;
    	case 'add_site':
    		$this->load->view('add_site');
    		break;
    	case 'entry_survey_gps_data':
    		$this->load->view('entry_survey_gps_data');
    		break;
    	case 'entry_survey_bts_distance':
    		$this->load->view('entry_survey_bts_distance');
    		break;
    	case 'advanced_user_preferences':
    		$this->load->view('advanced_user_preferences');
    		break;
    	case 'user_management':
    		$this->load->view('user_management');
    		break;
    	case 'add_user':
    		$this->load->view('add_user');
    		break;
    	case 'add_member':
    		$this->load->view('add_member');
    		break;
    	case 'group':
    		$this->load->view('group');
    		break;
    	case 'group_preference':
    		$this->load->view('group_preference');
    		break;
   		case 'front_page':
    		$this->load->view('ckeditor');
    		$this->load->view('front_page');
    		break;
   		case 'calendar':
    		$this->load->view('calendar');
    		break;
   		case 'day':
   			$this->load->view('day');
   			break;
    	case 'about':
    		$this->load->view('ckeditor');
    		$this->load->view('about');
    		break;
    	case 'web_setting':
    		$this->load->view('ckeditor');
    		$this->load->view('web_setting');
    		break;
    	case 'entry_news':
    		$this->load->view('ckeditor');
    		$this->load->view('entry_news');
			break;    		
    	case 'entry_group':
    		$this->load->view('entry_group');
    		break;
    	case 'status_management':
    		$this->load->view('status_management');
    		break;
    	case 'entry_status':
    		$this->load->view('entry_status');
    		break;
    	case 'city_management':
    		$this->load->view('city_management');
    		break;
    	case 'entry_city':
    		$this->load->view('entry_city');
    		break;
    	case 'show_group_preferences':
    		$this->load->view('show_group_preferences');
    		break;
    	case 'entry_user':
    		switch ($type){
    			case 'add':
    				$this->load->view('entry_user');
    				break;
    			case 'edit':
	    			$this->load->view('edit_user');
    				break;
    		}
    		break;
    	case 'confirmation':
    		$this->load->view('confirmation');
    		break;
    	case 'page':
    		$this->load->view('page_management');
    		break;
    	case 'entry_page':
    		$this->load->view('ckeditor');
    		$this->load->view('entry_page');
    		break;
    	case 'menu_management':
    		$this->load->view('menu_management');
    		break;
    	case 'entry_menu':
    		$this->load->view('entry_menu');
    		break;
    	case 'bts_management':
    		$this->load->view('bts_management');
    		break;
    	case 'entry_bts':
    		$this->load->view('entry_bts');
    		break;
    	case 'show_aps':
    		$this->load->view('show_aps');
    		break;
    	case 'entry_ap':
    		$this->load->view('entry_ap');
    		break;
    	case 'show_banners':
    		$this->load->view('show_banners');
    		break;
    	case 'access_log':
    		$this->load->view('access_log_management');
    		break;
    	case 'show_pdf_file':
    		$this->load->view('show_pdf_file');
    		break;
    	case 'show_cover_file':
    		$this->load->view('show_cover_file');
    		break;
    	case 'show_media':
    		$this->load->view('show_media');
    		break;
    	case 'add_foto':
    		$this->load->view('add_foto');
    		break;
    	case 'edit_survey_image':
    		$this->load->view('edit_survey_image');
    		break;
    	case 'report_of_survey':
    		$this->load->view('report_of_survey');
    		break;
    	case 'report_of_survey2':
    		$this->load->view('report_of_survey2');
    		break;
    	case 'devices':
    		$this->load->view('devices');
    		break;
    	case 'add_survey_client':
    		$this->load->view('add_survey_client');
    		break;
    	case 'install_requests':
    		$this->load->view('install_requests');
    		break;
    	case 'entry_install_request':
    		$this->load->view('entry_install_request');
    		break;
    	case 'systemconfirmation':
    		$this->load->view('systemconfirmation');
    		break;
    	case 'install_date_revision':
    		$this->load->view('install_date_revision');
    		break;
    	case 'survey_date_revision':
    		$this->load->view('common/ckeditor');
    		$this->load->view('survey_date_revision');
    		break;
    	case 'show_messages':
    		$this->load->view('show_messages');
    		break;
    	case 'choose_survey_report_recipients':
    		$this->load->view('choose_survey_report_recipients');
    		break;
    	case 'pdfmail':
    		$this->load->view('pdfmail');
    		break;
    	case 'entry_router':
    		$this->load->view('entry_router');
    		break;
    	case 'entry_ap_wifi':
    		$this->load->view('entry_ap_wifi');
    		break;
    	case 'upload_file':
    		$this->load->view('upload_file');
    		break;
    	case 'upload_image':
    		$this->load->view('upload_image');
    		break;
    	case 'entry_install_image':
    		$this->load->view('entry_install_image');
    		break;
    	case 'install_report':
    		$this->load->view('report_of_install');
    		break;
    	case 'broken_link':
    		$this->load->view('broken_link');
    		break;
    	case 'list_tickets':
    		$this->load->view('list_tickets');
    		break;
    }
    ?>
    </div>
</div>

</body>
</html>
