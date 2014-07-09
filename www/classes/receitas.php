<?php

class Receitas {

	private $descricao;
	private $rubrica;
	private $valor;
	private $data_pagamento;
	private $conta_destino;
	
	function __construct(){
		
	}

	
	function get_descricao(){
		return $this->descricao;
	}

	function set_descricao($descricao){
		$this->descricao = $descricao;
	}

	
	function get_rubrica(){
		return $this->rubrica;
	}
	
	function set_rubrica($rubrica){
		$this->rubrica = $rubrica;
	}
	
	
	function get_valor($valor){
		return $this->valor;
	}
	
	function set_valor($valor){
		$this->valor = $valor;
	}

	
	function get_data_pagamento(){
		return $this->data_pagamento;
	}
	
	
	function set_data_pagamento($data_pagamento){
		$this->data_pagamento = $data_pagamento;
	}
	
	
	function get_conta_destino(){
		return $this->conta_destino;
	}
	
	function set_conta_destino($conta_destino){
		$this->conta_destino = conta_destino;
	}
	
}
?>