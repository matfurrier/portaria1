<?php 
	require_once("topo.php");

	$id = $_POST['id'];

	$query = "SELECT * FROM port_local WHERE id_local = '$id'";
	$resultado = mysqli_query($con, $query);
	$result = mysqli_fetch_assoc($resultado);

	$id 				= $result['id_local'];
	$nome 				= $result['nome_local'];
	$telefone 			= $result['telefone_local'];
	$endereco 			= $result['endereco_local'];
	$responsavel 		= $result['responsavel'];

	//echo $id." - ".$nome." - ".$telefone." - ".$endereco." - ".$responsavel;

	$local = new Local($nome, $telefone, $endereco, $responsavel);
	$local->setId($id);

	$localDao = new LocalDao($con);
	if($localDao->excluiLocal($local)){
		$_SESSION["success"] = "Local excluido com sucesso!";
		header("Location: locais.php");
	}else{
		$_SESSION["danger"] = "Não foi possível excluir o local!<br> Erro:<div class=\"container\">".mysqli_error($con)."</div>";
		header("Location: locais.php");
	}
?>
