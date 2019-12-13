<?php

class Local{
	private $id;
	private $nome;
	private $telefone;
	private $endereco;
	private $responsavel;

	function __construct($nome, $telefone, $endereco, $responsavel){
		$this->nome = $nome;
		$this->telefone = $telefone;
		$this->endereco = $endereco;
		$this->responsavel = $responsavel;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getTelefone(){
		return $this->telefone;
	}
	public function getEndereco(){
		return $this->endereco;
	}
	public function getResponsavel(){
		return $this->responsavel;
	}
}

?>