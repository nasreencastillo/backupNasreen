<?php

class connectionDB {
	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $db = "dbpcci";
	public static $result;
	public static $conn;
	public function connecttoDB(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
				if ($this->conn->connect_error) {
				    die("Connection failed: " . $this->conn->connect_error);
				} 
	}
	public function closeDB(){
		$this->conn->close();

	}
	public function runquery($sql){
		$this->result = $this->conn->query($sql);
		if (!$this->result) {
				    die(sprintf("Error: %s", $this->conn->error));
				}
	}
}
?>