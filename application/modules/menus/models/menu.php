<?php
class Menu extends DataMapper{
	var $has_one = array('menu'=>array('class'=>'menu','other_field'=>'submenu'));
	var $has_many = array('submenu'=>array('class'=>'menu','other_field'=>'menu'));
	function __construct(){
		parent::__construct();
	}
	
	function get_menu_by_parent($id){
		$menus = new Menu();
		$menus->where('menu_id',$id)->where('status','1')->order_by('menu_order','asc')->get();
		return $menus;
	}
	
	function get_top_menu(){
		$menus = new Menu();
		$menus->where('is_top','1')->where('status','1')->order_by('menu_order','asc')->get();
		return $menus;
	}
	
	function get_all_menu(){
		$menus = new Menu();
		$menus->get();
		return $menus;
	}
	
	function get_link($id){
		$menus = new Menu();
		$menus->where('id',$id)->get();
		switch ($menus->menu_type){
			case '0':
				return $menus->url;
				break;
			case '1':
				return base_url() . 'index.php/front_end/custom_page/page/' . $menus->page;
				break;
		}
	}
	
	function populate_order_numbers(){
		$c = array();
		for($c=0;$c<30;$c++){
			$out[$c] = $c;
		}
		return $out;
	}
	
	function get_combo_data($first_data=''){
		$menus = new Menu();
		$menus->get();
		$out = array();
		$out[0] = $first_data;
		foreach ($menus as $menu){
			$out[$menu->id] = $menu->name;
		}
		return $out;
	}
}