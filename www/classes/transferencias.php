<?php

class Transferencias {

	private $conta_origem;
	private $conta_destino;
	private $transfer;
	private $data;
	
	function __construct($conta_origem="", $conta_destino="", $transfer="", $data=""){
		$this->conta_origem = $conta_origem;
		$this->conta_destino = $conta_destino;
		$this->transfer = $transfer;
		$this->data = $data;
	}

	function get_conta_origem(){
		return $conta_origem;
	}

	function set_conta_origem($conta_origem){
		$this->conta_origem = $conta_origem;
	}

	function get_conta_destino(){
		return $conta_destino;
	}
	
	function set_conta_destino($conta_destino){
		$this->conta_destino = $conta_destino;
	}

	function get_transfer(){
		return $transfer;
	}
	
	function set_transfer($transfer){
		$this->transfer = $transfer;
	}
	
	function get_data(){
		return $data;
	}
	
	function set_data($data){
		$this->data = $data;
	}
}
?>