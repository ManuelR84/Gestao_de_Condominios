<?php

class Rubricas {

	private $nome;
	private $tipo;
	
	function __construct($nome="", $tipo="")
	{
		$this->nome = $nome;
		$this->tipo = $tipo;
	}
	
	function get_nome()
	{
		return $this->$nome;
	}

	function set_nome($nome)
	{
		$this->nome = $nome;
	}
	
	function get_tipo()
	{
		return $this->$tipo;
	}
	
	function set_tipo($tipo)
	{
		$this->tipo = $tipo;
	}
}
?>