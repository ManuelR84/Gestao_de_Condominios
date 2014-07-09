<?php

class Utilizador {
	private $id_user;
	private $name;
	private $user;
	private $email;
	private $password;
    private $dblink;
	
	public function __construct($name="", $user="", $email="", $password="", $dblink="")
	{
		$this->id_user = "";
		$this->name = $name;
		$this->user = $user;
		$this->email = $email;
		$this->password = $password;
		$this->dblink = $dblink;
	}
	
	public function get_id_user()
	{
		return $this->id_user;
	}
	
	public function set_id_user($id_user)
	{
		$this->id_user = $id_user;
	}
	
	public function get_name()
	{
		return $this->name;
	}
	
	public function set_name($name)
	{
		$this->name = $name;
	}
	
	public function get_user()
	{
		return $this->user;
	}
	
	public function set_user($user)
	{
		$this->user = $user;
	}
	
	public function get_email()
	{
		return $this->email;
	}
	
	public function set_email($email)
	{
		$this->email = $email;
	}
	
	public function get_password(){
		return $this->password;
	}
	
	public function set_password($password){
		$this->password = $password;
	}
	
	public function get_dblink()
	{
		return $this->dblink;
	}
	
	public function set_dblink($dblink)
	{
		$this->dblink = $dblink;
	}
}
?>