<?php
function mailConfig(){
	$ci = & get_instance();
	$config['smtp_host']=$ci->config->item('smtp_host');
	$config['smtp_port']='25';//instead of 465
	$config['protocol']='smtp';
	$config['mailtype']='html';
	return $config;
}
function psendmail($params){
	$ci = & get_instance();
	$ci->load->library("email");
	foreach($params as $key=>$val){
		$ci->email->$key($val);
	}
	$ci->email->set_mailtype("html");
	$ci->email->send();
}