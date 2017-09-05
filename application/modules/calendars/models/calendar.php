<?php
class Calendar extends CI_Model{
	
	var $days = array(1=>'Sunday',2=>'Monday',3=>'Tuesday',4=>'Wednesday',5=>'Thursday',6=>'Friday',7=>'Saturday');
	
	var $day_index = array('Sunday'=>1,'Monday'=>2,'Tuesday'=>3,'Wednesday'=>4,'Thursday'=>5,'Friday'=>6,'Saturday'=>7);
	
	var $month_age = array(1=>31,2=>28,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);
	
	var $leap_month_age = array(1=>31,2=>29,3=>31,4=>30,5=>31,6=>30,7=>31,8=>31,9=>30,10=>31,11=>30,12=>31);

	var $months = array(
			'1'=>'January',
			'2'=>'February',
			'3'=>'March',
			'4'=>'April',
			'5'=>'May',
			'6'=>'June',
			'7'=>'July',
			'8'=>'August',
			'9'=>'September',
			'10'=>'October',
			'11'=>'November',
			'12'=>'December'
		);

	var $notification = array(
			1=>'',
			2=>'',
			3=>'',
			4=>'',
			5=>'',
			6=>'',
			7=>'',
			8=>'',
			9=>'',
			10=>'',
			11=>'',
			12=>'',
			13=>'',
			14=>'',
			15=>'',
			16=>'',
			17=>'',
			18=>'',
			19=>'',
			20=>'',
			21=>'',
			22=>'',
			23=>'',
			24=>'',
			25=>'',
			26=>'',
			27=>'',
			28=>'',
			29=>'',
			30=>'',
			31=>'',
			);
	
	var $day_color = array(
			1=>'#FFFFFF',
			2=>'#FFFFFF',
			3=>'#FFFFFF',
			4=>'#FFFFFF',
			5=>'#FFFFFF',
			6=>'#FFFFFF',
			7=>'#FFFFFF',
			8=>'#FFFFFF',
			9=>'#FFFFFF',
			10=>'#FFFFFF',
			11=>'#FFFFFF',
			12=>'#FFFFFF',
			13=>'#FFFFFF',
			14=>'#FFFFFF',
			15=>'#FFFFFF',
			16=>'#FFFFFF',
			17=>'#FFFFFF',
			18=>'#FFFFFF',
			19=>'#FFFFFF',
			20=>'#FFFFFF',
			21=>'#FFFFFF',
			22=>'#FFFFFF',
			23=>'#FFFFFF',
			24=>'#FFFFFF',
			25=>'#FFFFFF',
			26=>'#FFFFFF',
			27=>'#FFFFFF',
			28=>'#FFFFFF',
			29=>'#FFFFFF',
			30=>'#FFFFFF',
			31=>'#FFFFFF',
			);

	var $day_link = array(
			1=>'#',
			2=>'#',
			3=>'#',
			4=>'#',
			5=>'#',
			6=>'#',
			7=>'#',
			8=>'#',
			9=>'#',
			10=>'#',
			11=>'#',
			12=>'#',
			13=>'#',
			14=>'#',
			15=>'#',
			16=>'#',
			17=>'#',
			18=>'#',
			19=>'#',
			20=>'#',
			21=>'#',
			22=>'#',
			23=>'#',
			24=>'#',
			25=>'#',
			26=>'#',
			27=>'#',
			28=>'#',
			29=>'#',
			30=>'#',
			31=>'#',
			);
			
	var $hover_day_color = array(
			1=>'#FFFFFF',
			2=>'#FFFFFF',
			3=>'#FFFFFF',
			4=>'#FFFFFF',
			5=>'#FFFFFF',
			6=>'#FFFFFF',
			7=>'#FFFFFF',
			8=>'#FFFFFF',
			9=>'#FFFFFF',
			10=>'#FFFFFF',
			11=>'#FFFFFF',
			12=>'#FFFFFF',
			13=>'#FFFFFF',
			14=>'#FFFFFF',
			15=>'#FFFFFF',
			16=>'#FFFFFF',
			17=>'#FFFFFF',
			18=>'#FFFFFF',
			19=>'#FFFFFF',
			20=>'#FFFFFF',
			21=>'#FFFFFF',
			22=>'#FFFFFF',
			23=>'#FFFFFF',
			24=>'#FFFFFF',
			25=>'#FFFFFF',
			26=>'#FFFFFF',
			27=>'#FFFFFF',
			28=>'#FFFFFF',
			29=>'#FFFFFF',
			30=>'#FFFFFF',
			31=>'#FFFFFF',
			);

	var $date_color = array(
			1=>'#000000',
			2=>'#000000',
			3=>'#000000',
			4=>'#000000',
			5=>'#000000',
			6=>'#000000',
			7=>'#000000',
			8=>'#000000',
			9=>'#000000',
			10=>'#000000',
			11=>'#000000',
			12=>'#000000',
			13=>'#000000',
			14=>'#000000',
			15=>'#000000',
			16=>'#000000',
			17=>'#000000',
			18=>'#000000',
			19=>'#000000',
			20=>'#000000',
			21=>'#000000',
			22=>'#000000',
			23=>'#000000',
			24=>'#000000',
			25=>'#000000',
			26=>'#000000',
			27=>'#000000',
			28=>'#000000',
			29=>'#000000',
			30=>'#000000',
			31=>'#000000',
			);
	
	var $hover_date_color = array(
			1=>'#000000',
			2=>'#000000',
			3=>'#000000',
			4=>'#000000',
			5=>'#000000',
			6=>'#000000',
			7=>'#000000',
			8=>'#000000',
			9=>'#000000',
			10=>'#000000',
			11=>'#000000',
			12=>'#000000',
			13=>'#000000',
			14=>'#000000',
			15=>'#000000',
			16=>'#000000',
			17=>'#000000',
			18=>'#000000',
			19=>'#000000',
			20=>'#000000',
			21=>'#000000',
			22=>'#000000',
			23=>'#000000',
			24=>'#000000',
			25=>'#000000',
			26=>'#000000',
			27=>'#000000',
			28=>'#000000',
			29=>'#000000',
			30=>'#000000',
			31=>'#000000',
			);

	var $years = array(2012=>'2012',2013=>'2013',2014=>'2014');
	
	function __construct(){
		parent::__construct();
	}
	
	function set_events($events){
		foreach ($events as $key=>$val){
			$this->day_color[$key]='gold';
			$this->notification[$key]='<span class="event_notification" onmouseover="show_events(\'2012\',\'7\',' . $key . ');" onmouseout="clear_notifications()">' . $val . '</span>';
		}
	}
	
	function set_day_color($day,$color){
		$this->day_color[$day]=$color;
	}
	
	function set_date_color($day,$color){
		$this->date_color[$day]=$color;
	}
	
	function show_calendar($month_year='2012/7'){
		$monthyear_array = explode('/', $month_year);
		$month = (int) $monthyear_array[1];
		$year = $monthyear_array[0];
		$monthage = (($year%4)==0)?$this->leap_month_age:$this->month_age;
		$first_day=date('l',strtotime($month_year . '/1'));
		$day_string = implode('</td><td>', $this->days);
		$cal = '<table class="calendar"><tr>';
		$cal.= '<thead><tr><td>' . $day_string . '</td></tr></thead>';
		$cal.= '<tbody>';
		for($c=1;$c<$this->day_index[$first_day];$c++){
			$cal.= '<td> </td>';
		}
		for($c=1;$c<=$monthage[$month];$c++){
			$dayname = date('l',strtotime($month_year . '/' . $c));
			$cal.= '<td style="background:' . $this->day_color[$c] . ';color:' . $this->date_color[$c] . ';cursor:pointer; " onclick="follow_up(\'' . $month_year . '/' . $c . '\');">' . $c . '<span class="notification">' . $this->notification[$c]. '</span></td>';
			if($this->day_index[$dayname]==7){
				$cal.= '</tr><tr>';
			}
		}		
		$cal.= '</tbody>';
		$cal.= '</table>';
		return $cal;
	}

	function get_month_name($month_id){
		$calendar = new Calendar();
		return $calendar->months[$month_id];
	}
	
}