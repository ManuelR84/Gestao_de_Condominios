<?php
class DBConnect
{
	private $dbc_hostname;
	private $dbc_username;
	private $dbc_password;
	private $dbc_db;

	//Constructor
	public function __construct()
	{
		$this->dbc_hostname = "localhost";
	}

	//Open connection to database
	private function openConnection()
	{
		return mysqli_connect($dbc_hostname, $dbc_username, $dbc_password, $dbc_db)  
		or die("Unable to connect to MySQL");
	}

	//Close connection
	private function closeConnection()
	{
	}

	//Insert statement
	public function insert()
	{
	}

	//Update statement
	public function update()
	{
	}

	//Delete statement
	public function delete()
	{
	}

	//Select statement
	public function select()
	{
	}
}
?> 