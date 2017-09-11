<?php
class Model_Main extends Model
{
	public function get_data()
	{	
		$conn = new MyDatabase();
		$table = 'task';
		$data = $conn->select($table);
		return array('list'=>$data,'count'=>$conn->get_count($table));
	}
	//для ограничения количества ввода
	public function get_limit_data($page,$count=3,$order=null){
		$conn = new MyDatabase();
		$table = 'task';
		if($order!=null) $data = $conn->select($table,'LIMIT '.($page*3).', '.$count.' ORDER BY '.$order);
		else $data = $conn->select($table,'LIMIT '.$page.', '.$count);
		return array('list'=>$data,'count'=>$conn->get_count($table),'page'=>$page);
	}
	
	function get_data_by_id($id){
		$conn = new MyDatabase();
		$table = 'task';
		$data = $conn->select($table, ('WHERE id="'.$id.'"'));
		return $data;
	}
	function get_count(){
		$conn = new MyDatabase();
		$table = 'task';
		$data = $conn->get_count($table);
		return $data;
	}
	
	function get_sorted_name_data($param){
		$conn = new MyDatabase();
		$table = 'task';
		$data = $conn->select($table, ' ORDER BY name '.$param);
		return array('list'=>$data,'count'=>$conn->get_count($table));
	}
	function get_sorted_email_data($param){
		$conn = new MyDatabase();
		$table = 'task';
		$data = $conn->select($table, 'ORDER BY email '.$param);
		return array('list'=>$data,'count'=>$conn->get_count($table));
	}
	function get_sorted_date_data($param){
		$conn = new MyDatabase();
		$table = 'task';
		$data = $conn->select($table, 'ORDER BY date '.$param);
		return array('list'=>$data,'count'=>$conn->get_count($table));
	}
	function get_sorted_status_data($param){
		$conn = new MyDatabase();
		$table = 'task';
		$data = $conn->select($table, 'ORDER BY status '.$param);
		return array('list'=>$data,'count'=>$conn->get_count($table));
	}
}
?>