<?php
class authentication{
var $obj;
	function __construct(){
		$this->obj = & get_instance();
	}
	function is_authenticated(){
		if($this->obj->auth->is_logged_in()){
			return true;
		}
		else
		{
			$footer_data=array('navigator'=>array(array(anchor('front_page/login','Login','class="button"'))));
			redirect('front_end');
		}
	}
	function is_member_of($group){
		if($this->is_authenticated()){
			$user = new User();
			$user->where('id',$this->obj->session->userdata['id'])->get();
			if ($user->group->name==$group){
				return TRUE;
			}else{
				return false;
			}
		}
	}
}