<?php

class Condominos extends DBConnect{

	private $nome;
	private $cc;
	private $morada;
	private $contato;
	private $email;
	
	function __construct($nome="", $cc="", $morada="", $contato="", $email="")
	{
		$this->nome = $nome;
		$this->cc = $cc;
		$this->morada = $morada;
		$this->contato = $contato;
		$this->email = $email;
	}
	
	function insert()
	{
		/*$this->query("INSERT INTO condominos (nome, cc, morada, contacto, email)
		VALUES ('nome teste', '123455', 'rua de teste', '123456789', 'email@dominio.com');");*/
	}
	
	function get_nome()
	{
		return $this->nome;
	}

	function set_nome($nome)
	{
		$this->nome = $nome;
	}
	
	function get_cc()
	{
		return $this->cc;
	}
	
	function set_cc($cc)
	{
		$this->cc = $cc;
	}
	
	function get_morada()
	{
		return $this->morada;
	}
	
	function set_morada($morada)
	{
		$this->morada = $morada;
	}
	
	function get_contato()
	{
		return $this->contato;
	}
	
	function set_contato($contato)
	{
		$this->contato = $contato;
	}
	
	function get_email()
	{
		return $this->email;
	}
	
	function set_email($email)
	{
		$this->email = $email;
	}
}
?>