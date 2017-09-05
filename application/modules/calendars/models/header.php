<?php
class Header extends CI_Model{
	var $obj;
	function __construct(){
		parent::__construct();
		$this->obj = & get_instance();
	}
	function get_properties(){
		$url = $this->obj->uri->uri_to_assoc();
		$per_page = $url['perpage'];
		$per_page_array = array(1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9',10=>'10');
		$properties = form_open('hosting_packages/properties_handler');
		$properties.= form_label('Row Per Page','row_per_page',array('class'=>'label_float_long'));
		$properties.= form_dropdown('row_per_page',$per_page_array,$per_page,'class="text_short"');
		$properties.= form_submit('set_page','Set') . '<br />';
		$properties.= form_label('Search','search',array('class'=>'label_float_long'));
		$properties.= form_input('search','','class="text_medium"');
		$properties.= form_submit('find','Find') . '<br />';
		$properties.= form_close();
		return $properties;
	}
}