<?php
class Usuario{
	private $id;
	private $nome;
	private $login;
	private $senha;
	private $matricula;
	private $tipo;
	function __construct($nome, $login, $senha, $matricula, $tipo){
		$this->nome = $nome;
		$this->login = $login;
		$this->senha = $senha;
		$this->matricula = $matricula;
		$this->tipo = $tipo;
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
	public function getLogin(){
		return $this->login;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function getMatricula(){
		return $this->matricula;
	}
	public function getTipo(){
		return $this->tipo;
	}
}

?>