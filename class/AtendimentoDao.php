<?php 

class AtendimentoDao{
	private $con;
	function __construct($con) {
		$this->con = $con;
	}
	function listaAtendimentoAtendente(){
		$atendimentos = array();
		$resultado = mysqli_query($this->con, "SELECT * FROM port_atendimento WHERE status=1 AND local_id=".$_SESSION['localId']." ORDER BY data_entrada desc");
		while ($atendimento_array = mysqli_fetch_assoc($resultado)) {
			$id_atendimento 	= $atendimento_array['id_atendimento'];
			$local_id			= $atendimento_array['local_id'];
			$usuario_id			= $atendimento_array['usuario_id'];
			$cracha				= $atendimento_array['cracha'];
			$data 				= $atendimento_array['data_entrada'];
			$dataAlterada		= $atendimento_array['data_saida'];
			$nomeVisitante		= $atendimento_array['nome_visitante'];
			$telefoneVisitante	= $atendimento_array['telefone_visitante'];
			$cpfVisitante		= $atendimento_array['cpf_visitante'];
			$alfa		 		= $atendimento_array['alfa'];
			$status				= $atendimento_array['status'];
			$tipo				= $atendimento_array['tipo'];
			$empresaVisitante	= $atendimento_array['empresa_visitante'];
			$areaVisitada		= $atendimento_array['area'];

			$atendimento = new Atendimento($data, $dataAlterada, $cracha, $nomeVisitante, $telefoneVisitante, $cpfVisitante, $alfa, $status, $tipo, $empresaVisitante, $areaVisitada);
			$atendimento->setIdAtendimento($id_atendimento);
			$atendimento->setIdLocal($local_id);
			$atendimento->setIdUsuario($usuario_id);

			array_push($atendimentos, $atendimento);
		}
		return $atendimentos;
	}
	function insereAtendimento(Atendimento $atendimento){
		$query = "INSERT INTO port_atendimento (`id_atendimento`, `local_id`, `usuario_id`, `data_entrada`, `data_saida`, `cracha`, `nome_visitante`, `telefone_visitante`, `cpf_visitante`, `alfa`, `status`, `tipo`, `empresa_visitante`, `area`)
		VALUES (null, 
			'{$atendimento->getIdLocal()}',
			'{$atendimento->getIdUsuario()}',
			'{$atendimento->getData()}',
			null,
			'{$atendimento->getCracha()}',
			'{$atendimento->getNomeVisitante()}',
			'{$atendimento->getTelefoneVisitante()}',
			'{$atendimento->getCpfVisitante()}',
			'{$atendimento->getAlfa()}',
			'{$atendimento->getStatus()}',
			'{$atendimento->getTipo()}',
			'{$atendimento->getEmpresaVisitante()}',
			'{$atendimento->getAreaVisitada()}'
		)";
		return mysqli_query($this->con, $query);
	}
	function entregaCracha(Atendimento $atendimento){
		$query = "UPDATE port_atendimento 
				  SET local_id = '{$atendimento->getIdLocal()}', 
				  	  usuario_id = '{$atendimento->getIdUsuario()}', 
				  	  data_entrada = '{$atendimento->getData()}', 
				  	  data_saida = '{$atendimento->getDataAlterada()}', 
				  	  cracha = '{$atendimento->getCracha()}', 
				  	  nome_visitante = '{$atendimento->getNomeVisitante()}', 
				  	  telefone_visitante = '{$atendimento->getTelefoneVisitante()}', 
				  	  cpf_visitante = '{$atendimento->getCpfVisitante()}', 
				  	  alfa = '{$atendimento->getAlfa()}', 
				  	  status = '{$atendimento->getStatus()}', 
				  	  tipo = '{$atendimento->getTipo()}',
				  	  empresa_visitante = '{$atendimento->getEmpresaVisitante()}',
				  	  area = '{$atendimento->getAreaVisitada()}'
				  WHERE id_atendimento = '{$atendimento->getIdAtendimento()}'";
		return mysqli_query($this->con, $query);
	}
	function listaAtendimentoAtendenteProvisorio(){
		$atendimentos = array();
		$resultado = mysqli_query($this->con, "SELECT * FROM port_atendimento WHERE status=1 AND tipo=0 AND local_id=".$_SESSION['localId']." ORDER BY data_entrada desc");
		while ($atendimento_array = mysqli_fetch_assoc($resultado)) {
			$id_atendimento 	= $atendimento_array['id_atendimento'];
			$local_id			= $atendimento_array['local_id'];
			$usuario_id			= $atendimento_array['usuario_id'];
			$cracha				= $atendimento_array['cracha'];
			$data 				= $atendimento_array['data_entrada'];
			$dataAlterada		= $atendimento_array['data_saida'];
			$nomeVisitante		= $atendimento_array['nome_visitante'];
			$telefoneVisitante	= $atendimento_array['telefone_visitante'];
			$cpfVisitante		= $atendimento_array['cpf_visitante'];
			$alfa		 		= $atendimento_array['alfa'];
			$status				= $atendimento_array['status'];
			$tipo				= $atendimento_array['tipo'];
			$empresaVisitante	= $atendimento_array['empresa_visitante'];
			$areaVisitada		= $atendimento_array['area'];

			$atendimento = new Atendimento($data, $dataAlterada, $cracha, $nomeVisitante, $telefoneVisitante, $cpfVisitante, $alfa, $status, $tipo, $empresaVisitante, $areaVisitada);
			$atendimento->setIdAtendimento($id_atendimento);
			$atendimento->setIdLocal($local_id);
			$atendimento->setIdUsuario($usuario_id);

			array_push($atendimentos, $atendimento);
		}
		return $atendimentos;
	}
	function listaAtendimentoAtendenteVisitantes(){
		$atendimentos = array();
		$resultado = mysqli_query($this->con, "SELECT * FROM port_atendimento WHERE status='1' AND tipo='1' AND local_id=".$_SESSION['localId']." ORDER BY data_entrada desc");
		while ($atendimento_array = mysqli_fetch_assoc($resultado)) {
			$id_atendimento 	= $atendimento_array['id_atendimento'];
			$local_id			= $atendimento_array['local_id'];
			$usuario_id			= $atendimento_array['usuario_id'];
			$cracha				= $atendimento_array['cracha'];
			$data 				= $atendimento_array['data_entrada'];
			$dataAlterada		= $atendimento_array['data_saida'];
			$nomeVisitante		= $atendimento_array['nome_visitante'];
			$telefoneVisitante	= $atendimento_array['telefone_visitante'];
			$cpfVisitante		= $atendimento_array['cpf_visitante'];
			$alfa		 		= $atendimento_array['alfa'];
			$status				= $atendimento_array['status'];
			$tipo				= $atendimento_array['tipo'];
			$empresaVisitante	= $atendimento_array['empresa_visitante'];
			$areaVisitada		= $atendimento_array['area'];

			$atendimento = new Atendimento($data, $dataAlterada, $cracha, $nomeVisitante, $telefoneVisitante, $cpfVisitante, $alfa, $status, $tipo, $empresaVisitante, $areaVisitada);
			$atendimento->setIdAtendimento($id_atendimento);
			$atendimento->setIdLocal($local_id);
			$atendimento->setIdUsuario($usuario_id);

			array_push($atendimentos, $atendimento);
		}
		return $atendimentos;
	}
	function visaoSupervisor(){
		$atendimentos = array();
		$locais = array();
		$resultado = mysqli_query($this->con, "SELECT * FROM port_atendimento");
		while ($atendimento_array = mysqli_fetch_assoc($resultado)) {
			$id_atendimento 	= $atendimento_array['id_atendimento'];
			$local_id			= $atendimento_array['local_id'];
			$usuario_id			= $atendimento_array['usuario_id'];
			$cracha				= $atendimento_array['cracha'];
			$data 				= $atendimento_array['data_entrada'];
			$dataAlterada		= $atendimento_array['data_saida'];
			$nomeVisitante		= $atendimento_array['nome_visitante'];
			$telefoneVisitante	= $atendimento_array['telefone_visitante'];
			$cpfVisitante		= $atendimento_array['cpf_visitante'];
			$alfa		 		= $atendimento_array['alfa'];
			$status				= $atendimento_array['status'];
			$tipo				= $atendimento_array['tipo'];

			$atendimento = new Atendimento($data, $dataAlterada, $cracha, $nomeVisitante, $telefoneVisitante, $cpfVisitante, $alfa, $status, $tipo);
			$atendimento->setIdAtendimento($id_atendimento);
			$atendimento->setIdLocal($local_id);
			$atendimento->setIdUsuario($usuario_id);

			array_push($atendimentos, $atendimento);
		}
		return $atendimentos;
	}
}

?>