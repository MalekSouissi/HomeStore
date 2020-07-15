<?php

class DBController {
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $db_name = "storedb";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		//$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        //return $conn;
        try{
            $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            return $conn;
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    
	}
	
    
	function runQuery($query) {
		$result = $this->conn->query($query);
		while($row=$result->fetch()) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = $this->conn->query($query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}

?>