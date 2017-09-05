<?php
class Prepic extends DataMapper{
	var $has_one = array('preclient');
	function __construct(){
		parent::__construct();
	}
}
