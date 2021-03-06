<?php
//define constants
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "nri_student");

class Connection {

	//attributes
	private $mysqli;

	public function __construct() {
		$this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
	}

	//Close connection
	public function close() {
		$this->mysqli->close();
	}

	//execute the passed in query and return result
	public function query($sql) {

		//execute query
		$result = $this->mysqli->query($sql)  or trigger_error($this->mysqli->error."[$sql]");
		return $result;
	}


	// fetch a row from result_set as an associative array
	public function fetchArray($resultSet) {
		return $resultSet->fetch_array(MYSQLI_ASSOC);
	}
	public function getInsertID()
	{
		//to get pageid which is created internally
		return $this->mysqli->insert_id;
	}
	public function escape($value)
	{
		return $this->mysqli->real_escape_string($value);
	}
	

}
?>