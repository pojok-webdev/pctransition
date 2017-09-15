<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	$autoload['packages'] = array(APPPATH.'third_party');
	$autoload['libraries'] = array(
		'database',
		//'datamapper',
		'fpdf',
		'pagination',
		'session',
		'common',
		'auth',
		'authentication',
		'email',
		'ion_auth',
		'template',
		'form_validation',
		'pdftable','matrix','appsettings'
	);
	$autoload['helper'] = array(
		'common',
		'url',
		'form',
		'date',
		'file',
		'directory',
		'text',
		'cookie',
		'padi',
		'telegram','inflector'
	);
	$autoload['config'] = array();
	$autoload['language'] = array();
	$autoload['model'] = array(array(
		'Access_logs/access_log',
		'Alerts/alert',
		'Altergrades/altergrade',
		'Alterexecutors/alterexecutor',
		'App_logs/app_log',
		'App_settings/app_setting',
		//'Aps/ap',
		'Applications/application',
		'Branches/branch',
		//'Btses/btstower',
		'Business_fields/business_field',
		//'Backbones/backbone',
		'Chats/chat', 
		'Cores/core', 
		'Budgets/budget',
		'Calendars/calendar',
		'Client_applications/client_application',
		'Clientservices/clientservice',
		'Clientsitesales/clientsitesale',
		'Cities/city','Clients/client','Client_sites/client_site',
		'Client_priorities/client_priority',
		'Datacenters/datacenter',
		'Devices/device',
		'Devicetypes/devicetype',
/*		'Disconnections/disconnection',
		'Disconnectionlogs/disconnectionlog',
		'Disconnection_operators/disconnection_operator',
		*/
		'Durations/duration',
		/*
		'Extendreasons/extendreason',
		'Fbs/fb',
		'Fbfees/fbfee',
		'Fbpics/fbpic',
		*/
		'Groups/group',
		/*
		'Group_preferences/group_preference',
		'Grades/grade',
		'Install_antennas/install_antenna',
		'Install_ap_wifis/install_ap_wifi',
		'Install_bas/install_ba',
		'Install_dates/install_date',
		'Install_files/install_file',
		'Install_images/install_image','Install_installers/install_installer',
		'Install_pccards/install_pccard',
		'Install_requests/install_request',
		'Install_materials/install_material',
		'Install_switches/install_switch',
		'Internal_messages/internal_message',
		'Internet_fees/internet_fee',
		'Install_resumes/install_resume',
		'Install_sites/install_site',
		'Install_wireless_radios/install_wireless_radio','Install_routers/install_router',
		'Internet_users/internet_user',
		'Maintenances/maintenance',
		'Maintenancelogs/maintenancelog',
		'Maintenance_images/maintenance_image',
		'Maintenance_requests/maintenance_request',
		'Maintenance_operators/maintenance_operator',
		'Maintenanceoperators/maintenanceoperator',
		'Maintenance_pics/maintenance_pic',
		*/
		'Materialtypes/materialtype',
/*
		'Materials/material',
		'Medias/media',
		'Messages/message',
		'Modules/module',
		*/
		'Operators/operator',
		'Pap',
		'Pbtstower',
		/*
		'Paqs/paq',
		*/
		'Problems/problem',
		'Positions/position',
		/*
		'Preclients/preclient',
		'Prepics/prepic',*/
		'Pics/pic',
		'Picroles/picrole',/*
		'Ptps/ptp',
		'Reminders/reminder',
		'Reminderlogs/reminderlog',
		*/
		'Speeds/speed',
		'Services/service',
		/*
		'Site_antennas/site_antenna',
		'Site_devices/site_device',
		'Site_wireless_radios/site_wireless_radio',
		'Site_routers/site_router',
		'Site_pccards/site_pccard',
		'Site_apwifis/site_apwifi',
		'Site_pics/site_pic',
		'Site_switches/site_switch',
		'Survey_dates/survey_date',
		'Survey_gps_datas/survey_gps_data',
		*/
		'Surveys/survey',
		/*
		'Survey_bts_distances/survey_bts_distance','Survey_client_distances/survey_client_distance',
		'Survey_devices/survey_device',
		'Survey_images/survey_image',
		'Survey_surveyors/survey_surveyor',
		'Survey_requests/survey_request',
		'Survey_resumes/survey_resume',
		'Survey_materials/survey_material',
		*/
		'Surveypackages/surveypackage',
		/*
		'Surveypackagedetails/surveypackagedetail',
		'Survey_bas/survey_ba',
		*/
		'Survey_sites/survey_site',
		/*
		'Survey_site_distances/survey_site_distance',
		'Suspects/suspect',
		'Telemarketing/telemarketing',
		'Trials/trial',
		'Trialofficers/trialofficer',
		'Troubleshoot_requests/troubleshoot_request',
		'Troubleshootsites/troubleshootsite',
		'Troubleshoot_bas/troubleshoot_ba',
		'Troubleshoot_routers/troubleshoot_router',
		'Troubleshoot_apwifis/troubleshoot_apwifi',
		'Troubleshoot_devices/troubleshoot_device',
		'Troubleshoot_implementers/troubleshoot_implementer',
		'Troubleshoot_materials/troubleshoot_material',
		'Troubleshoot_officers/troubleshoot_officer',
		'Troubleshoot_pccards/troubleshoot_pccard',
		'Troubleshoot_switches/troubleshoot_switch',
		'Troubleshoot_images/troubleshoot_image',
		'Ticket_followups/ticket_followup',
		'Tickets/ticket',
		'Ticketcauses/ticketcause',*/
		'Usage_periods/usage_period',
		'Users/user',
/*		'Vases/vas',
*/
		'Web_settings/web_setting',
		/*
		'Withdrawals/withdrawal',
		'maintenancereport_images/maintenancereport_image',
		'maintenancereport_kompetitors/maintenancereport_kompetitor',
		'maintenancereport_vas/maintenancereport_vas',
		'maintenancereports/maintenancereport',
		'maintenancereport_applications/maintenancereport_application',*/
	)
);
