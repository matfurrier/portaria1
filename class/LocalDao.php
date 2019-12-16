<?php 
class LocalDao{
	private $con;
	function __construct($con) {
		$this->con = $con;
	}
	function listaLocal(){
		$locais = array();
		$resultado = mysqli_query($this->con, "SELECT * FROM port_local ORDER BY nome_local ASC");

		while ($local_array = mysqli_fetch_assoc($resultado)) {

			$nome 			= $local_array['nome_local'];
			$telefone 		= $local_array['telefone_local'];
			$endereco 		= $local_array['endereco_local'];
			$responsavel 	= $local_array['responsavel'];

			$local = new Local($nome, $telefone, $endereco, $responsavel);
			$local->setId($local_array['id_local']);

			array_push($locais, $local);
		}
		return $locais;
	}
	function insereLocal(Local $local){
		$query = "INSERT INTO port_local (`id_local`, `nome_local`, `telefone_local`, `endereco_local`, `responsavel`)
		VALUES (NULL, '{$local->getNome()}', '{$local->getTelefone()}', '{$local->getEndereco()}', '{$local->getResponsavel()}')";

		return mysqli_query($this->con, $query);
	}
	function alteraLocal(Local $local){
		$query = "UPDATE port_local 
				  SET nome_local = '{$local->getNome()}',
					  telefone_local = '{$local->getTelefone()}',
					  endereco_local = '{$local->getEndereco()}',
					  responsavel = '{$local->getResponsavel()}'
				  WHERE id_local = '{$local->getId()}'";

		return mysqli_query($this->con, $query);
	}
	function excluiLocal (Local $local){
		$query = "DELETE FROM port_local WHERE id_local = '{$local->getId()}'";
		return mysqli_query($this->con, $query);
	}
}

?>