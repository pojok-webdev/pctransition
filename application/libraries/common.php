<?php
class Common {
	var $obj;
	function __construct(){
		$this->obj = & get_instance();
	}
	function grantElement($owner='everyone',$executor='everyone'){
		if($owner=='everyone' && $executor=='everyone'){
			return '';
		}
		if($owner!=$this->obj->ionuser->id && $executor=='everyone'){
			return '';
		}
		if(($this->is_decessor($owner,$this->obj->ionuser->id) && $executor=='decessor')||$owner==$this->obj->ionuser->id){
			return '';
		}
		if($owner!=$this->obj->ionuser->id && $executor=='owner'){
			return 'disabled="disabled"';
		}
		if($owner==$this->obj->ionuser->id && $executor=='owner'){
			return '';
		}
		if($executor=='group'){
			if(Group::get_groupname($this->obj->ionuser->group_id) == $owner){
				return '' . $owner;
			}
			return 'disabled="disabled"';
		}
//		return 'disabled="disabled"';
	}
	function daysbetween($start,$end){
		$date1 = explode('/',$start);
		$date2 = explode('/',$end);
		$dttm1 = date_create($date1[2]. '-' . $date1[1] . '-' . $date1[0]);
		$dttm2 = date_create($date2[2]. '-' . $date2[1] . '-' . $date2[0]);
		$diff = date_diff($dttm1,$dttm2);
		$tgl = $date1[0];
		$startdate = date("Y-m-d",mktime(0,0,0,$date1[1],$tgl,$date1[2]));
		$out = array();
		for($i=0;$i<=$diff->format("%a");$i++){
			$tmpdate = date("Y-m-d",mktime(0,0,0,$date1[1],$tgl+$i,$date1[2]));
			array_push($out, $tmpdate);
		}
		return $out;
	}
	function differenceInTimes($start, $end) {
	    if (strtotime($start)>strtotime($end)) {
	        //start date is later then end date
	        //end date is next day
	        $s = new DateTime($start);
	        $e = new DateTime($end);
	    } else {
	        //start date is earlier then end date
	        //same day
	        $s = new DateTime($start);
	        $e = new DateTime($end);
	    }
	    return date_diff($s, $e);
	}
	function humanizetime($mytime){
	if($mytime->d==0){
		if($mytime->h==0){
			if($mytime->i<=30){
				return "<= 30 menit";
			}else{
				return ">30 menit - <= 1 jam";
			}
		}elseif($mytime->h==1){
			if($mytime->i==0){
				return ">30 menit - <= 1 jam";
			}else{
				return "1 jam - <= 2 jam";
			}
		}elseif($mytime->h<=2){
			if($mytime->i==0){
				return "1 jam - <= 2 jam";
			}else{
				return "2 jam - <= 4 jam";
			}
		}elseif($mytime->h<=4){
			if($mytime->i==0){
				return "2 jam - <= 4 jam";
			}else{
				return "4 - <= 24 jam";
			}
		}
		elseif($mytime->h<=23){
			return "4 - <= 24 jam";
		}
	}
	elseif($mytime->d==1&&$mytime->h==0&&$mytime->i==0){
		return "4 - <= 24 jam";
		}
	else{
		return "> 24 jam ";
	}
	}
	function hasAncestor($decessor_id){
		$obj = new User();
		$obj->where('id',$decessor_id)->get();
		$cnt = $obj->supervisor->result_count();
		if($obj->supervisor->result_count()>0){
			return true;
		}
		return false;
	}
	function IsDecessor($decessor_id,$ancestor_id){
		$decessor = new User();
		$decessor->where('id',$decessor_id)->get();
		if($decessor->supervisor->id==$ancestor_id){
			return true;
		}else{
			if($this->hasAncestor($decessor->supervisor->id)){
//				echo "spetinya decessor";
				return $this->IsDecessor($decessor->supervisor->id,$ancestor_id);
//				return true;
			}else{
				return false;
			}
			return false;
		}
	}
	function is_decessor($decessor_id,$ancestor_id){
		$ci = & get_instance();
		$sql = "select * from users a left outer join supervisors_users b on b.supervisor_id=a.id ";
		$sql.= "left outer join users c on c.id=b.user_id ";
		$sql.= "where c.id = '" . $decessor_id . "' ";
		$sql.= "and a.id='" . $ancestor_id . "'";
		$query = $ci->db->query($sql);
		//echo $query->num_rows(); 
		if ($query->num_rows()===0){
			return false;
		}
		return true;
	}
	function differenceInTimescopy($start, $end) {
	    if (strtotime($start)>strtotime($end)) {
	        //start date is later then end date
	        //end date is next day
	        $s = new DateTime('2000-01-01 '.$start);
	        $e = new DateTime('2000-01-02 '.$end);
	    } else {
	        //start date is earlier then end date
	        //same day
	        $s = new DateTime('2000-01-01 '.$start);
	        $e = new DateTime('2000-01-01 '.$end);
	    }

	    return date_diff($s, $e);
	}
	function check_is_install_folder_exist(){
		if(get_dir_file_info('./application/modules/install')){
			return true;
		}
		else
		{
			return false;
		}
	}
	function remove_single_quote($string){
		return str_replace("'","''",$string);
	}
	function show_single_quote($string){
		return str_replace("''","'",$string);
	}
	function thousand_separator($number=''){
		if($number==''){
		return '0.00';
		}
		$out='';
		$exploded = explode(".",$number);
		$k=0;
		for($c=strlen($exploded[0]);$c>=0;$c--){
			$out = substr($exploded[0],$c,1) . $out;
			if(($k%3==0) && ($k!=strlen($exploded[0]))&&($k!=0)){
				$out = ',' . $out;
			}
			$k++;
		}
		if(!empty($exploded[1])){
			$out.='.' . $exploded[1];
		}
		else
		{
			$out.='.00';
		}
		return $out;
	}
	function de_decimalize($value){
		$output=$value;
		return str_replace(',','',$output);
	}
	function decimalize($value){
		return $value;
	}
	function sql_to_human_datetime($datetime){
		if(!is_null($datetime)){
			$datetimearray = explode(' ', $datetime);
			$date_array = explode('-',$datetimearray[0]);
			$output = $date_array[2] . '/' . $date_array[1] . '/' . $date_array[0] . ' ' . $datetimearray[1];
			return $output;
		}
		return '00/00/0000 00:00:00';
	}
	function sql_to_human_date($date,$separator='/'){
		if(!is_null($date)){
			$date_array = explode('-',$date);
			$output = $date_array[2] . $separator . $date_array[1] . $separator . $date_array[0];
			return $output;
		}
		return '00/00/0000';
	}
	function human_to_sql_date($date){
		$date_array = explode('/', $date);
		$output = $date_array[2] . '-' . $date_array[1] . '-' . $date_array[0];
		return $output;
	}
	function longhuman_to_sql_date($date){
		$longdate = explode(' ', $date);
		$date_array = explode('/', $longdate[0]);
		$output = $date_array[2] . '-' . $date_array[1] . '-' . $date_array[0] . ' ' . $longdate[1];
		return $output;
	}
	function longhuman_to_datepart($date){
		$longdate = explode(' ', $date);
		$date_array = explode('/', $longdate[0]);
		$time_array = explode(':', $longdate[1]);
		$output['year'] = $date_array[2];
		$output['month'] = $date_array[1];
		$output['day'] = $date_array[0];
		$output['hour'] = $time_array[2];
		$output['minute'] = $time_array[1];
		$output['second'] = $time_array[0];
		return $output;
	}
	function human_to_datepart($date){
		$date_array = explode('/', $date);
		echo 'Date : ' . $date;
		$output['year'] = $date_array[2];
		$output['month'] = $date_array[1];
		$output['day'] = $date_array[0];
		return $output;

	}
	function longsql_to_datepart($date){
		if ($date == NULL){
			$out['year'] = '';
			$out['month'] = '';
			$out['day'] = '';
			$out['hour'] = '';
			$out['minute'] = '';
			$out['second'] = '';
		}else{
			$array = explode(' ',$date);
			$datestring = explode('-',$array[0]);
			$out['year'] = $datestring[0];
			$out['month'] = $datestring[1];
			$out['day'] = $datestring[2];
			$timestring = explode(':', $array[1]);
			$out['hour'] = $timestring[0];
			$out['minute'] = $timestring[1];
			$out['second'] = $timestring[2];
		}
		return $out;
	}
	function longsql_to_human_date($date,$separator='/'){
		$date_array = explode(' ',$date);
		$array = explode('-',$date_array[0]);
		return $array[2] . $separator . $array[1] . $separator . $array[0];
	}
	function longsqldt_to_human_date($date,$separator='/'){
		$date_array = explode(' ',$date);
		$array = explode('-',$date_array[0]);
		return $array[2] . $separator . $array[1] . $separator . $array[0] . ' ' . $date_array[1];
	}
	function member_of($id,$group){
		if(User::get_group_name($id)==$group){
			return true;
		}
		return false;
	}
	function memberoneofgroups($id,$array){
		foreach($array as $group){
			/*if(User::get_group_name($id)==$group){
				return true;
			}*/
			$obj = new Group();
			$obj->where('name',$group)->where_related('user','id',$id)->get();
			if($obj->result_count()>0){
				return true;
			}
		}
		return false;
	}
	function check_login(){
		$ci = & get_instance();
		if(!$ci->ion_auth->logged_in()){
			redirect(base_url() . 'index.php/adm/login');
		}
	}
	public function check_authentication(){
		if(!$this->auth->is_logged_in()){
			redirect(base_url() . 'index.php/back_end/login');
		}
		$user = new User();
		$user->where('id',$this->session->userdata['id'])->get();
		$user_info['username'] = $user->username;
		$user_info['group'] = $user->group->name;
		$this->user_info = $user_info;
	}
	function get_preferences(){
		if($this->auth->is_logged_in()){
			$this->preference = User::get_user_preferences($this->session->userdata['id']);
		}
	}
	function get_web_settings(){
		$out = array();
		$web_settings = new Web_setting();
		$web_settings->get();
		$out['theme'] = "";// $web_settings->theme;
		$out['language'] = "id";//$web_settings->language;
		$out['footer_text'] = "PadiNET";//$web_settings->footer_text;
		return $out;
	}
	function check_messages(){
		$message = new Internal_message();
		$message->where('recipient',$this->session->userdata['id'])->or_where('recipient_group',User::get_group_id($this->session->userdata['id']))->where('hasread','0')->get();
		return $message->result_count();
	}
	function show_object($class,$view_data,$pagination,$column='name'){
		Common::check_authentication();
		$uri = $this->uri->uri_to_assoc();
		$page_conf = $this->common->get_simple_pagination_conf($pagination);
		$obj = $class;

		$total = $obj->count();
		$segment = ($uri['page']=='')?0:$uri['page'];
		$obj->order_by($column,'asc')->get($page_conf['per_page'],$segment);
		$page_conf['total_rows'] = $total;
		$per_page = $page_conf['per_page'];
		$this->pagination->initialize($page_conf);
		$data = array(
			'view_data'=>$view_data,'segment'=>$segment,
			'objs'=>$obj,'total'=>$total,
			'page'=>($segment/$per_page)+1,
			'page_count'=>ceil($total/$per_page),'uri'=>$uri,'alertcount'=>Common::check_messages(),
		);
		$this->load->view('common/backendindex',$data);

	}
	function send_mail($recipient,$subject,$message,$cc){
		//$config['smtp_host']='202.6.233.16';
		//$cc = implode(",",$ccs);
		$config['smtp_host']='mail.padi.net.id';
		$config['smtp_port']='25';
		$config['protocol']='smtp';
		$config['mailtype']='html';
		$this->obj->email->initialize($config);
		$this->obj->email->from('PadiApp@padi.net.id');
		$this->obj->email->to(array($recipient));
		$this->obj->email->cc($cc);
		$this->obj->email->bcc("puji@padi.net.id");
		$this->obj->email->subject($subject);
		$this->obj->email->message($message);
		$this->obj->email->send();
	}
	function get_years_array(){
		$out_array = array();
		for($c=2011;$c<=2022;$c++){
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c] = $c;
		}
		return $out_array;

	}
	function get_months_array(){
		$out_array = array();
		for($c=1;$c<=12;$c++){
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c] = $c;
		}
		return $out_array;

	}
	function get_hours_array(){
		$out_array = array();
		for($c=1;$c<=24;$c++){
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c] = $c;
		}
		return $out_array;
	}
	function get_minutes_array($interfal=5){
		$out_array = array();
		$c=0;
		while ($c<60) {
			$c+=$interfal;
			for($x=strlen($c);$x<2;$x++){
				$c='0' . $c;
			}
			$out_array[$c]=$c;
		}
		return $out_array;
	}
	function get_month_name($month_index = '1'){
		switch ($month_index){
			case '1':
				$out = 'january';
				break;
			case '2':
				$out = 'february';
				break;
			case '3':
				$out = 'march';
				break;
			case '4':
				$out = 'april';
				break;
			case '5':
				$out = 'may';
				break;
			case '6':
				$out = 'june';
				break;
			case '7':
				$out = 'july';
				break;
			case '8':
				$out = 'august';
				break;
			case '9':
				$out = 'september';
				break;
			case '10':
				$out = 'october';
				break;
			case '11':
				$out = 'november';
				break;
			case '12':
				$out = 'december';
				break;
		}
		return $out;
	}
	function validate_url($key_array,$valid_url){
		$uri = $this->obj->uri->uri_to_assoc();
		$keys = array_keys($uri);
		if($keys!=$key_array){
			redirect($valid_url);
		}
	}
	function get_common_pagination_conf($base_url,$uri_segment,$per_page,$row_count){
		$pagination_conf['base_url'] = $base_url;
		$pagination_conf['per_page'] = $per_page;
		$pagination_conf['total_rows'] = $row_count;
		$pagination_conf['uri_segment'] = $uri_segment;
		$pagination_conf['cur_tag_open'] = ' | <strong>';
		$pagination_conf['cur_tag_close'] = '</strong> ';
		$pagination_conf['num_tag_open'] = ' | ';
		$pagination_conf['next_tag_open'] = ' | ';
		$pagination_conf['last_tag_open'] = ' | ';
		$pagination_conf['first_tag_close'] = ' | ';
		$pagination_conf['next_link'] = $this->obj->lang->line('next');
		$pagination_conf['prev_link'] = $this->obj->lang->line('prev');
		$pagination_conf['first_link'] = $this->obj->lang->line('first');
		$pagination_conf['last_link'] = $this->obj->lang->line('last');
		return $pagination_conf;
	}
	function get_simple_pagination_conf($module_name){
		$app_setting = new App_setting();
		$app_setting->where('module_name',$module_name)->get();
		$pagination_conf['base_url'] = base_url() . $app_setting->default_url;
		$pagination_conf['per_page'] = $app_setting->per_page;
		$pagination_conf['uri_segment'] = $app_setting->page_segment;
		$pagination_conf['cur_tag_open'] = ' | ';
		$pagination_conf['cur_tag_close'] = '</strong> ';
		$pagination_conf['num_tag_open'] = ' | ';
		$pagination_conf['next_tag_open'] = ' | ';
		$pagination_conf['last_tag_open'] = ' | ';
		$pagination_conf['first_tag_close'] = ' | ';
		$pagination_conf['next_link'] = $this->obj->lang->line('next');
		$pagination_conf['prev_link'] = $this->obj->lang->line('prev');
		$pagination_conf['first_link'] = $this->obj->lang->line('first');
		$pagination_conf['last_link'] = $this->obj->lang->line('last');
		return $pagination_conf;
	}
	function get_metode_filter(){
		$out = array('asc'=>'Ascending','desc'=>'Descending');
		return $out;
	}
	function datestring1(){
		return  "Year: %Y Month: %m Day: %d - %h:%i %a";
	}
	function send_internal_message($params){
		$message = new Internal_message();
		$message->message_type = $params['message_type'];
		$message->obj_id = $params['obj_id'];
		$message->recipient = $params['recipient'];
		$message->recipient_group = $params['recipient_group'];
		$message->content = $params['content'];
		$message->proposed_date1 = $params['proposed_date1'];
		$message->proposed_date2 = $params['proposed_date2'];
		$message->followuplink = $params['followuplink'];
		$message->user_name = $this->session->userdata['username'];
		$message->save();
	}
	function get_btn_param($params){
		foreach($params as $key=>$val){
			if(substr($key, 0,3)=='btn'){
				return $key;
			}
		}
	}
	function gethours(){
		$out = array();
		for($c=0;$c<=24;$c++){
			$str = '';
			for($n=strlen($c);$n<2;$n++){
				$c = '0' . $c;
			}
			$out[$c] = $c;
		}
		return $out;
	}
	function getminutes(){
		$out = array();
		for($c=0;$c<=60;$c++){
			$str = '';
			for($n=strlen($c);$n<2;$n++){
				$c = '0' . $c;
			}
			$out[$c] = $c;
		}
		return $out;
	}
}
