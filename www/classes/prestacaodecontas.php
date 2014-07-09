<?php

class Prestacaodecontas {

	private $resumo;
	private $saldo;
	private $por_receitas;
	private $por_despesas;
	private $por_rubricas;
	
	function __construct($resumo="", $saldo="", $por_receitas="", $por_despesas="", $por_rubricas="")
	{
		$this->resumo = $resumo;
		$this->saldo = $saldo;
		$this->por_receitas = $por_receitas;
		$this->por_despesas = $por_despesas;
		$this->por_rubricas = $por_rubricas;
	}
	
	function get_resumo()
	{
		return $this->resumo;
	}

	function set_resumo($resumo)
	{
		$this->resumo = $resumo;
	}
	
	function get_saldo()
	{
		return $this->saldo;
	}
	
	function set_saldo($saldo)
	{
		$this->saldo = $saldo;
	}
	
	function get_por_receitas()
	{
		return $this->por_receitas;
	}
	
	function set_por_receitas($por_receitas)
	{
		$this->por_receitas = $por_receitas;
	}
	
	function get_por_despesas()
	{
		return $this->por_despesas;
	}
	
	function set_por_despesas($por_despesas)
	{
		$this->por_despesas = $por_despesas;
	}
	
	function get_por_rubricas()
	{
		return $this->por_rubricas;
	}
	
	function set_por_rubricas($por_rubricas)
	{
		$this->por_rubricas = $por_rubricas;
	}
}
?>