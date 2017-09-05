<?php
	function getroles(){
		$ci = & get_instance();
		$sql = "select id,name from roles ";
		$query = $ci->db->query($sql);
		$result = $query->result();
		return $result;
	}
?>
