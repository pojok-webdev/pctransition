<?php
class Province extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_provinces(){
		$out = array(
			'Jawa Timur'=>'Jawa Timur',
			'Jawa Tengah'=>'Jawa Tengah',
			'Jawa Barat'=>'Jawa Barat',
			'DKI Jakarta'=>'DKI Jakarta',
			'DIY'=>'DIY',
			'Bali'=>'Bali',
			'NTB'=>'NTB',
			'NTT'=>'NTT',
		);
		return $out;
	}
}