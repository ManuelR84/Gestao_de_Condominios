<?php

class Registocontas {

	private $descricao;
	private $numero_conta;
	private $saldo_inicial;
	
	
	function __construct($descricao="", $numero_conta="", $saldo_inicial="")
	{
		$this->descricao = $descricao;
		$this->numero_conta = $numero_conta;
		$this->saldo_inicial = $saldo_inicial;
	}
	
	function get_descricao()
	{
		return $this->descricao;
	}

	function set_descricao($descricao)
	{
		$this->descricao = $descricao;
	}

	function get_numero_conta()
	{
		return $this->numero_conta;
	}
	
	function set_numero_conta($numero_conta)
	{
		$this->numero_conta = $numero_conta;
	}

	function get_saldo_inicial()
	{
		return $this->saldo_inicial;
	}
	
	function set_saldo_inicial($saldo_inicial)
	{
		$this->saldo_inicial = $saldo_inicial;
	}
}
?>