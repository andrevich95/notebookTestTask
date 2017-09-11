<?php

class Model_Task extends Model
{
	public function get_data(){
	}
	public function set_data($columns,$where){
		$conn = new MyDatabase();
		$table = 'task';
		$data = $conn->update($table,$columns,$where);
		return false;
	}
}
?>