<?php

class Fracoes {

	private $titular;
	private $identificacao;
	private $permilagem;
	private $designacao;
	private $tipo_fracao;
	private $observacoes;
	
	function __construct(){
		
	}

	
	function get_titular(){
		return $this->titular;
	}

	function set_titular($titular){
		$this->titular = $titular;
	}

	
	function get_identificacao(){
		return $this->identificacao;
	}
	
	function set_identificacao($identificacao){
	
	}
	
	
	function get_permilagem(){
		return $this->permilagem;
	}
	
	function set_permilagem($permilagem){
	
	}

	
	function get_designacao(){
		return $this->designacao;
	}
	
	
	function set_designacao(){
	
	}
	
	
	function get_tipo_fracao(){
		return $this->tipo_fracao;
	}
	
	function set_tipo_fracao(){
	
	}


	function get_observacoes(){
		return $this->observacoes;
	}
	
	function set_observacoes(){
	
	}
}
?>