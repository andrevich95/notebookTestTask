<?php
/*

*/
class MyDatabase
{
	public $connection;


	function __construct()
	{

		$servername = "localhost";
		$serverusername = "root";
		$serverpassword = "";
		$serverdatabase = "tasks_database";
		$this->connection = new mysqli($servername,$serverusername,$serverpassword,$serverdatabase);
		if ($this->connection->connect_error) {
		    die("Connection failed: " . $this->connection->connect_error);
		} 
	}

	function select($table, $other=null){
		$query = 'SELECT * FROM '.$table;
		if(isset($other)){
			$query.=' '.$other;
		}
		$query.=';';
		$res = $this->connection->query($query);
		$result = array();
		if ($res->num_rows > 0) {
		    while($row = $res->fetch_assoc()) {
		        array_push($result, $row);
		    }
		} 
		else {
		    return false;
		}
		return $result;
	}

	function insert($table,$data){
		$query = 'INSERT INTO '.$table.' (';
		$values='VALUES (';
		foreach ($data as $key => $value) {
			$query.=$key.',';
			$values.='"'.$value.'",';
		}
		$values=substr($values, 0, strlen($values)-1);
		$values.=');';
		$query=substr($query, 0, strlen($query)-1);
		$query.=') '.$values;
		$this->connection->query($query);
		return false;
	}

	function last_id($table){
		$query = 'SELECT MAX(id) FROM '.$table.';';
		$result = $this->connection->query($query)->fetch_assoc();
		return intval($result["MAX(id)"]);
	}

	function get_count($table){
		$query = 'SELECT COUNT(*) FROM '.$table.';';
		$result = $this->connection->query($query)->fetch_assoc();
		return intval($result['COUNT(*)']);
	}

	function update($table,$columns,$where){
		$query = 'UPDATE '.$table.' SET ';
		foreach ($columns as $key => $value) {
			$query.=' '.$key.' = "'.$value.'",';
		}
		$query=substr($query, 0, strlen($query)-1);
		$query.=' WHERE '.array_search(current($where),$where).' = "'.current($where).'";';
		echo $query;
		$this->connection->query($query);
		return false;
	}
}
?>