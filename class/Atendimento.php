<?php

class Atendimento{
	private $idAtendimento;
	private $idLocal;
	private $idUsuario;
	private $data;
	private $dataAlterada;
	private $cracha;
	private $nomeVisitante;
	private $telefoneVisitante;
	private $cpfVisitante;
	private $alfa;
	private $status;
	private $tipo;
	private $empresaVisitante;
	private $areaVisitada;

	function __construct($data, $dataAlterada, $cracha, $nomeVisitante, $telefoneVisitante, $cpfVisitante, $alfa, $status, $tipo, $empresaVisitante, $areaVisitada){

		$this->data 				= $data;
		$this->dataAlterada 		= $dataAlterada;
		$this->cracha 				= $cracha;
		$this->nomeVisitante 		= $nomeVisitante;
		$this->telefoneVisitante 	= $telefoneVisitante;
		$this->cpfVisitante 		= $cpfVisitante;
		$this->alfa 				= $alfa;
		$this->status 				= $status;
		$this->tipo					= $tipo;
		$this->empresaVisitante		= $empresaVisitante;
		$this->areaVisitada			= $areaVisitada;
	}

	public function getIdAtendimento(){
		return $this->idAtendimento;
	}
	public function setIdAtendimento($idAtendimento){
		$this->idAtendimento = $idAtendimento;
	}

	public function getIdLocal(){
		return $this->idLocal;
	}
	public function setIdLocal($idLocal){
		$this->idLocal = $idLocal;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getData(){
		return $this->data;
	}
	public function getDataAlterada(){
		return $this->dataAlterada;
	}
	public function getCracha(){
		return $this->cracha;
	}
	public function getNomeVisitante(){
		return $this->nomeVisitante;
	}
	public function getTelefoneVisitante(){
		return $this->telefoneVisitante;
	}
	public function getCpfVisitante(){
		return $this->cpfVisitante;
	}
	public function getAlfa(){
		return $this->alfa;
	}
	public function getStatus(){
		return $this->status;
	}
	public function getTipo(){
		return $this->tipo;
	}
	public function getEmpresaVisitante(){
		return $this->empresaVisitante;
	}
	public function getAreaVisitada(){
		return $this->areaVisitada;
	}
}

?>