<?php
class Telegrams extends CI_Controller{
	function __construct(){
//		define('BOT_TOKEN', 'bot201184174:AAH2Fy_3wS8A5KGi2cn468dtFCMJjhOqISQ');
//		define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
		parent::__construct();
	}
	function index(){
		echo "A TELEGRAM SAMPLE";
	}
	function simple(){
		$content = file_get_contents("php://input");
		$update = json_decode($content, true);
		$chatID = $update["message"]["chat"]["id"];
				
		// compose reply
		$reply =  sendMessage();
				
		// send reply
		$sendto =API_URL."sendmessage?chat_id=".$chatID."&text=".$reply;
		file_get_contents($sendto);		
	}
	function sendMessage(){
		$message = "I am a baby bot.";
		return $message;
	}
	function setthing(){
		$this->load->view("telegram/setthing");
	}
} 
