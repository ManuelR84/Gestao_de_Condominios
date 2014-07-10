<?php
class DBConnect
{
	private $hostname;
	private $username;
	private $password;
	private $database;
	private $con;
	
	//Constructor
	public function __construct($hostname, $username, $password, $database)
	{
		$this->hostname = $hostname;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
	}

   	function open()
   	{
   		$this->con = mysqli_connect($hostname, $username, $password, $database);
		
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}else{
			return $this->con;
		}
   	}
   	
   	function close()
   	{
   		mysqli_close($this->con);
   	}
   	
   	function query($query)
   	{
   		$result = mysqli_query($this->con, $query);
   	
   		return $result;
   	}
}
?> 