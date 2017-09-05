<?php
class Telemarketing extends CI_Model{
	var $mydb;
	function __construct(){
		parent::__construct();
		$this->mydb = $this->load->database("secondg",TRUE);
	}
	
	function get_combo_data(){
		$out = array();
		$query = "select * from clients";
		$product = $this->mydb->query($query);
		foreach($product->result() as $k=>$v){
			$out[$v->id] = $v->name;
		}
		return $out;
	}
	
	function populate(){
		$query = "select * from clients";
		$product = $this->mydb->query($query);
		return $product->result();
	}
	
	function update($arr){
		$tmp = array();
		$str='update clients set ';
		foreach($arr as $x=>$y){
			array_push($tmp,$x . '="' . $y . '"');
		}
		$str.=implode(',',$tmp);
		$str.='where id=' . $arr["id"];
		
		echo $str;
	}
}
