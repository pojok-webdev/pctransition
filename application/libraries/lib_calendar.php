<?php
class Lib_calendar{
var $months = array(
	'1'=>'Januari',
	'2'=>'Februari',
	'3'=>'Maret',
	'4'=>'April',
	'5'=>'Mei',
	'6'=>'Juni',
	'7'=>'Juli',
	'8'=>'Agustus',
	'9'=>'September',
	'10'=>'Oktober',
	'11'=>'Nopember',
	'12'=>'Desember');
	function get_month_name($month_num){
		return $this->months[$month_num];
	}
}