<?php

class Fracoes {

	private $titular;
	private $identificacao;
	private $permilagem;
	private $designacao;
	private $tipo_fracao;
	private $observacoes;
	
	function __construct($titular="", $identificacao="", $permilagem="", $designacao="", $tipo_fracao="", $observacoes="")
	{
		$this->titular = $titular;
		$this->identificacao = $identificacao;
		$this->permilagem = $permilagem;
		$this->designacao = $designacao;
		$this->tipo_fracao = $tipo_fracao;
		$this->observacoes = $observacoes;
	}

	
	function get_titular()
	{
		return $this->titular;
	}

	function set_titular($titular)
	{
		$this->titular = $titular;
	}

	
	function get_identificacao()
	{
		return $this->identificacao;
	}
	
	function set_identificacao($identificacao)
	{
		$this->identificacao = $identificacao;
	}
	
	
	function get_permilagem()
	{
		return $this->permilagem;
	}
	
	function set_permilagem($permilagem)
	{
		$this->permilagem = $permilagem;
	}

	
	function get_designacao()
	{
		return $this->designacao;
	}
	
	
	function set_designacao($designacao)
	{
		$this->designacao = $designacao;
	}
	
	
	function get_tipo_fracao()
	{
		return $this->tipo_fracao;
	}
	
	function set_tipo_fracao($tipo_fracao)
	{
		$this->tipo_fracao = $tipo_fracao;
	}


	function get_observacoes()
	{
		return $this->observacoes;
	}
	
	function set_observacoes($observacoes)
	{
		$this->observacoes = $observacoes;
	}
}
?>