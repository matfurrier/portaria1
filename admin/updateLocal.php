<?php 
	require_once("topo.php");

	$id 			= $_POST['id'];
	$nome 			= $_POST['nome'];
	$telefone 		= $_POST['telefone'];
	$endereco 		= $_POST['endereco'];
	$responsavel 	= $_POST['responsavel'];

	//echo $id." - ".$nome." - ".$telefone." - ".$endereco." - ".$responsavel;

	$local = new Local($nome, $telefone, $endereco, $responsavel);
	$local->setId($id);

	$localDao = new LocalDao($con);
	if($localDao->alteraLocal($local)){
		$_SESSION["success"] = "Alterações realizadas com sucesso!";
		header("Location: atualizaLocal.php");
	}else{
		$_SESSION["danger"] = "As Alterações não puderam ser realizadas!<br><div class=\"container\">".mysqli_error($con)."</div>";
		header("Location: atualizaLocal.php");
	}

?>