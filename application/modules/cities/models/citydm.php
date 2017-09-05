<?php
class City extends DataMapper{
	function __construct(){
		parent::__construct();
	}
	function get_cities(){
		$cities = new City();
		$cities->get();
		$out = array();
		foreach($cities as $city){
			$out[$city->name] = $city->name;
		}
		return $out;
	}
	

	function get_json_cities(){
		$autocomplete_city = new City();
		$autocomplete_city->order_by('name','asc')->get();
		$myarray = array();
		foreach ($autocomplete_city as $city){
			array_push($myarray, $city->name);
		}
		$commasparated = '"' . implode('","',$myarray) . '"';
		$out = '{"cities":[' . $commasparated . ']}';
		return $out;
	}
	
	function get_combo_data(){
		$cities = new City();
		$cities->where('active','1')->get();
		$out = array();
		foreach ($cities as $city){
			$out[$city->id] = $city->name;
		}
		return $out;
	}
}