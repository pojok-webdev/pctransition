<?php
class Backups{
	var $obj;
	function __construct(){
		$this->obj = & get_instance();
	}
	function do_backup($table){
		$fields = $this->obj->db->list_fields($table);
		$column_array = array();
		$c = 0;
		foreach ($fields as $field){
			$column_array[$c] = $field;
			$c++;
		}
		$columns = implode(',', $column_array);
		
		$query = 'select ' . $columns . ' from ' . $table;
		$result = $this->obj->db->query($query);
		$text = '';
		foreach ($result->result() as $row){
			$row_array = array();
			$c = 0;
			foreach ($column_array as $column){
				$row_array[$c] = '"' . $row->$column . '"';
				$c++;
			}
			$rows = implode(',', $row_array);			
			$text .= 'insert into ' . $table . '(' . $columns . ') values (' . $rows . ');' . chr(13);
		}
		return $text;
	}
}