<?php
class DBConnect
{
	private $con;
	
	//Constructor
	public function __construct($hostname, $username, $password, $database)
	{
		$this->con = mysqli_connect($hostname, $username, $password, $database);
		
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}

	function query($query)
   	{
		$result = mysqli_query($this->con, $query);
		
		return $result;
   	}
}
?> 